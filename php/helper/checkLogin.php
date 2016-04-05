<?php
if(!isset($_SESSION))
{
	session_start();
}
define('USER_FILE_PATH','../../config/users.php');


function checkLoginData($username,$password)
{
    $returnValue = 'failure';
    global $userArray;
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
        $password = crypt($password, '$5$g3t#~34uö@$');

        if (file_exists(USER_FILE_PATH))
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