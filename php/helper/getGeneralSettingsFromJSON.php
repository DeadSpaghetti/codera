<?php
include (realpath(dirname(__FILE__) . '/../helper/paths.php'));
 
$filename = $path_config_generalSettings;

if(file_exists($filename))
{
    $settings = json_decode(file_get_contents($filename));
    $developerName = $settings->{'developerName'};
    $colorScheme = $settings->{'colorScheme'};
    $gridSize = $settings->{'gridSize'};
    $sortOrder = $settings->{'sortOrder'};
}
else
{
	$developerName = "MyEpicDeveloperName";
    $colorScheme = "#4a98d3";
    $gridSize = "3";
    $sortOrder = "a-z";
}