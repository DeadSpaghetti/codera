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
	$userArray = [];
	include "getUsersFromJSON.php";

	$path_config_users = "";
	include "paths.php";

	if(!empty($userArray))
	{
		for ($i = 0; $i < sizeof($userArray); $i++)
		{
			if ($userArray[$i]->{'username'} == $username)
			{
				if ($username != "admin" && $username != "public")
				{
					if ($username == "New User" && $newUsername != "admin" && $newUsername != "public")
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
					$userArray[$i]->{'username'} = "public";
					$userArray[$i]->{'forbiddenProjects'} = $forbiddenProjects;
					$userArray[$i]->{'accountType'} = "user";
				}
				elseif ($username == "admin")
				{
					$userArray[$i]->{'username'} = "admin";
					$userArray[$i]->{'accountType'} = "admin";
					$userArray[$i]->{'forbiddenProjects'} = "[]";
				}

				if (isset($password) && $password != "" && !is_null($password) && $username != "public")
					$userArray[$i]->{'password'} = crypt($password, getSalt());

				include_once "functions.php";
				file_put_contents($path_config_users, json_encode(getSortedUserArray($userArray), JSON_PRETTY_PRINT));
				break;
			}
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
}

function saveJSONArray($newUserArray)
{
	$path_config_users = "";
	include "paths.php";
	$userArray = [];
	include "getUsersFromJSON.php";

	//checks boolean value to see if file is there. If not creates new array
	if (!empty($userArray))
		array_push($userArray, $newUserArray);
	else
		$array[0] = $newUserArray;

	include_once "functions.php";
	$fileToSave = json_encode(getSortedUserArray($userArray),JSON_PRETTY_PRINT);
	file_put_contents($path_config_users,$fileToSave);

}

