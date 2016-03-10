<?php
//sorts the projects in the json file
include "paths.php";
global $projectArray;
include "getProjectsFromJSON.php";

usort($projectArray, function($a, $b)
{
    return ($a->name < $b->name) ? -1 : 1;
});

file_put_contents($path_config_projects,json_encode($projectArray));

