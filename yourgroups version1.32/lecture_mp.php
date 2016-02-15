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
	
		<?php
			/*On récupère l'identifiant du message*/
			$id_message = (int) $_GET['mess']
		?>
		
		<!-- l'en tête -->
		<?php include("en_tete.php"); ?>
		
		<!-- le menu pour aller à l'espace personnel -->
		<?php include("personal_menu.php"); ?>
		
		<!-- le corps -->
		<div id="corps">
			
			<?php
			//On se connecte à la SGBD Mysql
			include("connection_bdd.php"); 
			
			/*On extrait dans la BDD l'identifiant de l'expediteur, les titres des messages et l'information pour savoir si l'utilisateur à 
			lu ces messages*/
			$messages = $bdd->prepare('SELECT *
										FROM intern_email
										WHERE ID = ?');
			$messages->execute(array($id_message));
			
			$donnees = $messages->fetch();
			
			/*On sécurise le message en désactivant les balises htmls*/
			$mp = nl2br(htmlspecialchars($donnees['message']));
			
			
			/*On extrait le nom et prénom de l'expéditeur*/
			$auteur = $bdd->prepare('SELECT first_name, name
											FROM membres
											WHERE ID = ?');
			$auteur->execute(array($donnees['id_expediteur']));
				
			$nom_expediteur = $auteur->fetch();
			
			/*On vérifie que l'utilisateur est bien autorisé à lire le message, bref qu'il est bien le receveur, si oui on affiche le message*/
			if ($donnees['id_receveur'] == $_SESSION['ID'])
			{
			?>
				<table>
						<tr class="auteur_titre_lu">
							<td> <?php echo htmlspecialchars($nom_expediteur['first_name']).'  '.htmlspecialchars($nom_expediteur['name']); ?> </td>
						</tr>
						
						<tr class="titre_lu">
							<td> <?php echo $mp; ?> </td>
						</tr>
				</table>
				
				<p>
				<a href="envoyer_mp.php?id_profil=<?php echo $donnees['id_expediteur'] ?>">Answer</a>
				</p>
			<?php
				$messages->closeCursor(); //On ferme la requète
			
				$lecture = $bdd->prepare('UPDATE intern_email SET lu = 1 WHERE ID = ?'); //On indique que le message à été lu
				$lecture->execute(array($id_message));
			
			}
			else
			{
				echo 'You are not allowed to read this message!';
			}
			
			
			$auteur->closeCursor();//On ferme la requète
			$lecture->closeCursor();//On ferme la requète
			?>
			
			
		</div>
		
		<!-- le pied de page -->
		<?php include("pied_de_page.php"); ?>
	
	</body>
</html>
	