<?php
include "paths.php";
if(file_exists($path_config_projects))
{
    $userArray = json_decode(file_get_contents($path_config_users),false);
}
else
{
    $projectArray = NULL;
}