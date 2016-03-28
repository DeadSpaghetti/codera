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
        <td colspan="2" class="overview-center">
            <a class="button newProject" id="button-new-user" href="userSettings.php">
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
			<a class="button edit" id="editUser_admin" name="userOverviewEdit" href="javascript:void(null)">
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
			<a class="button edit" id="editUser_public" name="userOverviewEdit" href="javascript:void(null)">
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
global $userArray;
include "../helper/getUsersFromJSON.php";

if($userArray != null)
{
	for($i=0; $i < sizeof($userArray); $i++)
	{
		$name = $userArray[$i]->{'username'};
		if($name != "public" && $name != "admin")
		{
			echo
				'<tr id='; echo $userArray[$i]->{'UUID'}; echo ' class="overview-row">'.
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
					'<a id="editUser_'.$name.'" class="button edit" name="userOverviewEdit" href="javascript:void(null)">'.
						'<i class="material-icons">mode_edit</i>'.
					'</a>'.
					'<a id="deleteUser_'.$name.'" class="button edit" name="userOverviewDelete" href="javascript:void(null)">'.
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
}
?>
</table>