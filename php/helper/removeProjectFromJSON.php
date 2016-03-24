<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;
}



if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $UUID = $_POST['UUID'];
    global $projectArray;
    include "getProjectsFromJSON.php";

    if($projectArray != null && $UUID != null)
    {
        for($i=0; $i < sizeof($projectArray); $i++)
        {
            if($projectArray[$i]->{'UUID'} == $UUID)
            {
                unset($projectArray[$i]);
                $projectArray = array_values($projectArray);

                $jsonString = json_encode($projectArray);
                file_put_contents("../../config/projects.json",$jsonString);
                echo $jsonString;
                break;
            }
        }
    }
}