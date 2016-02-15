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
		$id_receveur = (int) $_GET['receveur'];
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

		<p>
			<?php
			if ($_POST['group'] != "" )
			{	
			
				//On récupère l'identifiant du groupe
				$group = (int)$_POST['group'];
			
				//On se connecte à la SGBD Mysql
				include("connection_bdd.php");
					
				//On ajoute les données entrée dans la table invitation
				$membres = $bdd->prepare('INSERT INTO invitation(id_receveur, id_group,prenom_inviteur,nom_inviteur)
												VALUES(:id_receveur,:id_group,:prenom_inviteur,:nom_inviteur)');
				$membres->execute(array(
									'id_receveur' => $id_receveur,
									'id_group' => $group,
									'prenom_inviteur'=> $_SESSION['first_name'],
									'nom_inviteur'=> $_SESSION['name']
									));
									
				//On confirme que tout s'est bien déroulé
				echo 'Your invitation has been well sent <br/>';
				

			}
			else
			{
				echo 'You have not chosen one of Your Groups. <br/>';
				echo 'Please, return to <strong>Profil Page</strong> of your friend.';
			}

			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	