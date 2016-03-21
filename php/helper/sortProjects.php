<?php
//sorts the projects in the json file
include "paths.php";
global $projectArray;
include "getProjectsFromJSON.php";
if(!isset($sortOrder) || $sortOrder == null)
    $sortOrder = "a-z";

if($sortOrder == "a-z")
{
    usort($projectArray, function ($a, $b)
    {
        return ($a->name < $b->name) ? -1 : 1;
    });
}
elseif($sortOrder == "z-a")
{
    usort($projectArray, function ($a, $b)
    {
        return ($a->name > $b->name) ? -1 : 1;
    });
}
elseif($sortOrder == "latestUpdate")
{
    usort($projectArray, function ($a, $b)
    {
        return (strtotime($a->date) > strtotime($b->date)) ? -1 : 1;
    });

}
elseif ($sortOrder == "latestUpdateReversed")
{
    usort($projectArray, function ($a, $b)
    {
        return (strtotime($a->date) < strtotime($b->date)) ? -1 : 1;
    });
}
file_put_contents($path_config_projects,json_encode($projectArray));

