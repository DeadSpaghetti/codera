<?php
$inDev = false;
include "getGeneralSettingsFromJSON.php";
if (!$inDev)
{
    $url = 'https://raw.githubusercontent.com/DeadSpaghetti/codera/master/config/version.txt';
    $version = file_get_contents($url);
    $version = explode("\n", $version);
}
else
{
    $url = 'https://raw.githubusercontent.com/DeadSpaghetti/codera/indev/config/version.txt';
    $version = file_get_contents($url);
    $version = explode("\n", $version);
}

