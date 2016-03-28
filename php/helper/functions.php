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
    }
}

if(!function_exists("deleteUser"))
{
    function deleteUser($username)
    {
        $pathString = "../../config/users.json";
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
        file_put_contents($pathString, json_encode($userArray));

        $sortType = "users";
        include "sort.php";

        return $password;
    }
}