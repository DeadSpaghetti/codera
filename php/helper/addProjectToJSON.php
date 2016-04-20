<?php
session_start();

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

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $date = $_POST['date'];
    $name = $_POST['name'];
    $name = $_POST['name'];
    $icon = $_POST['icon']; //path to icon
    $versionName = $_POST['versionName'];
    $latestChanges = $_POST['latestChanges'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $files = $_POST['files'];
    $screenshots = $_POST['screenshots'];
    $license = $_POST['license'];
    $versionCode = $_POST['versionCode'];
    $projectUUID = $_POST['UUID'];
    $projectStatus = $_POST['projectStatus'];
    $url = $_POST['url'];


    if ($projectUUID == null)
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
            "icon" => urlencode($icon),
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
            "totalDownloads" => 0
        );

        //checks boolean value to see if file is there. If not generates it
        if ($isFileThere)
            array_push($array, $newProjectArray);
        else
            $array[0] = $newProjectArray;

        //push new reg id into array
        $fileToSave = json_encode($array);
        file_put_contents($pathString,$fileToSave);

        $sortOrder = "";
        $sortType = "projects";
        include "getGeneralSettingsFromJSON.php";
        include "sort.php";


    }
    catch (Exception $e)
    {
       
    }
}









