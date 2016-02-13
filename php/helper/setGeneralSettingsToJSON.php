<?php

$developerName = $_POST['developerName'];
$colorScheme = $_POST['colorScheme'];
$gridSize = $_POST['gridSize'];
//codera version is read only --> is only set by updater

$generalSettingsFilename = "../../config/generalSettings.json";
$file = fopen($generalSettingsFilename,"w");

$array = array(
  "developerName" => $developerName,
    "colorScheme" => $colorScheme,
    "gridSize" => $gridSize
);

$jsonString = json_encode($array);

fwrite($file,$jsonString);
fclose($file);