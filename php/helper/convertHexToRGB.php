<?php
function convertHexToRGB($hex)
{		
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	echo "$r, $g, $b";
}
