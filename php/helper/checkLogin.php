<?php
if(!isset($_SESSION))
{
	session_start();
}
$path_config_users = "";
include "paths.php";


function checkLoginData($username,$password)
{
    $returnValue = 'failure';
    $userArray = [];
    include "getUsersFromJSON.php";

    for($i=0; $i < sizeof($userArray); $i++)
    {
        if ($userArray[$i]->{'username'} == $username)
        {
            if($userArray[$i]->{'password'} == $password)
            {
                $_SESSION['loggedIn'] = $username;
                $returnValue = $userArray[$i]->{'accountType'};
            }
            else
            {
                //wrong password --> returnValue doesn't need to be changed!

            }
            break;
        }
    }
    echo $returnValue;
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($username) && isset($password) && $username != "" && $password != "")
    {
        include_once "functions.php";
        $password = crypt($password, getSalt());

        if (file_exists($path_config_users))
        {
            checkLoginData($username, $password);
        }
        else
        {
            echo 'failure'; //file doesn't exist
        }

    }
    else
    {
        echo "wrongInput";
    }
}