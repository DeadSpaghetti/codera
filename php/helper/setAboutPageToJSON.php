<?php
if(!isset($_SESSION['loggedIn']))
    session_start();

include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;
}


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $aboutIcon = $_POST['aboutIcon'];
    $aboutText = $_POST['aboutText'];
    $aboutFileLocation = "../../config/about.json";

    $array = array(
      "aboutIcon" => $aboutIcon,
      "aboutText" => $aboutText
    );

    file_put_contents($aboutFileLocation,json_encode($array));

}