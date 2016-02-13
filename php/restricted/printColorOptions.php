<?php
if(!isset($_SESSION))
{
	session_start();
}  

$colorPath = "../../config/colors.json";
$colorConfigFile = file_get_contents($colorPath);
$colorArray = json_decode($colorConfigFile,true);

for($i = 0; $i < sizeof($colorArray); $i++)
{  
	print '<div class="ink" style="background-color: '.$colorArray[$i]['hexCode'].';"></div>';
}