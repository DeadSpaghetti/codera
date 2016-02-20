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
			<a class="button" id="button-new-project" href="javascript:void(null)">									
				<i class="material-icons">add</i> <span class="button-text">New</span>
			</a>
		</td>
	</tr>
	<tr class="overview-row">
		<td class="overview-left">
			<table>
				<tr>
					<td class="overview-icon" style="background-image: url('../../images/icons/eyedropper.png');"> </td>
					<td class="overview-appname">SaveMyPlaylist</td>				
				</tr>
			</table>
		</td>										
		<td class="overview-right">
			<a class="button edit" href="javascript:void(null)">									
				<i class="material-icons">mode_edit</i> <span class="button-text">Edit</span>
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
					<td class="overview-icon" style="background-image: url('../../images/icons/bf4.png');"> </td>
					<td class="overview-appname">Battlefield 4</td>				
				</tr>
			</table>
		</td>										
		<td class="overview-right">
			<a class="button edit" href="javascript:void(null)">									
				<i class="material-icons">mode_edit</i> <span class="button-text">Edit</span>
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
					<td class="overview-icon" style="background-image: url('../../images/icons/2048.png');"> </td>
					<td class="overview-appname">2048</td>				
				</tr>
			</table>
		</td>										
		<td class="overview-right">
			<a class="button edit" href="javascript:void(null)">									
				<i class="material-icons">mode_edit</i> <span class="button-text">Edit</span>
			</a>
		</td>
	</tr>		
</table>	