<?php
if(!isset($_SESSION))
{
    session_start();
}

include_once "functions.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && isUserAdmin($_SESSION['loggedIn']))
{
	$stringNoOptionSelected = "Select an Option";
	
    $date = $_POST['date'];
    $name = $_POST['name'];
    $icon = $_POST['icon']; //path to icon
	if(strcmp($icon, $stringNoOptionSelected) == 0)
	{
		$icon = "";
	}	
    $versionName = $_POST['versionName'];
    $latestChanges = $_POST['latestChanges'];
    $description = $_POST['description'];
    $requirements = $_POST['requirements'];
    $files = $_POST['files'];
    $screenshots = $_POST['screenshots'];
    $license = $_POST['license'];
	if(strcmp($license, $stringNoOptionSelected) == 0)
	{
		$license = "";
	}
    $versionCode = $_POST['versionCode'];
    $projectStatus = $_POST['projectStatus'];
    $url = $_POST['url'];
    $starred = $_POST['starred'];
    $UUID = $_POST['UUID'];

    $projectArray = [];
    include "getProjectsFromJSON.php";
    if(!empty($projectArray))
    {
        for($i=0; $i < sizeof($projectArray); $i++)
        {
            if($projectArray[$i]->{'UUID'} == $UUID)
            {
                $projectArray[$i]->{'name'} = $name;
                $projectArray[$i]->{'icon'} = $icon;
                $projectArray[$i]->{'versionName'} = $versionName;
                $projectArray[$i]->{'date'} = $date;
                $projectArray[$i]->{'latestChanges'} = $latestChanges;
                $projectArray[$i]->{'description'} = $description;
                $projectArray[$i]->{'requirements'} = $requirements;
                $projectArray[$i]->{'files'} = $files;
                $projectArray[$i]->{'screenshots'} = $screenshots;
                $projectArray[$i]->{'license'} = $license;
                $projectArray[$i]->{'versionCode'} = $versionCode;
                $projectArray[$i]->{'projectStatus'} = $projectStatus;
                $projectArray[$i]->{'url'} = $url;
                $projectArray[$i]->{'starred'} = $starred;

                $path_config_projects = "";
                include "paths.php";
                file_put_contents($path_config_projects,json_encode($projectArray,JSON_PRETTY_PRINT));
                break;
            }
        }
    }


}
