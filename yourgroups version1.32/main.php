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
	<?php include("deconnexion_menu.php"); ?>

	<!-- le corps -->
	<div id="corps">
		<p>
		<?php
		//on vérifie si les donnée existe
		
		//On se connecte au SGBD Mysql
		include("connection_bdd.php"); 
		
		//On vérifie si l'adresse email est dans la base de données
		if ($_POST['email']!='' AND $_POST['pass']!='')
		{
			//On supprime le html qu'un utilisateur malveillant aurait pu introduire
			$email = htmlspecialchars($_POST['email']);
			$pass = md5(htmlspecialchars($_POST['pass']));
			
			$verif = $bdd->prepare('SELECT password 
									FROM membres 
									WHERE email= ?') or die (print_r($bdd->errorInfo()));
			$verif->execute(array($email));
									

			$membre = $verif->fetch();
			
			if($membre['password'] == $pass)
			{
				$verif->closeCursor();//On ferme la requète
				$good = true;
			}
			else
			{
				$verif->closeCursor();//On ferme la requète
				header('Location: index.php');
			}
		}
		else
		{
			header('Location: index.php');
		}
		
		
		if ($good) //Si l'adresse email existe dans la bdd et que le mot de passe correspond bien
		{

			
			//On récupère le contenu de la table membre pour identifier l'utilisateur
			$utilisateur = $bdd->prepare('SELECT * 
											FROM membres 
											WHERE email= :email AND password = :password');
			$utilisateur->execute(array(
										'email' => $email,
										'password' => $pass
										));
			$donnees = $utilisateur->fetch();
			$_SESSION['ID'] = $donnees['ID'];
			$_SESSION['email'] = $donnees['email'];
			$_SESSION['first_name'] = $donnees['first_name'];
			$_SESSION['name'] = $donnees['name'];
			$_SESSION['town'] = $donnees['town'];
			$_SESSION['study'] = $donnees['study'];
			$_SESSION['job'] = $donnees['job'];
			$_SESSION['country'] = $donnees['country'];
			$_SESSION['quotation'] = $donnees['quotation'];
			$_SESSION['movies'] = $donnees['movies'];
			$_SESSION['books'] = $donnees['books'];
			$_SESSION['musics'] = $donnees['musics'];
			$_SESSION['favorite_personality'] = $donnees['favorite_personality'];
			$_SESSION['hobby'] = $donnees['hobby'];
			$_SESSION['pseudo'] = $donnees['pseudo'];
			
			
			
			$utilisateur->closeCursor(); //On ferme la requète
			
			echo 'You can access to your personal data : <a href="personal.php">go</a>';
		}
		else
		{
			header('Location: index.php');
		}
			
		?>
			
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	