<?php

if(!function_exists("convertHexToRGB"))
{
	function convertHexToRGB($hex)
	{		
		list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
		echo "$r, $g, $b";
	}
}

if(!function_exists("getBrightnessOfHexColor"))
{
	function getBrightnessOfHexColor($hex)
	{
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
		
		return $r + $g + $b;
	}
}