<?php
if(!isset($_SESSION))
{
    session_start();
}

$currentUser = $_SESSION['loggedIn'];
$canAddUser = false;
global $userArray;
include "getUsersFromJSON.php";
if($userArray != null)
{
    for ($i = 0; $i < sizeof($userArray); $i++)
    {
        if ($userArray[$i]->{'username'} == $currentUser)
        {
            $canAddUser = true;
            break;
        }
    }
}


if($canAddUser = true && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $pathString = "../../config/users.json";
    $isFileThere = false;
    $username = $_POST['username'];
    $password = $_POST['password'];     //encrypted
    $forbiddenProjects = $_POST['forbiddenProjects'];   //as json --> encoded by javascript
    $accountType = $_POST['accountType'];
    $alreadyExists = false;

    if($username != "admin" && $username != "public")
    {
        //check if username already exists!
        if(!$alreadyExists)
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


            $newUserArray = array
                (
                    "username" => $username,
                    "password" => crypt($password, '$5$g3t#~34uö@$'),
                    "accountType" => $accountType,
                    "forbiddenProjects" => $forbiddenProjects
                );

                //checks boolean value to see if file is there. If not generates it
                if ($isFileThere)
                    array_push($array, $newUserArray);
                else
                    $array[0] = $newUserArray;

                //push new reg id into array
                $fileToSave = json_encode($array);
                file_put_contents($pathString, $fileToSave);

            }


        }



}