<?php
if(!isset($_SESSION))
{
	session_start();
} 
define('ADMIN_FILE_PATH','../../config/admin.json');


function createUser($username, $password)
{
    //create new user!
    $fileHandle = fopen(ADMIN_FILE_PATH, "w");
    $adminInfoArray = array
    (
        'username' => $username,
        'password' => $password
    );

    fwrite($fileHandle, json_encode($adminInfoArray));
    fclose($fileHandle);

    echo 'UsernameCreated!';
}

function checkLoginData($username,$password)
{
    $adminFile = file_get_contents(ADMIN_FILE_PATH);

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

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $forceOverride = $_POST['forceOverride'];

    if(!isset($forceOverride) || $forceOverride == null)
        $forceOverride = false;

    if (isset($username) && isset($password) && $username != "" && $password != "")
    {
        $password = crypt($password, '$5$g3t#~34uö@$');
        $username = crypt($username, '$5$g3t#~34uö@$');

        if (file_exists(ADMIN_FILE_PATH))
        {
            checkLoginData($username, $password);

            //for changing the password & username
            if($forceOverride == true && $_SESSION['loggedIn'] == true)
            {
                createUser($username,$password);
            }
        }
        else
        {
            createUser($username, $password);
        }

    }
    else
    {
        echo "wrongInput";
    }
}