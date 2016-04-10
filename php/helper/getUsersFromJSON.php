<?php
global $path_config_users;
include "paths.php";
if(file_exists($path_config_users))
{
    $userJSON = "";
    include $path_config_users;
    $userArray = json_decode($userJSON,false);
}
else
{
    $userArray = null;
}