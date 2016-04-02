<?php
//the excluded object is the one that is selected already --> there can be multiple selected options
//this just prints out the files in the directory
if(isset($directory) && $directory != null)
{
    $files = scandir($directory);
    array_splice($files,0,2);   //removes . and ..
    echo "<option id='emptyOption'></option>";
    if(isset($exclude) && is_array($exclude))   //multiple files can be in $exclude
    {
        //loops through files in directory
        for ($i = 0; $i < sizeof($files); $i++)
        {
            /*for($j=0; $j < sizeof($exclude); $j++)
            {
                if($files[$i] == $exclude[$j])
                    echo "<option id=" . $directory . $files[$j] . " selected>$files[$j]</option>";
            }*/
            //if file is already selected by the user print it with the selected option
            if(in_array($files[$i],$exclude))
                echo "<option id=" . $directory . $files[$i] . " selected>$files[$i]</option>";
            else            //otherwise print it normally
                echo "<option id=" . $directory . $files[$i] . ">$files[$i]</option>";
        }

    }
    else
    {
        for ($i = 0; $i < sizeof($files); $i++)
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
else
{
    echo "<script>alert('printAllFromFromDirectory --> No directory')</script>";
}

