<?php
if(!isset($username))
{
    $username = $_SESSION['loggedIn'];
    if(!isset($username) || $username == null)
    {
        $username = "public";
    }

}

    global $userArray;
    include "getUsersFromJSON.php";
    for ($i = 0; $i < sizeof($userArray); $i++)
    {
        if ($userArray[$i]->{'username'} == $username)
        {
            $forbiddenProjects = json_decode($userArray[$i]->{'forbiddenProjects'});
            break;
        }
    }
