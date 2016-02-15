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
			
			<?php
			//On se connecte à la SGBD Mysql
			include("connection_bdd.php"); 
			
			//On récupère le nom et le prénom du mec à qui l'utilisateur veut envoyer un message
			$receveur = $bdd->prepare('SELECT first_name, name
										FROM membres
										WHERE ID = ?');
			$receveur->execute(array($id_receveur));
			$donnees = $receveur->fetch();
			?>
			
			<p>
				Send a message at <?php echo $donnees['first_name'].'  '.$donnees['name'] ;?>
			</p>

			
			<p>
			<form method="post" action="envoyer_mp_post.php?receveur=<?php echo $id_receveur;?>">
				
				<label for="title">Title</label>
				<input type="text" name="title" id="title"/> <br/>
			
				<textarea cols=50 rows=10 name="message"> </textarea> <br/>

				<p>
					<input type="submit" value="Send"/>
				</p>
			
			</form>
			</p>
			
			
		</div>
		
		<!-- le pied de page -->
		<?php include("pied_de_page.php"); ?>
	
	</body>
</html>
	