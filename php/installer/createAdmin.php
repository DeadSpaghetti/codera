<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $password = $_POST['password'];
    $adminUser = array
    (
        "username" => "admin",
        "password" => $password,
        "accountType" => "admin"
    );

    $publicUser = array
    (
        "username" => "public",
        "accountType" => "user",
        "forbiddenProjects" => []
    );

    $path_config_users = "";
    include "../helper/paths.php";

    //checks boolean value to see if file is there. If not creates new array
    $userArray[0] = $adminUser;
    $userArray[1] = $publicUser;

    $fileToSave = json_encode($userArray, JSON_PRETTY_PRINT);
    file_put_contents($path_config_users, $fileToSave);
}