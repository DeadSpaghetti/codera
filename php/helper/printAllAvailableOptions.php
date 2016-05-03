<?php
if(!isset($_SESSION))
{
    session_start();
}
//$options can be 'option' || 'image' || null
if(isset($property) && $property != null && isset($UUID) && $UUID != null)
{
    $projectArray = [];
    include "getProjectsFromJSON.php";
    if(!empty($projectArray))
    {
        for ($i = 0; $i < sizeof($projectArray); $i++)
        {
            if ($projectArray[$i]->{'UUID'} == $UUID)
            {
                $selectedProject = $projectArray[$i];
                $allowedFilesArray = json_decode($selectedProject->{$property});
                if (isset($options) && $options != null)
                {
                    if ($options == "option")
                    {
                        for ($j = 0; $j < sizeof($allowedFilesArray); $j++)
                        {
                            echo "<option>" . rawurlencode($allowedFilesArray[$j]) . "</option>";
                        }
                    }
                    elseif ($options == "image")
                    {
                        $directory = "../images/screenshots/";                       
                        for ($j = 0; $j < sizeof($allowedFilesArray); $j++)
                        {
                            if(file_exists($directory . $allowedFilesArray[$j]))
                            {
                               // echo "<a href=" . $directory . rawurlencode($allowedFilesArray[$j]) . " data-lightbox=" . $directory . rawurlencode($allowedFilesArray[$j]) . " class=\"screenshot-preview\">
                    //<img src=" . $directory . rawurlencode($allowedFilesArray[$j]) . ">" .
                      //              "</a>";
								   echo '<a href="' . $directory . rawurlencode($allowedFilesArray[$j]) . '" data-lightbox="' . $directory . rawurlencode($allowedFilesArray[$j]) . '">'.
											'<div class="entry-icon medium container space">'.
												'<div class="entry-icon" style="background-image: url('.$directory . rawurlencode($allowedFilesArray[$j]).');"> </div>	'.
											'</div>'.
										'</a>';
                            }
                        }
                    }
                }
                break;
            }
        }
    }
}