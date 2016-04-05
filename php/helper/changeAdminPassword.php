<?php
if(!isset($_SESSION))
{
    session_start();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isUserAdmin($_SESSION['loggedIn']))
{
    include "functions.php";
    changePassword($username,crypt($postPassword,getSalt()));
}