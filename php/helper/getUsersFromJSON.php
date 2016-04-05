<?php
include "paths.php";
if(file_exists($path_config_users))
{
    global $jsonString;
    include $path_config_users;
    $userArray = json_decode($jsonString,false);
}
else
{
    $userArray = null;
}