<?php
if (!isset($_SESSION))
{
    session_start();
}

include_once "functions.php";
$projectArray = [];
include "getProjectsFromJSON.php";

if (!empty($projectArray))
{
    for ($i = 0; $i < sizeof($projectArray); $i++)
    {
        if ($UUID == $projectArray[$i]->{'UUID'})
        {
            $files = json_decode($projectArray[$i]->{'files'});
            for ($j = 0; $j < sizeof($files); $j++)
            {
                //url is always selected. Not a file!
                if (isUrl($files[$j]))
                {
                    echo "<option id=" . $files[$j] . " selected>$files[$j]</option>";
                }
            }
        }
    }
}