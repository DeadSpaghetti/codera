<?php
//this just prints out the files in the directory
if(isset($directory) && $directory != null)
{
    $files = scandir($directory);
    array_splice($files,0,2);   //removes . and ..
    echo "<option id='emptyOption'></option>";
    for($i=0; $i < sizeof($files); $i++)
    {
        if(isset($exclude) && $exclude == $files[$i])
        {
            echo "<option id=" . $directory . $files[$i] . " selected>$files[$i]</option>";
        }
        else
        {
            echo "<option id=" . $directory . $files[$i] . ">$files[$i]</option>";
        }
    }
}
else
{
    echo "<script>alert('printAllFromFromDirectory --> No directory')</script>";
}

