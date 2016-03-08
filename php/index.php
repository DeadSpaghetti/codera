<?php
if(!isset($_SESSION))
{
	session_start();
}

include('helper/paths.php');
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Deadlocker</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/index.js"></script>
	</head>
	<body>
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
						
						global $projectArray;
						include('helper/getProjectsFromJSON.php');			
						include('helper/getGeneralSettingsFromJSON.php');						
						
						if($projectArray != NULL)
						{
							for($i=0; $i < sizeof($projectArray); $i++)
							{
								if(fmod($i, $gridSize) == 0)
								{
									echo '<tr class="row">';
								}
								
								$icon = urldecode($projectArray[$i]->{'icon'});								
								$name = $projectArray[$i]->{'name'};
								$UUID = $projectArray[$i]->{'UUID'};
								
								if($gridSize == 3)
								{
									echo	'<td class="entry large">'.
												'<a id="'.$UUID.'">'.
													'<div class="entry-icon large" style="background-image: url('."'".$path_folder_icons.'/'.$icon."'".');"> </div>'.
													'<div class="icon-name">'.$name.'</div>'.
												'</a>'.
											'</td>';
											
									if(fmod($i, 3) == 2)
									{
										echo '</tr>';
									}
								}
								else if($gridSize == 4)
								{
									echo	'<td class="entry medium">'.
												'<a id="'.$UUID.'">'.
													'<div class="entry-icon medium" style="background-image: url('."'".$path_folder_icons.'/'.$icon."'".');"> </div>'.
													'<div class="icon-name">'.$name.'</div>'.
												'</a>'.										
											'</td>';
											
									if(fmod($i, 4) == 3)
									{
										echo '</tr>';
									}
								}
								else
								{
									echo	'<td class="entry small">'.
												'<a id="'. $UUID.'">'.
													'<div class="entry-icon small" style="background-image: url('."'".$path_folder_icons.'/'.$icon."'".');"> </div>'.
													'<div class="icon-name">'.$name.'</div>'.
												'</a>'.										
											'</td>';
									
									if(fmod($i, 5) == 4)
									{
										echo '</tr>';
									}
								}							
							}	
						}					
					?>						
				</table>		
			</div>			
		</div>
		<?php include("templates/footer.php"); ?>
	</body>
</html>
