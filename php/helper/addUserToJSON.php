<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once "functions.php";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$salt = getSalt();
	$username = $_POST['username'];
	$postPassword = $_POST['password'];
	$forbiddenProjects = $_POST['forbiddenProjects'];   //as json --> encoded by javascript
	$accountType = $_POST['accountType'];
	$newUsername = $_POST['newUsername'];

	$userAlreadyExists = doesUserExist($username);

	//admin is allowed to change every password --> no check needed
	if(isUserAdmin($_SESSION['loggedIn']))
	{
		if (!$userAlreadyExists)
		{
			addUser($newUsername, crypt($postPassword,$salt), $forbiddenProjects, $accountType);
		}
		else
		{
			overrideUserProperties($username,$postPassword,$forbiddenProjects,$accountType,$newUsername);
		}
	}
}

function overrideUserProperties($username,$password,$forbiddenProjects,$accountType,$newUsername)
{
	global $userArray;
	include "getUsersFromJSON.php";

	global $path_config_users;
	include "paths.php";

	for($i=0; $i < sizeof($userArray); $i++)
	{
		if($userArray[$i]->{'username'} == $username)
		{
			if($username != "admin" && $username != "public")
			{
				if($username == "New User" && $newUsername != "admin" && $newUsername != "public")
				{
					$username = $newUsername;
				}

				if (isset($newUsername) && $newUsername != "admin" && $newUsername != "public")
					$username = $newUsername;


					$userArray[$i]->{'username'} = $username;
					$userArray[$i]->{'forbiddenProjects'} = $forbiddenProjects;
					$userArray[$i]->{'accountType'} = $accountType;
			}
			elseif ($username == "public")
			{
				$userArray[$i]->{'forbiddenProjects'} = $forbiddenProjects;
			}
			if(isset($password) && $password != "" && !is_null($password) && $username != "public")
				$userArray[$i]->{'password'} = crypt($password,getSalt());

			//saveJSONArray($userArray);
			saveJSONToPHP($path_config_users,json_encode($userArray));
			break;
		}
	}
}


function addUser ($username,$password, $forbiddenProjects,$accountType)
{

	if($username != "admin" && $username != "public")
	{
		$newUserArray = array
		(
			"username" => $username,
			"password" => $password,
			"accountType" => $accountType,
			"forbiddenProjects" => $forbiddenProjects
		);
		saveJSONArray($newUserArray);
	}
	else
	{
		if($username == "admin")
		{
			$newUserArray = array
			(
				"username" => "admin",
				"password" => $password,
				"forbiddenProjects" => "[]",
				"accountType" => "admin",
			);
			saveJSONArray($newUserArray);
		}
		elseif($username == "public")
		{
			$newUserArray = array
			(
				"username" => "public",
				"forbiddenProjects" => $forbiddenProjects,
				"accountType" => "user"
			);
			saveJSONArray($newUserArray);
		}

	}

}

function saveJSONArray($newUserArray)
{
	global $path_config_users;
	include "paths.php";

	$fileIsThere = false;
	if (file_exists($path_config_users))
	{
		$fileIsThere = true;
		global $jsonString;
		include $path_config_users;
		$array = json_decode($jsonString,false);
	}

	//checks boolean value to see if file is there. If not creates new array
	if ($fileIsThere)
		array_push($array, $newUserArray);
	else
		$array[0] = $newUserArray;

	$fileToSave = json_encode($array);
	saveJSONToPHP($path_config_users,$fileToSave);

	$sortType = "users";
	include "sort.php";
}

