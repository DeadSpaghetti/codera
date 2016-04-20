<?php
unlink("createAdmin.php");
unlink("deleteInstaller.php");
unlink("installer.php");
unlink("setSalt.php");
rmdir(getcwd());
header("Location: ../login.php");