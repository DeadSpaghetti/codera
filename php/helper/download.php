<?php
if(!isset($_SESSION))
{
    session_start();
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $filename = $_POST['filename'];
    $UUID = $_POST['UUID'];

//check if file is permitted to be downloaded
    $property = "files";
    $options = null;
    global $allowedFilesArray;
    include "printAllAvailableOptions.php";

    for ($i = 0; $i < sizeof($allowedFilesArray); $i++)
    {
        if ($filename == $allowedFilesArray[$i])
        {
            header('Content-type: application/bin');
            header('Content-Disposition: attachment; filename=' . $filename);
            readfile("../../executables/" . $filename);
            break;
        }
    }
}

