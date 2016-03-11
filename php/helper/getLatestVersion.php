<?php
$url = "https://spaghettic0der.noip.me/codera/config/version.txt";

$version = file_get_contents($url);
$version = explode("\n", $version);
?>
