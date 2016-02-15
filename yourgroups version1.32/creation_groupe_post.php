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
		
		<?php
		//On se connecte à la SGBD Mysql
			 include("connection_bdd.php"); 
		?>
		<?php
		if ( $_POST['name_group'] != "" AND $_POST['description'] != "")
		{
		
			//On rend inactif le code html que l'utilisateur aurait pu entré
			$nom = htmlspecialchars($_POST['name_group']);
			$description = htmlspecialchars($_POST['description']);
			//traitement de l'autorisation de contenu adulte dans le groupe
			if ($_POST['major'] == 'yes')
			{
				$majeur = 1;
			}
			else
			{
				$majeur = 0;
			}
			
					
			//On ajoute les données entrée dans la table groupe
			$groupe = $bdd->prepare('INSERT INTO groupe (nom, description, date_creation, autorisation_majeur, nombre_membres)
										VALUES(:nom, :description, NOW(),'.$majeur.',1)');
			$groupe->execute(array(
									'nom'=> $nom,
									'description'=> $description
									));
									
			$groupe->closeCursor(); //On ferme la requête
			
			//On veut l'identifiant du groupe qu'on vient de créer
			$prendre_id_groupe = $bdd->query('SELECT ID 
												FROM groupe
												ORDER BY date_creation DESC
												LIMIT 0,1') or die(print_r($bdd->errorInfo()));
;
			$donnees = $prendre_id_groupe->fetch();
			$id_groupe = $donnees['ID'];
			
			$prendre_id_groupe->closeCursor(); //On ferme la requête
			
			//On ajoute les données liant le membre à son groupe
			$liens = $bdd->prepare('INSERT INTO groupe_membre(ID_membre,ID_groupe)
										VALUES(:id_membre,:id_groupe)');
			$liens->execute(array(
									'id_membre'=> $_SESSION['ID'],
									'id_groupe'=> $id_groupe
									));							
									
			$liens->closeCursor(); //On ferme la requête
									
			//On met un lien vers la page groupe_membre.php
			//echo 'L\'identifiant du groupe est :'.$id_groupe.'<br/>'; //On veut voir si la récupération de l'ID fonctionne
			echo 'Creation validated <br/>';
			echo 'To continue you must go in <a href="groupe_membre.php">YourGroups page</a>. Thank you! <br/>';

		}
		else
		{
			echo 'You have not fill all datas! <br/>';
			echo 'Please return to <strong>create</strong> your group.';
		}
		
		?>
		
		
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	