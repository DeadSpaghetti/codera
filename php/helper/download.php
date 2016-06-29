<?php
if (!isset($_SESSION))
{
    session_start();
}

function increaseDownloadCounter($UUID)
{
    $projectArray = [];
    include "getProjectsFromJSON.php";
    if (!empty($projectArray))
    {
        for ($i = 0; $i < sizeof($projectArray); $i++)
        {
            if ($projectArray[$i]->{'UUID'} == $UUID)
            {
                if (isset($projectArray[$i]->{'totalDownloads'}))
                    $projectArray[$i]->{'totalDownloads'} += 1;
                else
                    $projectArray[$i]->{'totalDownloads'} = 1;

                $path_config_projects = "";
                include "paths.php";
                file_put_contents($path_config_projects, json_encode($projectArray, JSON_PRETTY_PRINT));
                break;
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $filename = $_POST['filename'];
    $UUID = $_POST['UUID'];
//check if file is permitted to be downloaded
    $property = "files";
    $options = null;
    $allowedFilesArray = [];
    include "printAllAvailableOptions.php";
    include_once "functions.php";
    if (!empty($allowedFilesArray))
    {
        for ($j = 0; $j < sizeof($allowedFilesArray); $j++)
        {
            if ($filename == $allowedFilesArray[$j])
            {
                increaseDownloadCounter($UUID);
                clearstatcache();

                if (isUrl($filename))
                {
                    header("Location: " . $filename);
                }
                else
                {
                    header('Content-type: application/bin');
                    header('Content-Disposition: attachment; filename=' . $filename);
                    if (file_exists(realpath("../../executables/" . $filename)))
                        readfile("../../executables/" . $filename);
                }
                break;
            }

        }
    }
}
