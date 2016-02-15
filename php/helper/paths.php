<?php
//This file is in "codera/php/helper/"

$path_index = realpath(dirname(__FILE__) . '/../index.php');
$path_index = substr($path_index,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_index = str_replace('\\', '/', $path_index);

$path_config_generalSettings = realpath(dirname(__FILE__) . '/../../config/generalSettings.json');
$path_helper_getGeneralSettings = realpath(dirname(__FILE__) . '/getGeneralSettingsFromJSON.php');
$path_header = realpath(dirname(__FILE__) . '/../templates/header.php');
$path_header_logout = realpath(dirname(__FILE__) . '/../templates/header-logout.php');

$path_logout = realpath(dirname(__FILE__) . '/../logout.php');
$path_logout = substr($path_logout,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_logout = str_replace('\\', '/', $path_logout);

$path_admin = realpath(dirname(__FILE__) . '/../restricted/admin.php');
$path_admin = substr($path_admin,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_admin = str_replace('\\', '/', $path_admin);
?>