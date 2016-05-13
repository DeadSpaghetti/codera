<?php
if(!isset($_SESSION))
{
	session_start();
}

$generalSettingsFilename = "../../config/generalSettings.json";
//get selected colorScheme from json

if(file_exists($generalSettingsFilename))
{
    $selectedColor = json_decode(file_get_contents($generalSettingsFilename))->{'colorScheme'};
}
else
{
    $selectedColor = "#4a98d3";
}


$colorPath = "../../config/colors.json";
$colorConfigFile = file_get_contents($colorPath);
$colorArray = json_decode($colorConfigFile,true);

for($i = 0; $i < sizeof($colorArray); $i++)
{
    if($colorArray[$i]['hexCode'] == $selectedColor)
    {
        echo '<div class="ink selected" style="background-color: '.$colorArray[$i]['hexCode'].';"></div>';
    }
    else
    {
        echo '<div class="ink" style="background-color: ' . $colorArray[$i]['hexCode'] . ';"></div>';
    }
}