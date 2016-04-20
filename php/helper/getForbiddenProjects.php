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
    for ($i = 0; $i < sizeof($userArray); $i++)
    {
        if ($userArray[$i]->{'username'} == $username)
        {
            $forbiddenProjects = json_decode($userArray[$i]->{'forbiddenProjects'});
            break;
        }
    }
