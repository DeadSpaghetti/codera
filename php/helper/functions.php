<?php
function isUserAdmin($username)
{
    global $userArray;
    include "getUsersFromJSON.php";
    for($i=0; $i < sizeof($userArray); $i++)
    {
        if($userArray[$i]->{'username'} == $username)
        {
            if($userArray[$i]->{'accountType'} == "admin")
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}