<?php
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
        generateSalt($inputString);
    }
}