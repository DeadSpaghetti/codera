<?php
$redirect_to_index = $_GET['redirect_to_index'];
if (!isset($redirect_to_index))
{
    $redirect_to_index = "false";
}
unlink("createAdmin.php");
unlink("deleteInstaller.php");
unlink("installer.php");
unlink("setSalt.php");
rmdir(getcwd());

session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();

if ($redirect_to_index == "false")
{
    header("Location: ../login.php");
}
else
{
    header("Location: ../index.php");
}