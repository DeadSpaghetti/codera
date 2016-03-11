<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $UUID = $_POST['UUID'];
    global $projectArray;
    include "getProjectsFromJSON.php";
    for($i=0; $i < sizeof($projectArray); $i++)
    {
        if($projectArray[$i]->{'UUID'} == $UUID)
        {
            echo $projectArray[$i]->{'projectStatus'};
            break;
        }
    }
}