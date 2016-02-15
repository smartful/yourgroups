<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//dtd XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtmll-strict.dtd">
<html xmlns= "http://www.w3.org/1999/xhtml" xml : lang="fr">
	<head>
		<title>YourGroups</title>
		<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/>
		<link rel="stylesheet" media="screen" type="text/css" title="Bordeaux" href="design_bordeaux.css" />
	</head>
	<body>
	<!-- l'en tête -->
	<?php include("en_tete.php"); ?>
	
	<!-- le menu -->
	<div id="menu">        
   <div class="element_menu">
	   <h3>YourGroups</h3>
	   <ul>
		   <li><a href="index.php">Home</a></li>
		   <li><a href="personal.php">Personal Page</a></li>

	   </ul>
   </div>    
</div>
	
	<!-- le corps -->
	<div id="corps">
		
		<table>
				
					<tr>
						<td><img src="images/remi_rodrigues.jpg" alt="Rémi RODRIGUES"/>   </td>
						<td>Rémi RODRIGUES </td>
						<td>   </td>
						<td>CEO and Co-founder of YourGroups</td>
					</tr>
					
					<tr>
						<td><img src="images/thibault_chastel.jpg" alt="Thibault CHASTEL"/>      </td>
						<td>Thibault CHASTEL</td>
						<td>   </td>
						<td>Co-founder of YourGroups</td>
					</tr>
					
		</table>
		
		
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page_auteur.php"); ?>
	</body>
</html>
	