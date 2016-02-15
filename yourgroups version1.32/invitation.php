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
					
			//On lit les données correspondant aux invitations faites à l'utilisateur
			$invitations = $bdd->prepare('SELECT *
											FROM invitation
											WHERE id_receveur = ?');
			$invitations->execute(array($_SESSION['ID']));

			while($donnees = $invitations->fetch())
			{

				$nom_groupe = $bdd->query('SELECT nom
											FROM groupe
											WHERE ID = '.$donnees['id_group'].'');
				$nom = $nom_groupe->fetch();
				
				echo 'You are invited by '.$donnees['prenom_inviteur'].'  '.$donnees['nom_inviteur'].' to this group : <br/>';
				echo $nom['nom'].'<br/>';
				echo 'Do you want to integrate it ? <br/><br/>';
				echo '<form method="post" action="invitation_post.php?group='.$donnees['id_group'].'">
						<input type="radio" name="invite" value="yes" id="yes" checked="checked" /> <label for="yes">Yes</label><br/>
						<input type="radio" name="invite" value="no" id="no" /> <label for="no">No</label><br/>
						<input type="submit" value="Go" />';
			}
				
			$invitations->closeCursor();
			//$nom_groupe->closeCursor();
			

			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	