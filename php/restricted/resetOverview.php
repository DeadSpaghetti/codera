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

<table id="infos-small">
	<tr class="infos-row">
		<td colspan="2" class="infos-center">
			<div class="icon" id="icon-warn2">
				<i class="material-icons">warning</i> <span class="icon-text">Warning:&nbsp; &nbsp; This can't be undone!</span>
			</div>		
		</td>	
	</tr>	
	<tr class="infos-row">
		<td colspan="2" class="infos-center">
			<a class="button reset" id="button-discard-changeLogin" href="javascript:void(null)">									
				<i class="material-icons">delete</i> <span class="button-text">Reset Content</span> 									
			</a>
			<div class="hint">All projects and uploaded files</div>
			<div class="hint-italic">(images, executables, license files,...)</div>
		</td>	
	</tr>	
	<tr class="infos-row">
		<td colspan="2" class="infos-center">
			<a class="button reset" id="button-discard-changeLogin" href="javascript:void(null)">									
				<i class="material-icons">delete</i> <span class="button-text">Reset Settings</span> 									
			</a>
			<div class="hint">All settings from the admin panel</div>
			<div class="hint-italic">(including admin-login!)</div>
		</td>	
	</tr>	
	<tr class="infos-row">
		<td colspan="2" class="infos-center">
			<a class="button reset" id="button-discard-changeLogin" href="javascript:void(null)">									
				<i class="material-icons">delete</i> <span class="button-text">Reset Everything</span> 									
			</a>
			<div class="hint">Just Everything</div>
			<div class="hint-italic">(reset Codera to factory settings)</div>
		</td>	
	</tr>						
</table>