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

?>

<table id="overview">
    <tr class="overview-row">
        <td colspan="2" class="overview-center">
            <a class="button newProject" id="button-new-project" href="projectSettings.php">
                <i class="material-icons">add</i> <span class="button-text">New</span>
            </a>
        </td>
    </tr>
<?php
global $projectArray;
include "../helper/getProjectsFromJSON.php";


for($i=0; $i < sizeof($projectArray); $i++)
{
    $icon = urldecode($projectArray[$i]->{'icon'});
    $name = $projectArray[$i]->{'name'};
    echo
    	'<tr class="overview-row">'.
		'<td class="overview-left">'.
			'<table>'.
				'<tr>'.
					'<td class="overview-icon" style="background-image: url('.$icon.');"> </td>'.
					'<td class="overview-appname">'.$name.'</td>'.
				'</tr>'.
			'</table>'.
		'</td>		'.
		'<td class="overview-right">'.
			'<a class="button edit" href="javascript:void(null)">'.
				'<i class="material-icons">mode_edit</i> <span class="button-text">Edit</span>'.
			'</a>'.
		'</td>'.
	'</tr>'.
	'<tr class="overview-row">'.
		'<td colspan="2">'.
			'<div class="overview-line"> </div>'.
		'</td>'.
	'</tr>';



}

?>
</table>