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
			$id_receveur = (int) $_GET['id_profil'];
		?>
		
		<!-- l'en tête -->
		<?php include("en_tete.php"); ?>
		
		<!-- lien pour retourner à la page du profil ou à sa page personnel -->
		<div id="menu">        
		   <div class="element_menu">
			   <h3>YourGroups</h3>
			   <ul>
				   <li><a href="personal.php">Personal Page</a></li>
				   <li><a href="voir_profil.php?id=<?php echo $id_receveur;?>">Profil Page</a></li>

			   </ul>
		   </div>    
		</div>
		
		<!-- le corps -->
		<div id="corps">
			
			
			<!--On se connecte à la SGBD Mysql-->
			<?php include("connection_bdd.php"); ?>
			
			

			
			<p>
			<form method="post" action="invitation_group_post.php?receveur=<?php echo $id_receveur;?>">
			
					<?php
					$groups_inviteur = $bdd->query('SELECT *
														FROM groupe_membre
														WHERE ID_membre = '.$_SESSION['ID'].'');
					
					echo '<select name="group" id="group">';
					echo '<option value="" selected></option>';
					
					
					while ($donnees = $groups_inviteur->fetch())
					{
						$id_groupe = $donnees['ID_groupe']; //On récupère l'identifiant d'un groupe de l'inviteur
						
						/*On va ensuite consulter la base de données groupe pour récupérer le nom du groupe*/
						
						$nom_group = $bdd->query('SELECT nom
														FROM groupe
														WHERE ID = '.$id_groupe.'')or die(print_r($bdd->errorInfo()));

						$donnees2 = $nom_group->fetch();
						$nom = $donnees2['nom'];
					
						echo '<option value="'.$id_groupe.'"> '.$nom.' </option>';
						
					}
					echo '</select>';
					
					$groups_inviteur->closeCursor();
					$nom_group->closeCursor();
					?>

				<p>
					<input type="submit" value="Go"/>
				</p>
			
			</form>
			</p>
			
			
		</div>
		
		<!-- le pied de page -->
		<?php include("pied_de_page.php"); ?>
	
	</body>
</html>
	