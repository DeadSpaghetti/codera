<?php
unlink("createAdmin.php");
unlink("deleteInstaller.php");
unlink("installer.php");
unlink("setSalt.php");
unlink("chmodCodera.php");
rmdir(getcwd());
header("Location: ../login.php");