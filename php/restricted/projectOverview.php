<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
	header('Location: ../login.php');
	exit;
}


include('../helper/paths.php');
?>

<table id="overview">
    <tr class="overview-row">
        <td colspan="4" class="overview-center">
            <a class="button newProject" id="button-new-project" href="projectSettings.php" style="background-color: <?php if(isset($colorScheme)) echo $colorScheme;?>;">
                <i class="material-icons">add</i> <span class="button-text">New</span>
            </a>
        </td>
    </tr>
<?php
$projectArray = [];
include "../helper/getProjectsFromJSON.php";

if($projectArray != null)
{
	for($i=0; $i < sizeof($projectArray); $i++)
	{
		$icon = urldecode($projectArray[$i]->{'icon'});
		$name = $projectArray[$i]->{'name'};
		$url = $projectArray[$i]->{'url'};		
		
		
		echo
		'<tr id='; echo $projectArray[$i]->{'UUID'}; echo ' class="overview-row">'.			
				
				'<td class="overview-icon" style="background-image: url('.$path_folder_icons.'/'.$icon.');"> </td>';
								
				if(empty($url))
				{					
					if(isset($projectArray[$i]->{'totalDownloads'}))
					{	
						$downloads = $projectArray[$i]->{'totalDownloads'};				
						echo '<td class="overview-download-counter"><div>Downloads</div><br>'.$downloads.'</td>';
					}
					else
					{
						echo '<td class="overview-download-counter"><div>Downloads</div><br>0</td>';
					}
				}
				else
				{
					if(isset($projectArray[$i]->{'totalViews'}))
					{	
						$views = $projectArray[$i]->{'totalViews'};				
						echo '<td class="overview-download-counter"><div>Views</div><br>'.$views.'</td>';
					}
					else
					{
						echo '<td class="overview-download-counter"><div>Views</div><br>0</td>';
					}
				}		
				
				echo '<td class="overview-appname">'.$name.'</td>'.				
			
				'<td class="overview-right">'.
					'<a class="button edit" name="projectOverviewEdit" href="javascript:void(null)">'.
						'<i class="material-icons">mode_edit</i>'.
					'</a>'.
					'<a class="button edit" name="projectOverviewDelete" href="javascript:void(null)">'.
						'<i class="material-icons">delete</i>'.
					'</a>'.
				'</td>'.
		'</tr>'.
		'<tr class="overview-row">'.
			'<td colspan="4">'.
				'<div class="overview-line"> </div>'.
			'</td>'.
		'</tr>';
	}
	echo '</table>';
}
else
{
	echo '</table>';
}
?>
