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

$projectGUID = generateGuid();
$pathString = "../config/projects.json";

$isFileThere = false;

if (file_exists($pathString))
{
    $isFileThere = true;
}

    try
    {
        if($isFileThere)
        {
            $configFile = file_get_contents($pathString);
            $fileInJSON = json_decode($configFile);
            //var_dump($fileInJSON);

            //save to php format array
            $array = array($fileInJSON);
        }
        $newProjectArray = array
        (
            "name" => $name,
            "icon" => $icon,
            "versionName" => $versionName,
            "date" => $date,
            "latestChanges" => $latestChanges,
            "files" => $files,
            "screenshots" => $screenshots,
            "license" => $license,
            "versionCode" => $versionCode,
            "GUID" => $projectGUID
        );

        //checks boolean value to see if file is there. If not generates it
        if($isFileThere)
            array_push($array, $newProjectArray);
        else
            $array = $newProjectArray;

        //push new reg id into array
        $fileToSave = json_encode($array);
        echo $fileToSave;
        $file = fopen($pathString, "w");
        fwrite($file, $fileToSave);
        fclose($file);


    }
    catch (Exception $e)
    {
        var_dump($e);
    }










