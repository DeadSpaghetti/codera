<?php
function chmod_r($Path)
{
    $dp = opendir($Path);
    while($File = readdir($dp))
    {
        if($File != "." AND $File != "..")
        {
            if(is_dir($File))
            {
                file_put_contents("test.txt",$File);
                chmod($File, 0750);
                chmod_r($Path."/".$File);
            }
            else
            {
                chmod($Path."/".$File, 0644);
            }
        }
    }
    closedir($dp);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    chmod_r("../../.");
}