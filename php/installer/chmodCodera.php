<?php
function chmod_r($Path)
{
    $dp = opendir($Path);
    while($File = readdir($dp))
    {
        if($File != "." && $File != "..")
        {
            if(is_dir($File))
            {
                chmod($File, 0700);
                chmod_r($Path."/".$File);
            }
            else
            {
                chmod($Path."/".$File, 0700);
            }
        }
    }
    closedir($dp);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $path = realpath(dirname(__FILE__) . '/../../../codera');
    chmod_r($path);
}