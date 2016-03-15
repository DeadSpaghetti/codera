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

global $developerName;
global $colorScheme;
global $gridSize;
global $sortOrder;

//script just changes the global variables
include("../helper/getGeneralSettingsFromJSON.php");
?>

<table id="infos-small">
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">mode_edit</i> <span class="icon-text">Website Name:</span>
			</div>
		</td>										
		<td class="infos-right">
			<input class="input project" id="input-websiteName" type="text" maxlength="30" value="<?php print $developerName; ?>" placeholder="Your Dev Name"/>
		</td>
	</tr>	
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">color_lens</i> <span class="icon-text">Color Scheme:</span>
			</div>
		</td>										
		<td class="infos-right">
			<div id="color-chooser">							
					<?php include("printColorOptions.php"); ?>				
			</div>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">grid_on</i> <span class="icon-text">Gridwidth:</span>
			</div>
		</td>										
		<td class="infos-right">
			<div class="radiogroup" id="radiogroup-1">				
				<input type="radio" name="gridwidth" id="radio-1" value="3" <?php if($gridSize == 3){echo "checked";} ?>/>
				<label for="radio-1">3</label>
			</div>
			<div class="radiogroup">				
				<input type="radio" name="gridwidth" id="radio-2" value="4" <?php if($gridSize == 4){echo "checked";} ?>/>
				<label for="radio-2">4</label>
			</div>
			<div class="radiogroup">				
				<input type="radio" name="gridwidth" id="radio-3" value="5" <?php if($gridSize == 5){echo "checked";} ?>/>
				<label for="radio-3">5</label>
			</div>			
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">sort_by_alpha</i> <span class="icon-text">Project Sort Order:</span>
			</div>
		</td>
		<td class="infos-right">
			<div class="radiogroup" id="radiogroup-1">
				<input type="radio" name="sortOrder" id="radio-sortOrder1" value="a-z" <?php if($sortOrder == "a-z"){echo "checked";} ?>/>
				<label for="radio-sortOrder1">a-z</label>
			</div>
			<div class="radiogroup">
				<input type="radio" name="sortOrder" id="radio-sortOrder2" value="z-a" <?php if($sortOrder == "z-a"){echo "checked";} ?>/>
				<label for="radio-sortOrder2">z-a</label>
			</div>
			<div class="radiogroup">
				<input type="radio" name="sortOrder" id="radio-sortOrder3" value="latestUpdate" <?php if($sortOrder == "latestUpdate"){echo "checked";} ?>/>
				<label for="radio-sortOrder3">latestUpdate</label>
			</div>
		</td>
	</tr>
	<tr class="infos-row">
		<td class="infos-left">
			<div class="icon">
				<i class="material-icons">system_update</i> <span class="icon-text">Codera:</span>
			</div>
		</td>										
		<td class="infos-right">
			<table>
				<tr>
					<td id="codera-version-left">installed version:</td>
					<td id="codera-version-right-onDisk" colspan="2"><?php include "../helper/getCurrentVersion.php"; echo $currentVersion[0]?></td>
				</tr>
				<tr>
					<td id="codera-version-left">latest version:</td>
					<td id="codera-version-right-onLine"><?php include "../helper/getLatestVersion.php"; echo $version[0];?></td>
					<td id="codera-version-link"><?php if($version[1] > $currentVersion[1]) {echo'<a href="https://github.com/spaghettic0der/codera">Update</a>';}?></td>
				</tr>				
			</table>
		</td>
	</tr>	
	<tr class="infos-row">
		<td class="infos-left">	</td>										
		<td class="infos-right">
			<a class="button save" id="button-save" href="javascript:void(null)">									
				<i class="material-icons">check</i> <span class="button-text">Save</span>
			</a>
			<a class="button discard" id="button-discard" href="javascript:void(null)">									
				<i class="material-icons">delete</i> <span class="button-text">Discard</span> 									
			</a>
		</td>
	</tr>						
</table>