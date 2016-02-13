<?php
session_start();
if(isset($_SESSION['loggedIn']))
{
    include('restricted/projectSettings.php');
}
else
{
    print '<script>location.href = "login.php";</script>';
}