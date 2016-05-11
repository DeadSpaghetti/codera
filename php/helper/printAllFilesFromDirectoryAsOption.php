<?php
if(!isset($_SESSION))
{
    session_start();
}
//the excluded object is the one that is selected already --> there can be multiple selected options
//this just prints out the files in the directory
if(isset($directory) && $directory != null)
{
    $files = scandir($directory);
    array_splice($files,0,2);   //removes . and ..
    //echo "<option id='emptyOption'></option>";
    if(isset($exclude) && is_array($exclude))   //multiple files can be in $exclude
    {
        //loops through files in directory
        for ($i = 0; $i < sizeof($files); $i++)
        {
            if(substr($files[$i],0,1) != ".")   //removes temp files from fileExplorer
            {
                //if file is already selected by the user print it with the selected option
                if (in_array($files[$i], $exclude))
                    echo "<option id=" . $directory . $files[$i] . " selected>$files[$i]</option>";
                else            //otherwise print it normally
                    echo "<option id=" . $directory . $files[$i] . ">$files[$i]</option>";
            }
        }

    }
    else
    {
        for ($i = 0; $i < sizeof($files); $i++)
        {
            if(substr($files[$i],0,1) != ".")
            {
                if (isset($exclude) && $exclude == $files[$i])  //exclude is a single file
                {
                    echo "<option id=" . $directory . $files[$i] . " selected>$files[$i]</option>";
                }
                else
                {
                    echo "<option id=" . $directory . $files[$i] . ">$files[$i]</option>";
                }
            }
        }
    }
}
else
{
    echo "<script>alert('printAllFromFromDirectory --> No directory')</script>";
}

