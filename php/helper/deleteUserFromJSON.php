<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once "functions.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isUserAdmin($_SESSION['loggedIn']))
{
    deleteUser($_POST['username']);
}