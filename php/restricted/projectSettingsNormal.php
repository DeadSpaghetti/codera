<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">update</i> <span class="icon-text">Versioncode:</span>
		</div>
	</td>										
	<td class="infos-right">
		<input class="input project" id="input-versionCode" type="text" maxlength="15" value="<?php if(isset($versionCode)) echo $versionCode;?>" placeholder="10"/>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">update</i> <span class="icon-text">Version:</span>
		</div>
	</td>										
	<td class="infos-right">
		<input class="input project" id="input-versionName" type="text" maxlength="15" value="<?php if(isset($versionName)) echo $versionName;?>" placeholder="1.0.0 b"/>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
		</div>
	</td>					
	<td class="infos-right">
		<input class="input project" id="input-date" value="<?php if(isset($date)) echo $date;?>" type="date"/>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
		</div>
	</td>										
	<td class="infos-right">
		<textarea id="input-changes" rows="10"><?php if(isset($latestChanges)) echo $latestChanges;?></textarea>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">description</i> <span class="icon-text">Description:</span>
		</div>
	</td>										
	<td class="infos-right">
		<textarea id="input-description" rows="10"><?php if(isset($description)) echo $description;?></textarea>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
		</div>
	</td>										
	<td class="infos-right">
		<textarea id="input-requirements" rows="10"><?php if(isset($requirements)) echo $requirements;?></textarea>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">file_download</i> <span class="icon-text">Files:</span>
		</div>
	</td>										
	<td class="infos-right">		
		<select data-placeholder="Select an option" id="projectSettings-fileSelector" multiple class="chosen-select" style="width: 96%;">
			<?php
			$directory = "../../executables/";
			$exclude = getSelectedOptions("files",$UUID);   //is array
			include "../helper/printAllFilesFromDirectoryAsOption.php";
			?>		
		</select>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons">photo_camera</i> <span class="icon-text">Screenshots:</span>
		</div>
	</td>										
	<td class="infos-right">
		<select data-placeholder="Select an option" id="projectSettings-screenshotSelector" multiple class="chosen-select" style="width: 96%;">
			<?php
			$directory = "../../images/screenshots";
			$object = 'screenshots';
			$exclude = getSelectedOptions($object,$UUID);   //array
			include "../helper/printAllFilesFromDirectoryAsOption.php"			
			?>			
		</select>
	</td>
	<td class="infos-right-space"></td>
</tr>
<tr class="infos-row row-settingsNormal">
	<td class="infos-left">
		<div class="icon">
			<i class="material-icons md-light">assignment</i> <span class="icon-text">License:</span>
		</div>
	</td>										
	<td class="infos-right">
		<select data-placeholder="Select an option" id="projectSettings-licenseSelector" style="width: 96%;">
			<?php
			$directory = "../../licenses/";
			$object = 'license';
			$exclude = getSelectedOption($object,$UUID);
			include "../helper/printAllFilesFromDirectoryAsOption.php";
			?>
		</select>
	</td>
	<td class="infos-right-space"></td>
</tr>