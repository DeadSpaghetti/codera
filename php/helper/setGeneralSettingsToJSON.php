<?php
if(!isset($_SESSION))
{
    session_start();
}

include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $developerName = $_POST['developerName'];
    $colorScheme = $_POST['colorScheme'];
    $gridSize = $_POST['gridSize'];
    $sortOrder = $_POST['sortOrder'];
//codera version is read only --> is only set by updater

    $generalSettingsFilename = "../../config/generalSettings.json";

    $array = array(
        "developerName" => $developerName,
        "colorScheme" => $colorScheme,
        "gridSize" => $gridSize,
        "sortOrder" => $sortOrder
    );

    $jsonString = json_encode($array);

    file_put_contents($generalSettingsFilename,$jsonString);
    $sortType = "projects";
    include "sort.php";
}