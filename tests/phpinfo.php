<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once "../php/helper/functions.php";
if(isUserAdmin($_SESSION['loggedIn']))
{
    phpinfo();
}