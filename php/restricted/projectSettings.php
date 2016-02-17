<!DOCTYPE html>
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
			<div id="new-project">New Project</div>		
			<div class="line"></div>
		</td>	
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">mode_edit</i> <span class="icon-text">Name:</span>
			</div>
		</td>										
		<td class="infos-right">
			<input class="input project" id="input-appName" type="text" maxlength="15" placeholder="MyApp"/>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">image</i> <span class="icon-text">Icon:</span>
			</div>
		</td>										
		<td class="infos-right">
			<a class="button" id="button-icon" href="javascript:void(null)">									
				<i class="material-icons">file_upload</i> <span class="button-text">Upload</span>
			</a>	
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">update</i> <span class="icon-text">Versioncode:</span>
			</div>
		</td>										
		<td class="infos-right">
			<input class="input project" id="input-versionCode" type="text" maxlength="15" placeholder="10"/>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">update</i> <span class="icon-text">Version:</span>
			</div>
		</td>										
		<td class="infos-right">
			<input class="input project" id="input-versionName" type="text" maxlength="15" placeholder="1.0.0 b"/>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
			</div>
		</td>										
		<td class="infos-right">
			<input class="input project" id="input-date" type="date"/>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
			</div>
		</td>										
		<td class="infos-right">
			<textarea id="input-changes" rows="10"> </textarea>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">description</i> <span class="icon-text">Description:</span>
			</div>
		</td>										
		<td class="infos-right">
			<textarea id="input-description" rows="10"> </textarea>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
			</div>
		</td>										
		<td class="infos-right">
			<textarea id="input-requirements" rows="10"> </textarea>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">file_download</i> <span class="icon-text">Files:</span>
			</div>
		</td>										
		<td class="infos-right">									
			<a class="button" id="button-executables" href="javascript:void(null)">									
				<i class="material-icons">file_upload</i> <span class="button-text">Upload</span>
			</a>							
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">photo_camera</i> <span class="icon-text">Screenshots:</span>
			</div>
		</td>										
		<td class="infos-right">
			<!-- Tabelle Previews -->																
			<a class="button" id="button-screenshots" href="javascript:void(null)">									
				<i class="material-icons">file_upload</i> <span class="button-text">Upload</span>
			</a>						
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons md-light">assignment</i> <span class="icon-text">License:</span>
			</div>
		</td>										
		<td class="infos-right">
			<a class="button" id="button-license" href="javascript:void(null)">									
				<i class="material-icons">file_upload</i> <span class="button-text">Upload</span>
			</a>								
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">	</td>										
		<td class="infos-right">
			<a class="button" id="button-save" href="javascript:void(null)">									
				<i class="material-icons">check</i> <span class="button-text">Save</span>
			</a>
			<a class="button" id="button-discard" href="javascript:void(null)">									
				<i class="material-icons">delete</i> <span class="button-text">Discard</span> 									
			</a>
		</td>
	</tr>						
</table>	