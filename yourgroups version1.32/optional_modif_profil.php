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
	<?php include("deconnexion_menu.php"); ?>

	<!-- le corps -->
	<div id="corps">
		<p>
		<?php

		
		//On se connecte au SGBD Mysql
		include("connection_bdd.php");		
			//On récupère le contenu de la table membre pour identifier l'utilisateur
			$utilisateur = $bdd->prepare('SELECT * 
											FROM membres 
											WHERE ID = ?');
			$utilisateur->execute(array($_SESSION['ID']));
			
			$donnees = $utilisateur->fetch();


			$_SESSION['quotation'] = $donnees['quotation'];
			$_SESSION['movies'] = $donnees['movies'];
			$_SESSION['books'] = $donnees['books'];
			$_SESSION['musics'] = $donnees['musics'];
			$_SESSION['favorite_personality'] = $donnees['favorite_personality'];
			$_SESSION['hobby'] = $donnees['hobby'];
			$_SESSION['pseudo'] = $donnees['pseudo'];
			
			
			
			$utilisateur->closeCursor(); //On ferme la requète
			
			echo 'You can access to your personal data : <a href="personal.php">go</a>';
	
			
		?>
			
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	