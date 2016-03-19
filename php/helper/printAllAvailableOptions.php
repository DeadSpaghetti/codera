<?php
if(isset($directory) && $directory != null && isset($UUID) && $UUID != null)
{
    global $projectArray;
    include "getProjectsFromJSON.php";

    for($i=0; $i < sizeof($projectArray); $i++)
    {
        if($projectArray[$i]->{'UUID'} == $UUID)
        {
            $selectedProject = $projectArray[$i];
            $allowedFilesArray = json_decode($selectedProject->{$directory});
            for($j=0; $j < sizeof($allowedFilesArray); $j++)
            {
                echo "<option>" . $allowedFilesArray[$j] . "</option>";
            }

            break;
        }
    }
}