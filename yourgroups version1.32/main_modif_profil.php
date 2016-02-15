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
	<!-- l'en t�te -->
	<?php include("en_tete.php"); ?>
	
		<!-- le menu -->
	<?php include("deconnexion_menu.php"); ?>

	<!-- le corps -->
	<div id="corps">
		<p>
		<?php

		
		//On se connecte au SGBD Mysql
		include("connection_bdd.php");
		
			//On r�cup�re le contenu de la table membre pour identifier l'utilisateur
			$utilisateur = $bdd->prepare('SELECT * 
											FROM membres 
											WHERE ID = ?');
											
			$utilisateur->execute(array($_SESSION['ID']));
			
			$donnees = $utilisateur->fetch();

			$_SESSION['first_name'] = $donnees['first_name'];
			$_SESSION['name'] = $donnees['name'];
			$_SESSION['town'] = $donnees['town'];
			$_SESSION['study'] = $donnees['study'];
			$_SESSION['job'] = $donnees['job'];
			$_SESSION['country'] = $donnees['country'];

			$utilisateur->closeCursor(); //On ferme la requ�te
			
			echo 'You can access to your personal data : <a href="personal.php">go</a>';
		
			
		?>
			
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	