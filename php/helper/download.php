<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;
}
$filename = $_GET['filename'];
header('Content-type: application/bin');
header('Content-Disposition: attachment; filename='. $filename);
readfile("../../executables/"  . $filename);
