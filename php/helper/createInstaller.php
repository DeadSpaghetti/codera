<?php
if(!isset($_SESSION))
{
    session_start();
}
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != "admin")
    exit;

$installerString = <<<'INSTALLER'
<!DOCTYPE html>

<?php


if($_GET)
{
    $step = $_GET['step'];
    if(isset($step))
    {
        if ($step < 1 || $step > 5)
        {
            $step = 0;
        }
    }
}
else
{
    $step = 0;
}
?>

<html>
<head>
    <title>Codera installation</title>
    <meta charset="UTF_8"/>
    <link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/stylesheet-installer.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="../../js/installer.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

</head>
<body>
<div id="main">
    <div id="content">
        <div id="white">
            <div class="installer-head">
                Codera Installation
            </div>
            <div class="line"></div>
            <div class="installer-content">

                <?php

                if($step == 0)
                {
                    echo '<span class="installer-sub-headline">Welcome to the official Codera Installation!</span>'.
                        '<br> <br>'.
                        'Thank you for downloading Codera.<br>'.
                        'We hope that Codera will make your life easier when it comes to software deployment.'.
                        '<br> <br>'.
                        'The installation will only take a few minutes.'.
                        '<br> <br>'.
                        'Just hit the continue button and we will start.'.
                        '<br> <br>'.
                        '<a class="button" id="button-continue-step0" href="javascript:void(null)">'.
                        '<span class="button-text">Continue</span><i class="material-icons">navigate_next</i>'.
                        '</a>'.
                        '</div>'.
                        '<br>';
                }
                else if($step == 1)
                {
                    echo '<span class="installer-sub-headline">Step 1: License Agreement</span>'.
                        '<br> <br>'.
                        'Codera is distributed under the MIT License.'.
                        '<br> <br>'.
                        'The MIT License (MIT)'.
                        '<br> <br>'.
                        'Copyright (c) 2016 deadlocker8 &amp; spaghettic0der'.
                        '<br> <br>'.
                        '<div class="installer-text-block">'.
                        'Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:'.
                        '<br> <br>'.
                        'The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.'.
                        '<br> <br>'.
                        'THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.'.
                        '</div>'.
                        '<br> <br>'.
                        '<a class="button" id="button-continue-step1" href="javascript:void(null)">'.
                        '<span class="button-text">Agree</span><i class="material-icons">navigate_next</i>'.
                        '</a>'.
                        '</div>';

                    echo '<div class="installer-progress-container">'.
                        '<div class="installer-progress">'.
                        '<div class="circle active">1</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line"></div>'.
                        '</div>'.
                        '<div class="circle">2</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line"></div>'.
                        '</div>'.
                        '<div class="circle">3</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line"></div>'.
                        '</div>'.
                        '<div class="circle">4</div>'.
                        '</div>'.
                        '</div>';
                }
                else if($step == 2)
                {
                    echo '<span class="installer-sub-headline">Step 2: Read and Write Access</span>'.
						'<br> <br>'.
						'To ensure a proper functionality of codera you have to grant<br> read and write access '.
						'to all files and folders in the codera folder.'.
						'<br> <br>'.
						'You can use this command:'.
						'<br> <br>'.
						'<code>sudo chmod -R 700</code>'.
						'<br> <br>'.							
						'<a class="button" id="button-continue-step2" href="javascript:void(null)">'.
                        '<span class="button-text">Continue</span><i class="material-icons">navigate_next</i>'.
                        '</a>'.
                        '</div>';

                    echo '<div class="installer-progress-container">'.
                        '<div class="installer-progress">'.
                        '<div class="circle done">✔</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line done"></div>'.
                        '</div>'.
                        '<div class="circle active">2</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line"></div>'.
                        '</div>'.
                        '<div class="circle">3</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line"></div>'.
                        '</div>'.
                        '<div class="circle">4</div>'.
                        '</div>'.
                        '</div>';
                }
                else if($step == 3)
                {
                    echo '<span class="installer-sub-headline">Step 3: Create Random Salt</span>'.
                        '<br> <br>'.
                        'For a powerful, unique and secure encryption of your user passwords <br> you have to enter a random combination of alphanumeric characters.'.
                        '<br> <br>'.
                        "(You don't have to remember this combination. You will never be asked for it.)".
                        '<br> <br> <br>'.
                        'Enter your combination here (at least 5 characters):'.
                        '<br>'.
                        '<input id="installer-input-salt" type="text"/>'.
                        '<br> <br>'.
                        '<a class="button" id="button-continue-step3" href="javascript:void(null)">'.
                        '<span class="button-text">Continue</span><i class="material-icons">navigate_next</i>'.
                        '</a>'.
                        '</div>';

                    echo '<div class="installer-progress-container">'.
                        '<div class="installer-progress">'.
                        '<div class="circle done">✔</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line done"></div>'.
                        '</div>'.
                        '<div class="circle done">✔</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line done"></div>'.
                        '</div>'.
                        '<div class="circle active">3</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line"></div>'.
                        '</div>'.
                        '<div class="circle">4</div>'.
                        '</div>'.
                        '</div>';
                }
                else if($step == 4)
                {
                    echo '<span class="installer-sub-headline">Step 4: Change Default Password</span>'.
                        '<br> <br>'.
                        "The last thing you have to do ist to change your superadmin password.".
                        '<br> <br> <br>'.
                        'Enter your new password here:'.
                        '<br>'.
                        '<input id="installer-input-password" "type="text"/>'.
                        '<br> <br>'.
                        '<a class="button" id="button-continue-step4" href="javascript:void(null)">'.
                        '<span class="button-text">Continue</span><i class="material-icons">navigate_next</i>'.
                        '</a>'.
                        '</div>';

                    echo '<div class="installer-progress-container">'.
                        '<div class="installer-progress">'.
                        '<div class="circle done">✔</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line done"></div>'.
                        '</div>'.
                        '<div class="circle done">✔</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line done"></div>'.
                        '</div>'.
                        '<div class="circle done">✔</div>'.
                        '<div class="progress-line-container">'.
                        '<div class="progress-line done"></div>'.
                        '</div>'.
                        '<div class="circle active">4</div>'.
                        '</div>'.
                        '</div>';
                }
                if($step == 5)
                {
                    echo '<span class="installer-sub-headline">Codeare successfully installed!</span>'.
                        '<br> <br>'.
                        'Congratulations.<br>'.
                        'You have successfully installed codera on your system.'.
                        '<br> <br> <br>'.
                        'For additonal information or help visit the official <a class="link-visible" href="https://github.com/spaghettic0der/codera">Codera Githubpage</a>.'.
                        '<br> <br>'.
                        '<a class="button" id="installer-button-finish" href="javascript:void(null)">'.
                        '<span class="button-text">Finish</span><i class="material-icons">done</i>'.
                        '</a>'.
                        '</div>'.
                        '<br>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

INSTALLER;

$createAdmin = <<<'CREATE_ADMIN'
<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include_once "../helper/functions.php";
    $password = $_POST['password'];
    $adminUser = array
    (
        "username" => "admin",
        "password" => crypt($password, getSalt()),
        "accountType" => "admin"
    );

    $publicUser = array
    (
        "username" => "public",
        "accountType" => "user",
        "forbiddenProjects" => "[]"
    );

    $path_config_users = "../../config/users.json";
    //checks boolean value to see if file is there. If not creates new array
    $userArray[0] = $adminUser;
    $userArray[1] = $publicUser;

    $fileToSave = json_encode($userArray, JSON_PRETTY_PRINT);
    file_put_contents($path_config_users, $fileToSave);
}
CREATE_ADMIN;

$setSalt = <<<'SET_SALT'
<?php
function generateSalt($randomString)
{
    if(isset($randomString))
    {
        $path_config_salt = "../../config/salt.txt";
        $saltToWrite = '$5$rounds=5000$' . $randomString . '$';
        file_put_contents($path_config_salt, $saltToWrite);
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $inputString = $_POST['inputString'];
    if(isset($inputString))
    {
        generateSalt($inputString);
    }
}
SET_SALT;

$deleteInstaller = <<<'DELETE_INSTALLER'
<?php
unlink("createAdmin.php");
unlink("deleteInstaller.php");
unlink("installer.php");
unlink("setSalt.php");
rmdir(getcwd());
header("Location: ../login.php");
DELETE_INSTALLER;


mkdir("../installer");
file_put_contents("../installer/installer.php",$installerString);
file_put_contents("../installer/setSalt.php",$setSalt);
file_put_contents("../installer/createAdmin.php",$createAdmin);
file_put_contents("../installer/deleteInstaller.php",$deleteInstaller);
header("Location: ../installer/installer.php");


