<?php
//This file is in "codera/php/helper/"

$path_index = realpath(dirname(__FILE__) . '/../index.php');
$path_index = substr($path_index,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_index = str_replace('\\', '/', $path_index);

$path_folder_icons = realpath(dirname(__FILE__) . '/../../images/icons');
$path_folder_icons = substr($path_folder_icons,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_folder_icons = str_replace('\\', '/', $path_folder_icons);

$path_config_generalSettings = realpath(dirname(__FILE__) . '/../../config/generalSettings.json');
$path_config_projects = realpath(dirname(__FILE__) . '/../../config/projects.json');
$path_config_users = realpath(dirname(__FILE__) . '/../../config/users.json');
$path_config_about = realpath(dirname(__FILE__) . '/../../config/about.json');
$path_helper_getGeneralSettings = realpath(dirname(__FILE__) . '/getGeneralSettingsFromJSON.php');
$path_header = realpath(dirname(__FILE__) . '/../templates/header.php');
$path_header_logout = realpath(dirname(__FILE__) . '/../templates/header-logout.php');
$path_header_logout_back = realpath(dirname(__FILE__) . '/../templates/header-logout-back.php');

$path_logout = realpath(dirname(__FILE__) . '/../logout.php');
$path_logout = substr($path_logout,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_logout = str_replace('\\', '/', $path_logout);

$path_admin = realpath(dirname(__FILE__) . '/../restricted/admin.php');
$path_admin = substr($path_admin,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_admin = str_replace('\\', '/', $path_admin);

$path_footer_github_icon = realpath(dirname(__FILE__) . '/../../images/icons/GitHub-icon.png');
$path_footer_github_icon = substr($path_footer_github_icon,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_footer_github_icon = str_replace('\\', '/', $path_footer_github_icon);

$path_account = realpath(dirname(__FILE__) . '/../restricted/account.php');
$path_account = substr($path_account,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_account = str_replace('\\', '/', $path_account);

$path_about = realpath(dirname(__FILE__) . '/../about.php');
$path_about = substr($path_about,strlen($_SERVER['DOCUMENT_ROOT'])); 
$path_about = str_replace('\\', '/', $path_about);
?>