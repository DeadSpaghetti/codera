<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">update</i> <span class="icon-text">Versioncode:</span>
		</div>
	</td>										
	<td class="infos-right">
		<input class="input project" id="input-versionCode" type="text" maxlength="15" value="<?php echo $versionCode;?>" placeholder="10"/>
	</td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">update</i> <span class="icon-text">Version:</span>
		</div>
	</td>										
	<td class="infos-right">
		<input class="input project" id="input-versionName" type="text" maxlength="15" value="<?php echo $versionName;?>" placeholder="1.0.0 b"/>
	</td>
</tr>				
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">label</i> <span class="icon-text">Status:</span>
		</div>
	</td>										
	<td class="infos-right">
		<div class="radiogroup" id="radiogroup-1">				
			<input type="radio" name="projectStatus" id="radio-1" value="Alpha" <?php if($projectStatus == "Alpha"){echo "checked";}?>/>
			<label for="radio-1">Alpha</label>
		</div>
		<div class="radiogroup">				
			<input type="radio" name="projectStatus" id="radio-2" value="Beta" <?php if($projectStatus == "Beta"){echo "checked";}?>/>
			<label for="radio-2">Beta</label>
		</div>
		<div class="radiogroup">				
			<input type="radio" name="projectStatus" id="radio-3" value="Final" <?php if($projectStatus == "Final"){echo "checked";}?>/>
			<label for="radio-3">Final</label>
		</div>			
	</td>
</tr>	
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
		</div>
	</td>										
	<td class="infos-right">
		<input class="input project" id="input-date" value="<?php echo $date;?>" type="date"/>
	</td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
		</div>
	</td>										
	<td class="infos-right">
		<textarea id="input-changes" rows="10"><?php echo $latestChanges;?></textarea>
	</td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">description</i> <span class="icon-text">Description:</span>
		</div>
	</td>										
	<td class="infos-right">
		<textarea id="input-description" rows="10"><?php echo $description;?></textarea>
	</td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
		</div>
	</td>										
	<td class="infos-right">
		<textarea id="input-requirements" rows="10"><?php echo $requirements;?></textarea>
	</td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">file_download</i> <span class="icon-text">Files:</span>
		</div>
	</td>										
	<td class="infos-right">
		<select id="projectSettings-fileSelector" multiple class="chosen-select">
			<?php
			$directory = "../../executables/";
			$exclude = getSelectedOptions("files",$UUID);   //is array
			include "../helper/printAllFilesFromDirectoryAsOption.php";
			?>
		</select>
	</td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">photo_camera</i> <span class="icon-text">Screenshots:</span>
		</div>
	</td>										
	<td class="infos-right">
		<select id="projectSettings-screenshotSelector" multiple class="chosen-select">
			<?php
			$directory = "../../images/screenshots";
			$object = 'screenshots';
			$exclude = getSelectedOptions($object,$UUID);   //array
			include "../helper/printAllFilesFromDirectoryAsOption.php"
			?>
		</select>
	</td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons md-light">assignment</i> <span class="icon-text">License:</span>
		</div>
	</td>										
	<td class="infos-right">
		<select id="projectSettings-licenseSelector">
			<?php
			$directory = "../../licenses/";
			$object = 'license';
			$exclude = getSelectedOption($object,$UUID);
			include "../helper/printAllFilesFromDirectoryAsOption.php"
			?>
		</select>
	</td>
</tr>