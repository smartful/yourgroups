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
	
	<!-- le menu pour aller à l'espace perso -->
	<?php include("personal_menu.php"); ?>
	
	<!-- le corps -->
	<div id="corps">
		
		<?php  echo '<img src="photo_profil/photo'.$_SESSION['ID'].'.jpg" alt="personnal picture"/>' ?> 
		
		
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	