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
			if($_GET['main'] == true ) // On regarde si la modification porte sur les données principales
			{
			/*Dans la description principale, les champs sont obligatoires, donc on fait un if pour vérifier la présence des champs*/
				if ($_POST['first_name'] != "" AND $_POST['name'] != "" AND $_POST['town'] != "" AND $_POST['study'] != "" AND $_POST['job'] != "" )
				{	
					//On traite le cas particulier du champs pays
					if ($_POST['country'] != "")
					{
						$_POST['country'] = $_SESSION['country'];
					}

					//On se connecte à la SGBD Mysql
					 include("connection_bdd.php"); 
						
					//On ajoute les données entrée dans la table membres
					$membres = $bdd->prepare('UPDATE membres
												SET first_name = :prenom, name = :nom, town = :ville, study = :etude,
													job = :boulot, country = :pays
												WHERE ID = :id');
					$membres->execute(array(
										'prenom'=> $_POST['first_name'],
										'nom'=> $_POST['name'],
										'ville'=> $_POST['town'],
										'etude'=> $_POST['study'],
										'boulot'=> $_POST['job'],
										'pays'=> $_POST['country'],
										'id' => $_SESSION['ID']
										));
										
					//On met un lien vers la page d'accueil
					header('Location: main_modif_profil.php');


				}
				else
				{
					echo 'You have not fill all datas. <br/>';
					echo 'Please, try again : <a href="personal.php">Personal Page</a>.';
				}
			}
			
			if ($_GET['optional'] == true ) // On regarde si la modification porte sur les données optionnelles
			{
			
			/*Dans la description optionnelles, les champs ne sont pas obligatoires, donc on ne fait pas de if pour vérifier la présence des champs*/
			
				//On se connecte à la SGBD Mysql
				 include("connection_bdd.php"); 
					
				//On ajoute les données entrée dans la table membres
				$membres = $bdd->prepare('UPDATE membres
											SET quotation = :citation, movies = :films, books = :livres, musics = :musiques,
												favorite_personality = :personnalite, hobby = :hobby, pseudo = :pseudo
											WHERE ID = :id');
				$membres->execute(array(
									'citation'=> $_POST['quotation'],
									'films'=> $_POST['movies'],
									'livres'=> $_POST['books'],
									'musiques'=> $_POST['musics'],
									'personnalite'=> $_POST['favorite_personality'],
									'hobby'=> $_POST['hobby'],
									'pseudo'=> $_POST['pseudo'],
									'id' => $_SESSION['ID']
									));
										
				//On met un lien vers la page perso
				header('Location: optional_modif_profil.php');
		
			}

			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	