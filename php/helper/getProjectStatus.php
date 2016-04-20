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
        for ($i = 0; $i < sizeof($projectArray); $i++)
        {
            if ($projectArray[$i]->{'UUID'} == $UUID)
            {
                echo $projectArray[$i]->{'projectStatus'};
                break;
            }
        }
    }
}