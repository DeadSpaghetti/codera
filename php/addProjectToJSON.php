<?php

    $date = $_POST['date'];
    $name = $_POST['name'];
    $name = "max";
    $icon = $_POST['icon']; //path to icon
    $versionName = $_POST['versionName'];
    $latestChanges = $_POST['latestChanges'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $files = $_POST['files'];
    $screenshots = $_POST['screenshots'];
    $license = $_POST['license'];
    $versionCode = $_POST['versionCode'];

$pathString = "../config/projects.json";


if(file_exists($pathString))
{
    $configFile = file_get_contents($pathString);
    try
    {
        $fileInJSON = json_decode($configFile);
        //var_dump($fileInJSON);

        //save to php format array
        $array = array($fileInJSON);
        $newProjectArray = array("name" => $name,
                                 "icon" => $icon,
                                 "versionName" => $versionName,
                                 "date" => $date,
                                 "latestChanges" => $latestChanges,
                                 "files" => $files,
                                 "screenshots" => $screenshots,
                                 "license" => $license,
                                 "versionCode" => $versionCode);

        array_push($array,$newProjectArray);

        //push new reg id into array
        $fileToSave = json_encode($array);
        echo $fileToSave;
        $file = fopen($pathString,"w");
        fwrite($file,$fileToSave);


    }
    catch(Exception $e)
    {
        var_dump($e);
    }



}








