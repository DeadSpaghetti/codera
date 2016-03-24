<?php
if(!isset($_SESSION))
{
	session_start();
}
if(!isset($_SESSION['loggedIn']))
{
	header('Location: ../login.php');
	exit;
}

$generalSettingsFilename = "../../config/generalSettings.json";
//get selected colorScheme from json

if(file_exists($generalSettingsFilename))
{
    $selectedColor = json_decode(file_get_contents($generalSettingsFilename))->{'colorScheme'};

}
else
{
    $selectedColor = "#bdbdbd";
}


$colorPath = "../../config/colors.json";
$colorConfigFile = file_get_contents($colorPath);
$colorArray = json_decode($colorConfigFile,true);

for($i = 0; $i < sizeof($colorArray); $i++)
{
    if($colorArray[$i]['hexCode'] == $selectedColor)
    {
        print '<div class="ink selected" style="background-color: '.$colorArray[$i]['hexCode'].';"></div>';
    }
    else
    {
        print '<div class="ink" style="background-color: ' . $colorArray[$i]['hexCode'] . ';"></div>';
    }
}