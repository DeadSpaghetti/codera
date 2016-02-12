<?php
session_start();


$colorPath = "../config/colors.json";
$colorConfigFile = file_get_contents($colorPath);
$colorArray = json_decode($colorConfigFile,true);

for($i = 0; $i < sizeof($colorArray); $i++)
{
    print "<option value=$colorArray[$i]['hexCode']>".$colorArray[$i]['color'] . "</option>";
}
