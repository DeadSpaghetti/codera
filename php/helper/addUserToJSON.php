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
        $isFileThere = false;
        $username = $_POST['username'];
        $postPassword = $_POST['password'];
        $forbiddenProjects = $_POST['forbiddenProjects'];   //as json --> encoded by javascript
        $accountType = $_POST['accountType'];
        $userAlreadyExists = false;
        $salt = '$5$g3t#~34uö@$';
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
            $password = $postPassword;
        }

            //creates files
            if (!$userAlreadyExists)
            {
                if (file_exists($pathString))
                {
                    $isFileThere = true;
                }

                if ($isFileThere)
                {
                    $configFile = file_get_contents($pathString);
                    $array = json_decode($configFile, false);

                }
            }

            if($userAlreadyExists)
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
                $newUserArray = array
                (
                    "username" => $username,
                    "password" => crypt($password, $salt),
                    "accountType" => $accountType,
                    "forbiddenProjects" => $forbiddenProjects
                );
            }
            //checks boolean value to see if file is there. If not generates it
            if ($isFileThere)
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