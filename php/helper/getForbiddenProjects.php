<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($username))
{
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == null)
    {
        $username = "public";
    }
    else
    {
        $username = $_SESSION['loggedIn'];
    }

}
    $userArray = [];
    include "getUsersFromJSON.php";
    if(!empty($userArray))
    {
        for ($i = 0; $i < sizeof($userArray); $i++)
        {
            if ($userArray[$i]->{'username'} == $username)
            {
                $forbiddenProjectsJSON = $userArray[$i]->{'forbiddenProjects'};
                if(!empty($forbiddenProjectsJSON))
                    $forbiddenProjects = json_decode($forbiddenProjectsJSON);

                break;
            }
        }
    }