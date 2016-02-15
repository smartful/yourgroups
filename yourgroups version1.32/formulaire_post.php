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
	<?php include("menu.php"); ?>
	
	<!-- le corps -->
	<div id="corps">
		<p>
			<?php
			if ($_POST['first_name'] != "" AND $_POST['name'] != "" AND $_POST['country'] != "" AND $_POST['town'] != "" AND $_POST['study'] != "" AND $_POST['job'] != "" AND $_POST['email'] != "" AND $_POST['pass'] != "" AND $_POST['capcha'] != $_SESSION['capcha'] )
			{	
			
				//Vérification de l'adresse mail et le mot de passe
				$_POST['email'] = htmlspecialchars($_POST['email']);
				$_POST['confirmation_email'] = htmlspecialchars($_POST['confirmation_email']);
				$_POST['pass'] = htmlspecialchars($_POST['pass']);
				$_POST['confirmation_pass'] = htmlspecialchars($_POST['confirmation_pass']);
				
				if($_POST['email'] == $_POST['confirmation_email'] AND $_POST['pass'] == $_POST['confirmation_pass'])
				{
				
					if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email']) AND preg_match("#^[a-zA-Z0-9éèùà@&]{6,15}$#",$_POST['pass']))
					{
						//On se connecte à la SGBD Mysql
						include("connection_bdd.php"); 
						
						//On ajoute les données entrée dans la table membres
						$membres = $bdd->prepare('INSERT INTO membres(first_name,name,town,study,job,email,password,date_inscription,
																		country,quotation,movies,books,musics,favorite_personality,
																		hobby,pseudo)
													VALUES(:prenom, :nom, :ville, :etude, :boulot, :courriel, :pass, NOW(),
															:pays, :citation, :films, :livres, :musiques, :personalite,
															:hobby, :pseudo)');
						$membres->execute(array(
										'prenom'=> $_POST['first_name'],
										'nom'=> $_POST['name'],
										'ville'=> $_POST['town'],
										'etude'=> $_POST['study'],
										'boulot'=> $_POST['job'],
										'courriel'=> $_POST['email'],
										'pass'=> md5($_POST['pass']),
										'pays'=> $_POST['country'],
										'citation'=> $_POST['quotation'],
										'films'=> $_POST['movies'],
										'livres'=> $_POST['books'],
										'musiques'=> $_POST['musics'],
										'personalite'=> $_POST['favorite_personality'],
										'hobby'=> $_POST['hobby'],
										'pseudo'=> $_POST['pseudo']
										));
										
						//On met un lien vers la page perso
						echo 'Subcription validated <br/>';
						echo 'To continue you must go in <strong>home</strong> page, and there you will fill email and password box. Thank you! <br/>';

					}
					else
					{
						$_POST['email'] = htmlspecialchars($_POST['email']);
						echo 'Your email adresse : <strong>'.$_POST['email'].'</strong> or/and your password is not valid. <br/>';
						echo 'It is recalled you that : <strong>Your password must contain alphanumeric code and have between 6 and 15 characters. </strong> <br/>';
						echo 'Please, return to <strong>subcription</strong>.';
					}
				}
				else
				{
					echo 'Your confirmation of your email adress or your password is wrong. <br/>';
					echo 'Please, return to <strong>subcription</strong>.';
				}

			}
			else
			{
				echo 'You have not fill all the compulsories datas or you have not well write the random image. <br/>';
				echo 'Please, return to <strong>subcription</strong>.';
			}

			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	