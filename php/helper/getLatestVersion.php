<?php

$url = 'https://raw.githubusercontent.com/DeadSpaghetti/codera/master/config/version.txt';
$version = file_get_contents($url);
//echo $version;
$version = explode("\n", $version);


