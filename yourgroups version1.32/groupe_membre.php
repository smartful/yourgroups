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
	<?php include("personal_menu.php"); ?>
	
	
	
	<!--On se connecte au SGBD Mysql-->
	<?php include("connection_bdd.php"); ?>
	
	
	<!-- le corps -->
	<div id="corps">
	
	<p>
	Here, there is your groups. You can have only 50 groups :
	</p>
	
	<?php
	/*On réalise une requète sql pour obtenir  tous les groupes auxlequels le membre appartiens*/
	
	//On prend tous les identifiants de groupes du membre
	$groupes = $bdd->query('SELECT ID_groupe
								FROM groupe_membre
								WHERE ID_membre = '.$_SESSION['ID'].'
								LIMIT 0,50');
	
	echo 'You can access to the main page of Your Groups <br/><br/>';
	while($donnees = $groupes->fetch())
	{
		//On cherche les noms correspondant au identifiant
		
		$nom_groupe = $bdd->prepare('SELECT nom
										FROM groupe
										WHERE ID = ?');
		$nom_groupe->execute(array($donnees['ID_groupe']));
		
		$donnees2 = $nom_groupe->fetch();
		
	
		echo ' <a href="group.php?group='.$donnees['ID_groupe'].'">  '.$donnees2['nom'].' </a> <br/>';
	
		
	}
	
	$groupes->closeCursor();
	//$nom_groupe->closeCursor();
	?>
	
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	