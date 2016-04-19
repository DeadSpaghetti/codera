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
        <td colspan="3" class="overview-center">
            <a class="button newProject" id="button-new-project" href="projectSettings.php" style="background-color: <?php echo $colorScheme;?>;">
                <i class="material-icons">add</i> <span class="button-text">New</span>
            </a>
        </td>
    </tr>
<?php
global $projectArray;
include "../helper/getProjectsFromJSON.php";

if($projectArray != null)
{
	for($i=0; $i < sizeof($projectArray); $i++)
	{
		$icon = urldecode($projectArray[$i]->{'icon'});
		$name = $projectArray[$i]->{'name'};
		echo
			'<tr id='; echo $projectArray[$i]->{'UUID'}; echo ' class="overview-row">'.
						
			'<td class="overview-icon" style="background-image: url('.$path_folder_icons.'/'.$icon.');"> </td>'.
			'<td class="overview-appname">'.$name.'</td>'.				
			
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
			'<td colspan="3">'.
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
