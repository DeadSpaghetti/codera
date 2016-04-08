<?php
if(!function_exists('isUserAdmin'))
{
    function isUserAdmin($username)
    {
        global $userArray;
        include "getUsersFromJSON.php";
        if($userArray != null)
        {
            for ($i = 0; $i < sizeof($userArray); $i++)
            {
                if ($userArray[$i]->{'username'} == $username)
                {
                    if ($userArray[$i]->{'accountType'} == "admin")
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
            }
        }
        else
        {
            return false;
        }
    }
}

if(!function_exists("deleteUser"))
{
    function deleteUser($username)
    {
        global $path_config_users;
        include "paths.php";

        $password = "";
        global $userArray;
        include "getUsersFromJSON.php";
        for($i=0; sizeof($userArray); $i++)
        {
            if($userArray[$i]->{'username'} == $username)
            {
                $password = $userArray[$i]->{'password'};
                unset($userArray[$i]);
                break;
            }
        }

        $userArray = array_values($userArray);
        saveJSONToPHP($path_config_users,json_encode($userArray));

        $sortType = "users";
        include "sort.php";
        return $password;
    }
}

if(!function_exists("doesUserExist"))
{
    function doesUserExist($username)
    {
        global $userArray;
        include "getUsersFromJSON.php";
        if($userArray != null)
        {
            for ($i = 0; $i < sizeof($userArray); $i++)
            {
                if ($userArray[$i]->{'username'} == $username)
                {
                    return true;
                }
            }
        }

    }
}

if(!function_exists("getPassword"))
{
    function getPassword($username)
    {
        global $userArray;
        include "getUsersFromJSON.php";
        if($userArray != null)
        {
            for ($i = 0; $i < sizeof($userArray); $i++)
            {
                if ($userArray[$i]->{'username'} == $username)
                {
                    return $userArray[$i]->{'password'};
                }
            }
        }
    }
}
if(!function_exists('saveJSONToPHP'))
{
    function saveJSONToPHP($saveLocation, $encodedJSONString)
    {
        $phpText = <<<'PHP'
	<?php
	$jsonString =
PHP;
        $phpText = $phpText ."'". $encodedJSONString ."';";
        file_put_contents($saveLocation, $phpText);

    }
}


if(!function_exists("changePassword"))
{
    function changePassword($username, $newPassword)
    {
        global $userArray;
        include "getUsersFromJSON.php";
        for ($i = 0; $i < sizeof($userArray); $i++)
        {
            if ($userArray[$i]->{'username'} == $username)
            {
                $userArray[$i]->{'password'} = crypt($newPassword,getSalt());
                break;
            }
        }
        global $path_config_users;
        include "paths.php";
        saveJSONToPHP($path_config_users, json_encode($userArray));
    }
}

if(!function_exists("getSalt"))
{
    function getSalt()
    {
        return '$5$g3t#~34uö@$';
    }
}
