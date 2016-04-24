<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once "functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $oldPassword = $_POST['oldPassword'];
    $username = $_SESSION['loggedIn'];
    $password = $_POST['password'];
    
    if(isUserAdmin($username) || (isset($oldPassword) && crypt($oldPassword,getSalt()) == getPassword($username)))
    {
        include_once "functions.php";
        changePassword($username,$password);
    }
    else
    {
        echo "denied";
    }

}
