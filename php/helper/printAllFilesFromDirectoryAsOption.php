<?php
//this just prints out the files in the directory
if(isset($directory) && $directory != null)
{
    $files = scandir($directory);
    array_splice($files,0,2);   //removes . and ..
    for($i=0; $i < sizeof($files); $i++)
    {
        echo "<option id=".$directory.$files[$i].">$files[$i]</option>";
    }
}
else
{
    echo "<script>alert('printAllFromFromDirectory --> No directory')</script>";
}

