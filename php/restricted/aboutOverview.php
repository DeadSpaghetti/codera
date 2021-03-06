<?php
if(!isset($_SESSION))
{
	session_start();
}

if(!isUserAdmin($_SESSION['loggedIn']))
{
	header('Location: ../login.php');
	exit;
}
$aboutIcon = "";
$aboutText = "";
include "../helper/getAboutPageFromJSON.php";

?>

<table class="infos-small">
	<tr class="infos-row">
		<td class="infos-left-small">
			<div class="icon">
				<i class="material-icons">mode_edit</i> <span class="icon-text">Text:</span>
			</div>
		</td>										
		<td class="infos-right">
			<textarea id="input-about-text" rows="10"><?php if(isset($aboutText)) echo $aboutText;?></textarea>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left-small">
			<div class="icon">
				<i class="material-icons">image</i> <span class="icon-text">Icon:</span>
			</div>
		</td>										
		<td class="infos-right">
			<select id="aboutpage-iconSelector" style="width: 100%;">
				<option selected>Select an Option</option>
				<?php
				$directory = "../../images/icons/";
				$object = 'icon';
				if(isset($aboutIcon)) $exclude = $aboutIcon;
				include "../helper/printAllFilesFromDirectoryAsOption.php"
				?>
			</select>			
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left-small">	</td>										
		<td class="infos-right">
			<a class="button save" id="button-save-about" href="javascript:void(null)">									
				<i class="material-icons">check</i> <span class="button-text">Save</span>
			</a>
			<a class="button discard" id="button-discard-about" href="javascript:void(null)">									
				<i class="material-icons">delete</i> <span class="button-text">Discard</span> 									
			</a>
		</td>
	</tr>
</table>