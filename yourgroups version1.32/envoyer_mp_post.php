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
			if ($_POST['message'] != "" )
			{	
			
				//On traite le cas où l'utilitateur n'a pas rentré de titre
				if ($_POST['title'] == "")
				{
					$_POST['title'] = 'no title';
					$title = $_POST['title'];
				}
				
				$title = htmlspecialchars($_POST['title']); //On désactive les balises htmls que l'utilisateur aurait pu rentrer
				$message_envoye = htmlspecialchars($_POST['message']);
				
				//On se connecte à la SGBD Mysql
				include("connection_bdd.php"); 
					
				//On ajoute les données entrée dans la table invitation
				$message = $bdd->prepare('INSERT INTO intern_email(id_expediteur, id_receveur, titre, message,lu)
												VALUES(:id_expediteur, :id_receveur,:titre,:message,0)');
				$message->execute(array(
									'id_expediteur' => $_SESSION['ID'],
									'id_receveur' => $id_receveur,
									'titre' => $title,
									'message'=> $message_envoye,
									));
									
				//On confirme que tout s'est bien déroulé
				echo 'Your message has been well sent <br/>';
				

			}
			else
			{
				echo 'You have not fill the message area. <br/>';
				echo 'Please, return to <strong>Profil Page</strong> of your friend.';
			}

			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	