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
			
			/*On extrait dans la BDD l'identifiant de l'expediteur, les titres des messages et l'information pour savoir si l'utilisateur à 
			lu ces messages*/
			$messages = $bdd->prepare('SELECT *
										FROM intern_email
										WHERE id_receveur = ?
										ORDER BY ID DESC');
			$messages->execute(array($_SESSION['ID']));
			
			while($donnees = $messages->fetch())
			{
				$titre = htmlspecialchars($donnees['titre']); //On rend inactif les balises htmls du message
			
				/*On extrait le nom et prénom de l'expéditeur*/
				$expediteur = $bdd->prepare('SELECT first_name, name
												FROM membres
												WHERE ID = ?');
				$expediteur->execute(array($donnees['id_expediteur']));
				
				$nom_expediteur = $expediteur->fetch();
				
				if ($donnees['lu'] == 0)
				{
					?>
					<table>
						<tr class="auteur_titre_non_lu">
							<td> <?php echo htmlspecialchars($nom_expediteur['first_name']).'  '.htmlspecialchars($nom_expediteur['name']); ?> </td>
						</tr>
						
						<tr class="titre_non_lu">
							<td><a href="lecture_mp.php?mess=<?php echo $donnees['ID'];?>"> <?php echo $titre;?> </a></td>
						</tr>
					</table>
					<?php
				}
				else
				{
					?>
					<table>
						<tr class="auteur_titre_lu">
							<td> <?php echo htmlspecialchars($nom_expediteur['first_name']).'  '.htmlspecialchars($nom_expediteur['name']); ?> </td>
						</tr>
						
						<tr class="titre_lu">
							<td><a href="lecture_mp.php?mess=<?php echo $donnees['ID'];?>"> <?php echo $titre; ?> </a></td>
						</tr>
					</table>
					
					<?php
				}
			}
						
			$messages->closeCursor(); //On ferme la requète
			
			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	