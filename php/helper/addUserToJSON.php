<?php
if(!isset($_SESSION))
{
    session_start();
}

include_once "functions.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$salt = '$5$g3t#~34uö@$';
	$pathString = "../../config/users.json";
	$username = $_POST['username'];
	$postPassword = $_POST['password'];
	$forbiddenProjects = $_POST['forbiddenProjects'];   //as json --> encoded by javascript
	$accountType = $_POST['accountType'];
	$oldPassword = $_POST['oldPassword'];
	$source = $_POST['source'];

	$userAlreadyExists = doesUserExist($username);

	//admin is allowed to change every password --> no check needed
	if(isUserAdmin($_SESSION['loggedIn']))
	{
		if($source == "account")
		{
			addUser("copyProperties",$pathString,$username,$postPassword,
				null,null,$userAlreadyExists, $salt);
		}
		else
		{
			addUser("", $pathString, $username, $postPassword,
				$forbiddenProjects, $accountType, $userAlreadyExists, $salt);
		}
	}
	else
	{
		if(crypt($oldPassword,$salt) == getPassword($username))
		{
			addUser("copyProperties",$pathString,$username,$postPassword,
				null,null,$userAlreadyExists, $salt);
		}
	}

}


function addUser ($type,$pathString,$username,$postPassword,
				  $forbiddenProjects,$accountType,$userAlreadyExists,$salt)
{

	
	if($type == "copyProperties")
	{
		global $userArray;	
		for($i=0; $i < sizeof($userArray); $i++)
		{
			if($userArray[$i]->{'username'} == $username)
			{			
				$forbiddenProjects = $userArray[$i]->{'forbiddenProjects'};
				$accountType = $userArray[$i]->{'accountType'};
				break;
			}
		}
	}

	if($userAlreadyExists)
	{
		if($postPassword == "" || $postPassword == null)
		{
			$password = deleteUser($username);
		}
		else
		{
			deleteUser($username);
			$password = crypt($postPassword,$salt);
		}
	}
	else
	{
		$password =  crypt($postPassword,$salt);
	}

	$fileIsThere = false;
	if (file_exists($pathString))
	{
		$fileIsThere = true;
		$configFile = file_get_contents($pathString);
		$array = json_decode($configFile, false);
	}

	if($username != "admin" && $username != "public")
	{
		$newUserArray = array
		(
			"username" => $username,
			"password" => $password,
			"accountType" => $accountType,
			"forbiddenProjects" => $forbiddenProjects
		);
	}
	else
	{
		if($username == "admin")
		{
			$newUserArray = array
			(
				"username" => $username,
				"password" => $password,
				"forbiddenProjects" => "[]",
				"accountType" => "admin",
			);
		}
		elseif($username == "public")
		{
			$newUserArray = array
			(
				"username" => $username,
				"forbiddenProjects" => $forbiddenProjects,
				"accountType" => "user"
			);
		}

	}
	//checks boolean value to see if file is there. If not creates new array
	if ($fileIsThere)
		array_push($array, $newUserArray);
	else
		$array[0] = $newUserArray;

	$fileToSave = json_encode($array);
	file_put_contents($pathString, $fileToSave);

	$sortType = "users";
	include "sort.php";
}

