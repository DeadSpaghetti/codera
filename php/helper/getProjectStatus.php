<?php
if (!isset($_SESSION))
{
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $canvasObjectArray = json_decode($_POST['canvasObjectArray']);

    $projectArray = [];
    include "getProjectsFromJSON.php";
    if (!empty($projectArray) && isset($canvasObjectArray))
    {
        for ($j = 0; $j < sizeof($canvasObjectArray); $j++)
        {
            for ($i = 0; $i < sizeof($projectArray); $i++)
            {
                if ($projectArray[$i]->{'UUID'} == $canvasObjectArray[$j]->{'id'})
                {
                    $canvasObjectArray[$j]->{'status'} = $projectArray[$i]->{'projectStatus'};
                }
            }
        }
        echo json_encode($canvasObjectArray);
    }

}