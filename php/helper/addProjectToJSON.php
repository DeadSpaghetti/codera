<?php
if(!isset($_SESSION))
{
    session_start();
}

function generateGuid($include_braces = false)
{
    if (function_exists('com_create_guid'))
    {
        if ($include_braces === true)
        {
            return com_create_guid();
        }
        else
        {
            return substr(com_create_guid(), 1, 36);
        }
    }
    else
    {
        mt_srand((double)microtime() * 10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));

        $guid = substr($charid, 0, 8) . '-' .
            substr($charid, 8, 4) . '-' .
            substr($charid, 12, 4) . '-' .
            substr($charid, 16, 4) . '-' .
            substr($charid, 20, 12);

        if ($include_braces)
        {
            $guid = '{' . $guid . '}';
        }

        return $guid;
    }
}

include_once "functions.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isUserAdmin($_SESSION['loggedIn']))
{
   $stringNoOptionSelected = "Select an Option";
	
    $date = $_POST['date'];
    $name = $_POST['name'];
    $icon = $_POST['icon']; //path to icon
	if(strcmp($icon, $stringNoOptionSelected) == 0)
	{
		$icon = "";
	}	
    $versionName = $_POST['versionName'];
    $latestChanges = $_POST['latestChanges'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $files = $_POST['files'];
    $screenshots = $_POST['screenshots'];
    $license = $_POST['license'];
	if(strcmp($license, $stringNoOptionSelected) == 0)
	{
		$license = "";
	}
    $versionCode = $_POST['versionCode'];
    $projectStatus = $_POST['projectStatus'];
    $url = $_POST['url'];

    $projectUUID = generateGuid();
    $pathString = "../../config/projects.json";

    $isFileThere = false;


    if (file_exists($pathString))
    {
        $isFileThere = true;
    }

    try
    {
        if ($isFileThere)
        {
            $configFile = file_get_contents($pathString);
            $array = json_decode($configFile, false);

        }

        $newProjectArray = array
        (
            "name" => $name,
            "icon" => $icon,
            "versionName" => $versionName,
            "date" => $date,
            "latestChanges" => $latestChanges,
            "description" => $description,
            "requirements" => $requirements,
            "files" => $files,
            "screenshots" => $screenshots,
            "license" => $license,
            "versionCode" => $versionCode,
            "projectStatus" => $projectStatus,
            "url" => $url,
            "UUID" => $projectUUID,
            "totalViews" => 0,
            "totalDownloads" => 0,
            "starred" => false
        );

        //checks boolean value to see if file is there. If not generates it
        if ($isFileThere)
            array_push($array, $newProjectArray);
        else
            $array[0] = $newProjectArray;

        $sortOrder = "";
        include "getGeneralSettingsFromJSON.php";
        $fileToSave = json_encode($array, JSON_PRETTY_PRINT);
        file_put_contents($pathString,$fileToSave);

        $projectArray = [];
        include "getProjectsFromJSON.php";
        $path_config_projects = "";
        include "paths.php";
        file_put_contents($path_config_projects, json_encode(getSortedProjectArray($projectArray, $sortOrder), JSON_PRETTY_PRINT));

    }
    catch (Exception $e)
    {

    }
}









