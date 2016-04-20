<?php
if(!isset($_SESSION))
{
    session_start();
}

//what to reset 'content' || 'settings' || 'everything'
if($_SERVER['REQUEST_METHOD'] == "POST" && $_SESSION['loggedIn'] == "admin")
{
    $resetType = $_POST['resetType'];
    if(isset($resetType) && $resetType != null)
    {
        if ($resetType == "content")
        {
            resetContent();
        }
        elseif ($resetType == "settings")
        {
            resetSettings();
        }
        elseif ($resetType == "everything")
        {
            resetContent();
            resetSettings();
        }
    }
}

function resetContent()
{
    $files = glob('../../images/icons/*'); // get all file names
    foreach($files as $file)
    {
        if(is_file($file))
            unlink($file); // delete file
    }

    $files = glob('../../images/screenshots/*'); // get all file names
    foreach($files as $file)
    {
        if(is_file($file))
            unlink($file); // delete file
    }

    $files = glob('../../executables/*'); // get all file names
    foreach($files as $file)
    {
        if(is_file($file))
            unlink($file); // delete file
    }

    $file = '../../config/projects.json';
        if(is_file($file))
            unlink($file); // delete file

}

function resetSettings()
{
    $files = glob('../../config/*'); // get all file names
    foreach($files as $file)
    {
        if(is_file($file) && $file != "../../config/version.txt" && $file != "../../config/colors.json" && $file != "../../config/projects.json")
            unlink($file); // delete file
    }
}