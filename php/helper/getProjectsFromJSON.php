<?php

if(file_exists($path_config_projects))
{
	$projectArray = json_decode(file_get_contents($path_config_projects),false);
}
else
{
	$projectArray = NULL;
}