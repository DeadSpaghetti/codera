<?php
if(!isset($_SESSION))
{
	session_start();
}  
if(!isset($_SESSION['loggedIn']))
{
	header('Location: ../login.php');
	exit;
}


include('../helper/paths.php');
?>

<table id="overview">
    <tr class="overview-row">
        <td colspan="2" class="overview-center">
            <a class="button newProject" id="button-new-user" href="projectSettings.php">
                <i class="material-icons">add</i> <span class="button-text">New</span>
            </a>
        </td>
    </tr>
	<tr class="overview-row">
		<td class="overview-left">
			<table>
				<tr>
					<td class="user-overview-icon"> 
						<div class="icon">
							<i class="material-icons">security</i>
						</div>				
					</td>
					<td class="overview-appname">Admin</td>
				</tr>
			</table>
		</td>
		<td class="overview-right">	
			<a class="button edit" name="userOverviewEdit" href="javascript:void(null)">
				<i class="material-icons">mode_edit</i>
			</a>
		</td>
	</tr>
	<tr class="overview-row">
		<td colspan="2">
			<div class="overview-line"> </div>
		</td>
	</tr>
	<tr class="overview-row">
		<td class="overview-left">
			<table>
				<tr>
					<td class="user-overview-icon"> 
						<div class="icon">
							<i class="material-icons">public</i>
						</div>				
					</td>
					<td class="overview-appname">Public</td>
				</tr>
			</table>
		</td>
		<td class="overview-right">
			<a class="button edit" name="userOverviewEdit" href="javascript:void(null)">
				<i class="material-icons">mode_edit</i>
			</a>			
		</td>
	</tr>
	<tr class="overview-row">
		<td colspan="2">
			<div class="overview-line"> </div>
		</td>
	</tr>
<?php
global $projectArray;
include "../helper/getProjectsFromJSON.php";

/*if($projectArray != NULL)
{
	for($i=0; $i < sizeof($projectArray); $i++)
	{		
		$name = $projectArray[$i]->{'name'};
		if($name != "public")
		{		
			echo
				'<tr id='; echo $projectArray[$i]->{'UUID'}; echo ' class="overview-row">'.
				'<td class="overview-left">'.
					'<table>'.
						'<tr>'.
							'<td class="user-overview-icon" style="background-image: url('.$path_folder_icons.'/'.$icon.');"> '.
								'<div class="icon">'.
									'<i class="material-icons">account_circle</i>'.
								'</div>	'.
							'</td>'.
							'<td class="overview-appname">'.$name.'</td>'.
						'</tr>'.
					'</table>'.
				'</td>'.
				'<td class="overview-right">'.
					'<a class="button edit" name="userOverviewEdit" href="javascript:void(null)">'.
						'<i class="material-icons">mode_edit</i>'.
					'</a>'.
					'<a class="button edit" name="userOverviewDelete" href="javascript:void(null)">'.
						'<i class="material-icons">delete</i>'.
					'</a>'.
				'</td>'.
			'</tr>'.
			'<tr class="overview-row">'.
				'<td colspan="2">'.
					'<div class="overview-line"> </div>'.
				'</td>'.
			'</tr>';
		}
	}	
}*/
?>
</table>