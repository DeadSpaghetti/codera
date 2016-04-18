<?php
$path_config_users = "";
include "paths.php";
if(file_exists($path_config_users))
{
    $userArray = json_decode(file_get_contents($path_config_users),false);
}
else
{
    $userArray = null;
}