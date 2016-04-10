<?php
if(!function_exists('isUserAdmin'))
{
    function isUserAdmin($username)
    {
        $userArray = array();
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
        $path_config_users = "";
        include "paths.php";

        $password = "";
        $userArray = array();
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
        saveJSONToPHP($path_config_users,json_encode(getSortedUserArray($userArray)));
    }
}

if(!function_exists("doesUserExist"))
{
    function doesUserExist($username)
    {
        $userArray = array();
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
        $userArray = array();
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
        $phpText = '<?php $userJSON = ';
        $phpText = $phpText . "'" . $encodedJSONString . "';";
        file_put_contents($saveLocation, $phpText);
    }
}


if(!function_exists("changePassword"))
{
    function changePassword($username, $newPassword)
    {
        $userArray = array();
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

//UNTESTED
if(!function_exists("generateSalt"))
{
    function generateSalt($randomString)
    {
        if(isset($randomString))
        {
            $saltToWrite = '$5$rounds=5000$' . $randomString . '$';
            $phpText = '<? ' . ' $salt = "' . $saltToWrite . '";';
            file_put_contents("../../config/salt.php",$phpText);
        }
    }
}

if(!function_exists("getSortedUserArray"))
{
    function getSortedUserArray($userArray)
    {
        usort($array, function ($a, $b)
        {
            return ($a->username < $b->username) ? -1 : 1;
        });
        return $userArray;
    }
}

