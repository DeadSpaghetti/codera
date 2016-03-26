<?php
if(!isset($_SESSION))
{
    session_start();
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    include_once "functions.php";
    if(isUserAdmin($_SESSION['loggedIn']))
    {
        $pathString = "../../config/users.json";
        $username = $_POST['username'];
        $postPassword = $_POST['password'];
        $forbiddenProjects = $_POST['forbiddenProjects'];   //as json --> encoded by javascript
        $accountType = $_POST['accountType'];

        $salt = '$5$g3t#~34uö@$';
        $userAlreadyExists = false;

        global $userArray;
        include "getUsersFromJSON.php";
        for($i=0; $i < sizeof($userArray); $i++)
        {
            if($userArray[$i]->{'username'} == $username)
            {
                $userAlreadyExists = true;
                break;
            }
        }

        if($userAlreadyExists)
        {
            if($postPassword == "" || $postPassword == null)
            {
                $password = deleteUser($username);
            }
            else
            {
                deleteUser($username);
                $password = crypt($postPassword,$salt);
            }
        }
        else
        {
            $password =  crypt($postPassword,$salt);
        }

        $fileIsThere = false;
        if (file_exists($pathString))
        {
            $fileIsThere = true;
            $configFile = file_get_contents($pathString);
            $array = json_decode($configFile, false);
        }

        if($username != "admin" && $username != "public")
        {
            $newUserArray = array
            (
                "username" => $username,
                "password" => $password,
                "accountType" => $accountType,
                "forbiddenProjects" => $forbiddenProjects
            );
        }
        else
        {
            if($username == "admin")
            {
                $newUserArray = array
                (
                    "username" => $username,
                    "password" => $password,
                    "forbiddenProjects" => "[]",
                    "accountType" => "admin",
                );
            }
            elseif($username == "public")
            {
                $newUserArray = array
                (
                    "username" => $username,
                    "forbiddenProjects" => $forbiddenProjects,
                    "accountType" => "user"
                );
            }

        }
        //checks boolean value to see if file is there. If not generates it
        if ($fileIsThere)
            array_push($array, $newUserArray);
        else
            $array[0] = $newUserArray;

        //push new reg id into array
        $fileToSave = json_encode($array);
        file_put_contents($pathString, $fileToSave);

        $sortType = "users";
        include "sort.php";
    }

}