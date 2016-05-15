<?php
//$url = "https://spaghettic0der.noip.me/codera/config/version.txt";
$url = <<<'CONTENT'
1.0.1
16
CONTENT;
//$version = file_get_contents($url);
$version = explode("\n", $url);


