<?php
include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    global $sortOrder;


    $developerName = $_POST['developerName'];
    $colorScheme = $_POST['colorScheme'];
    $gridSize = $_POST['gridSize'];
    $sortOrder = $_POST['sortOrder'];
//codera version is read only --> is only set by updater

    $generalSettingsFilename = "../../config/generalSettings.json";
    $file = fopen($generalSettingsFilename, "w");

    $array = array(
        "developerName" => $developerName,
        "colorScheme" => $colorScheme,
        "gridSize" => $gridSize,
        "sortOrder" => $sortOrder
    );

    $jsonString = json_encode($array);

    fwrite($file, $jsonString);
    fclose($file);


    include "sort.php";
}