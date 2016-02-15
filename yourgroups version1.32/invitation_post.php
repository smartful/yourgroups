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
	
	<!-- le corps -->
	<div id="corps">

		<p>
			<?php

			//On se connecte à la SGBD Mysql
			include("connection_bdd.php"); 
			
			$group = (int) $_GET['group'];
			
			//On lit les données correspondant aux invitations faites à l'utilisateur
			$verif_intrusion = $bdd->prepare('SELECT *
											FROM invitation
											WHERE id_receveur = ? AND id_group = ?');
			$verif_intrusion->execute(array($_SESSION['ID'],$group));
			$donnees = $verif_intrusion->fetch();
			
			if ($_SESSION['ID'] != $donnees['id_receveur'])
			{
				header('Location: personal.php');
			}
			else
			{
				if ($_POST['invite'] == 'yes')
				{
					$bienvenue = $bdd->prepare('INSERT INTO groupe_membre (ID_membre,ID_groupe) 
								VALUES (:membre,:groupe)');
					$bienvenue->execute(array(
										'membre' => $_SESSION['ID'],
										'groupe' => $group
										));
					//Une fois traité par l'utilisateur, on efface l'invitation
					$bdd->exec('DELETE FROM invitation WHERE id_group = '.$group.' AND id_receveur = '.$_SESSION['ID'].'');
					
					echo 'You are now member of a new group!';
				}
				else
				{
					$bdd->exec('DELETE FROM invitation WHERE id_group = '.$group.' AND id_receveur = '.$_SESSION['ID'].'');
					
					echo 'You have refuse to integrate a new group!';
				}
			}

			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	