<?php
if(!isset($_SESSION))
{
	session_start();
}
clearstatcache();
if (!file_exists("../config/users.json"))
{
	$_SESSION['loggedIn'] = "admin";
	header("Location: helper/createInstaller.php");
}
else
{
	if (file_exists("installer/deleteInstaller.php"))
	{
		header("Location: installer/deleteInstaller.php?redirect_to_index=true");
	}
}
	
$colorScheme = "";
$developerName = "";
$gridSize = "";
$sortOrder = "";

include('helper/paths.php');
include($path_helper_getGeneralSettings);
?>


<!DOCTYPE html>
<html>
	<head>
		<?php include('cookie.php'); ?>
		<title><?php if(isset($developerName)) echo $developerName;?> on Codera</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main-minified.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/index.js"></script>
		<script src="../js/darkTheme.js"></script>			
	</head>
	<body onload="drawBanners('<?php if(isset($colorScheme)) echo $colorScheme;?>');">
		<div id="main">
			<?php
				if(isset($_SESSION['loggedIn']))
				{
					include($path_header_logout);
				}
				else
				{
					include($path_header);
				}
			?>
			<div id="content">				
				<table id="projects">
					<?php
						
						$projectArray = [];
						include('helper/getProjectsFromJSON.php');
					    include('helper/getGeneralSettingsFromJSON.php');

						if(!isset($_SESSION['loggedIn']))
							$username = "public";
					    $forbiddenProjects = [];
						include "helper/getForbiddenProjects.php";

						//remove everything from projectArray which is forbidden

					if(!empty($projectArray))
					{
						if(!empty($forbiddenProjects))
						{
							for ($x = 0; $x < sizeof($projectArray); $x++)
							{
								for ($j = 0; $j < sizeof($forbiddenProjects); $j++)
								{
									if ($projectArray[$x]->{'UUID'} == $forbiddenProjects[$j])
									{
										unset($projectArray[$x]);
										$projectArray = array_values($projectArray);
									}
								}
							}
						}
						if(!empty($projectArray))
						{
							for ($i = 0; $i < sizeof($projectArray); $i++)
							{
								$icon = urldecode($projectArray[$i]->{'icon'});
								$name = $projectArray[$i]->{'name'};
								$UUID = $projectArray[$i]->{'UUID'};


								if (fmod($i, $gridSize) == 0)
								{
									echo '<tr class="row">';
								}


								if ($gridSize == 3)
								{
									echo '<td class="entry large">' .
										'<a name="icon-link" id="' . $UUID . '">' .
										'<div class="entry-icon large container">';
									$iconURL = $path_folder_icons . '/' . $icon;
									if (!empty($icon) && file_exists("../images/icons/" . $icon))
											echo '<div class="entry-icon" style="background-image: url(' . "'" . $iconURL . "'" . ');"> </div>';
										else
											echo '<div class="entry-icon"> </div>';

									 echo 	'<canvas width="300" height="300"></canvas>' .
										'</div>' .
										'<div class="icon-name">' . $name . '</div>' .
										'</a>' .
										'</td>';

									if (fmod($i, 3) == 2)
									{
										echo '</tr>';
									}
								}
								else if ($gridSize == 4)
								{
									echo '<td class="entry medium">' .
										'<a name="icon-link" id="' . $UUID . '">' .
										'<div class="entry-icon medium container">';
										$iconURL = $path_folder_icons . '/' . $icon;
									if (!empty($icon) && file_exists("../images/icons/" . $icon))
										echo '<div class="entry-icon" style="background-image: url(' . "'" . $iconURL . "'" . ');"> </div>';
									else
										echo '<div class="entry-icon"> </div>';

										 echo '<canvas width="300" height="300"></canvas>' .
										'</div>' .
										'<div class="icon-name">' . $name . '</div>' .
										'</a>' .
										'</td>';

									if (fmod($i, 4) == 3)
									{
										echo '</tr>';
									}
								}
								else
								{
									echo '<td class="entry small">' .
										'<a name="icon-link" id="' . $UUID . '">' .
										'<div class="entry-icon small container">';
									$iconURL = $path_folder_icons . '/' . $icon;
									if (!empty($icon) && file_exists("../images/icons/" . $icon))
										echo '<div class="entry-icon" style="background-image: url(' . "'" . $iconURL . "'" . ');"> </div>';
									else
										echo '<div class="entry-icon"> </div>';

									echo '<canvas width="300" height="300"></canvas>' .
										'</div>' .
										'<div class="icon-name">' . $name . '</div>' .
										'</a>' .
										'</td>';

									if (fmod($i, 5) == 4)
									{
										echo '</tr>';
									}
								}

							}
						}
						else
						{
							echo '<td class="entry large placeholder">' .	
								'<div class="icon-name">' . "No Projects Available" . '</div>' .							
								'</td>';
						}
					}	
					else
					{
						echo '<td class="entry large placeholder">' .	
							'<div class="icon-name">' . "No Projects Available" . '</div>' .							
							'</td>';
					}
					?>						
				</table>		
			</div>			
		</div>
		<?php include("templates/footer.php"); ?>
	</body>
</html>
