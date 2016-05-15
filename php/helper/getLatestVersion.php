<?php

$url = 'http://max-spaghettic0der.rhcloud.com/version.txt';
/*
$url = <<<'CONTENT'
1.0.1
16
CONTENT;*/
$version = file_get_contents($url);
//echo $version;
$version = explode("\n", $version);


