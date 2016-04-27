<?php
function createDirectories()
{
    if(!file_exists("../../images"))
        mkdir("../../images");

    if(!file_exists("../../images/icons/"))
        mkdir("../../images/icons");

    if(!file_exists("../../images/screenshots/"))
        mkdir("../../images/screenshots");

    if(!file_exists("../../executables"))
        mkdir("../../executables");

    if(!file_exists("../../licenses"))
        mkdir("../../licenses");

}

function generateSalt($randomString)
{
    if(isset($randomString))
    {
        $path_config_salt = "../../config/salt.txt";
        $saltToWrite = '$5$rounds=5000$' . $randomString . '$';
        file_put_contents($path_config_salt, $saltToWrite);
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $inputString = $_POST['inputString'];
    if(isset($inputString))
    {
        createDirectories();
        generateSalt($inputString);
    }
}