<?php
//sorts the projects in the json file | or users
global $path_config_users;
include "paths.php";
include_once "functions.php";

if(!isset($sortType))
{
    $sortType = "projects";
}

if($sortType == "projects")
{
    global $projectArray;
    include "getProjectsFromJSON.php";
    $array = $projectArray;
}
elseif($sortType = "users")
{
    global $userArray;
    include "getUsersFromJSON.php";
    $array = $userArray;
}


if(!isset($sortOrder) || $sortOrder == null)
    $sortOrder = "a-z";

if($sortOrder == "a-z")
{
    if($sortType == "projects")
    {
        usort($array, function ($a, $b)
        {

            return ($a->name < $b->name) ? -1 : 1;
        });
    }
    elseif ($sortType == "users")
    {
        usort($array, function ($a, $b)
        {
            return ($a->username < $b->username) ? -1 : 1;
        });
    }
}
elseif($sortOrder == "z-a")
{
    if($sortType == "projects")
    {
        usort($array, function ($a, $b)
        {
            return ($a->name > $b->name) ? -1 : 1;
        });
    }
    elseif ($sortType == "users")
    {
        usort($array, function ($a, $b)
        {
            return ($a->username > $b->username) ? -1 : 1;
        });
    }
}
elseif($sortOrder == "latestUpdate" && $sortType == "projects")
{
    usort($array, function ($a, $b)
    {
        return (strtotime($a->date) > strtotime($b->date)) ? -1 : 1;
    });

}
elseif ($sortOrder == "latestUpdateReversed" && $sortType == "projects")
{
    usort($array, function ($a, $b)
    {
        return (strtotime($a->date) < strtotime($b->date)) ? -1 : 1;
    });
}

if(isset($array))
{
    if ($sortType == "projects")
    {
        file_put_contents($path_config_projects, json_encode($array));
    }

}