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
    $inDev = false;

    $generalSettingsFilename = "../../config/generalSettings.json";

    //gets inDev status
    if (file_exists($generalSettingsFilename))
    {
        $inDevBool = json_decode(file_get_contents($generalSettingsFilename))->{'inDev'};
        if ($inDevBool != null)
            $inDev = $inDevBool;
    }

    $array = array(
        "developerName" => $developerName,
        "colorScheme" => $colorScheme,
        "gridSize" => $gridSize,
        "sortOrder" => $sortOrder,
        "inDev" => $inDev
    );

    $jsonString = json_encode($array, JSON_PRETTY_PRINT);
    file_put_contents($generalSettingsFilename, $jsonString);

    $projectArray = [];
    include "getProjectsFromJSON.php";
    $path_config_projects = "";
    include "paths.php";
    file_put_contents($path_config_projects, json_encode(getSortedProjectArray($projectArray, $sortOrder), JSON_PRETTY_PRINT));
}