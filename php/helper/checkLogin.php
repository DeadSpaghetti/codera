<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username) && isset($password) && $username != "" && $password != "")
{
    $salt = file_get_contents('../../config/salt.txt');
    $adminFilePath = '../../config/admin.json';

    $password = crypt($password, '$5$g3t#~34uö@$');
    $username = crypt($username, '$5$g3t#~34uö@$');


    if (file_exists($adminFilePath))
    {
        $adminFile = file_get_contents($adminFilePath);
        //echo $adminFile;
        $adminFileArray = json_decode($adminFile, true);

        if ($adminFileArray['username'] == $username && $adminFileArray['password'] == $password)
        {
            echo 'success';
            $_SESSION['loggedIn'] = true;
        }
        else
        {
            echo 'failure';
        }
    }
    else
    {
        //create new user!
        $fileHandle = fopen($adminFilePath, "w");
        $adminInfoArray = array
        (
            'username' => $username,
            'password' => $password
        );

        fwrite($fileHandle, json_encode($adminInfoArray));
        fclose($fileHandle);

        echo 'UsernameCreated!';
    }
}
else
{
    echo "wrongInput";
}