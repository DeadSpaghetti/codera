<?php
if(!isset($_SESSION))
{
    session_start();
}

if($_SESSION['loggedIn'] == "admin" && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    $pathString = "../../config/users.json";
    $isFileThere = false;
    $username = $_POST['username'];
    $password = $_POST['password'];     //encrypted
    $forbiddenProjects = $_POST['forbiddenProjects'];   //as json --> encoded by javascript
    $accountType = $_POST['accountType'];

    if (file_exists($pathString))
    {
        $isFileThere = true;
    }

    try
    {
        if ($isFileThere)
        {
            $configFile = file_get_contents($pathString);
            $array = json_decode($configFile, false);

        }

        $newUserArray = array
        (
            "username" => $username,
            "password" => crypt($password, '$5$g3t#~34uö@$'),
            "accountType" => $accountType,
            "forbiddenProjects" => $forbiddenProjects
        );

        //checks boolean value to see if file is there. If not generates it
        if ($isFileThere)
            array_push($array, $newUserArray);
        else
            $array[0] = $newUserArray;

        //push new reg id into array
        $fileToSave = json_encode($array);
        file_put_contents($pathString, $fileToSave);

    }
    catch (Exception $e)
    {
        var_dump($e);   //TODO remove this from production code sometime
    }

}