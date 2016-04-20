<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $inputString = $_POST['inputString'];
    if(isset($inputString))
    {
        include_once "../helper/functions.php";
        generateSalt($inputString);
    }
}