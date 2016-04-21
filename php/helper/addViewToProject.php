<?php
if(!isset($_SESSION))
{
    session_start();
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $UUID = $_POST['UUID'];
    $projectArray = [];
    include "getProjectsFromJSON.php";
    if(!empty($projectArray) && isset($UUID))
    {
        for($i=0; $i < sizeof($projectArray); $i++)
        {
            if($projectArray[$i]->{'UUID'} == $UUID)
            {
                if(isset($projectArray[$i]->{'totalViews'}))
                    $projectArray[$i]->{'totalViews'} += 1;
                else
                     $projectArray[$i]->{'totalViews'} = 1;

                $path_config_projects = "";
                include "paths.php";
                file_put_contents($path_config_projects,json_encode($projectArray,JSON_PRETTY_PRINT));
                break;
            }
        }
    }

}