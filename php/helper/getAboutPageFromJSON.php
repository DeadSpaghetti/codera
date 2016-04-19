<?php
global $path_config_about;
include "paths.php";

if(file_exists($path_config_about))
{
    $aboutArray = json_decode(file_get_contents($path_config_about));
    $aboutIcon = $aboutArray->{'aboutIcon'};
    $aboutText = $aboutArray->{'aboutText'};
}