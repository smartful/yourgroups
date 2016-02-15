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
			if ($_POST['newpass'] != "" AND $_POST['captcha'] != $_SESSION['capcha'] ) //Attention la différenciation d'orthographe de captcha est volontaire
			{	
			
				//Vérification du mot de passe
				$_POST['newpass'] = htmlspecialchars($_POST['newpass']);
				$_POST['confirmation_newpass'] = htmlspecialchars($_POST['confirmation_newpass']);
				
				if($_POST['newpass'] == $_POST['confirmation_newpass'])
				{
				
					if (preg_match("#^[a-zA-Z0-9éèùà@&]{6,15}$#",$_POST['newpass']))
					{
						//On se connecte à la SGBD Mysql
						include("connection_bdd.php");
						
						//On ajoute les données entrée dans la table membres
						$membres = $bdd->prepare('UPDATE membres SET password = :pass WHERE ID = :id ');
						$membres->execute(array(
										'pass' => md5($_POST['newpass']),
										'id' => $_SESSION['ID']
										));
										
						//On met un lien vers la page perso
						echo 'New Password validated <br/>';
						echo 'To continue you must go in <strong>home</strong> page, and there you will fill email and password box. Thank you! <br/>';

					}
					else
					{
						
						echo 'Your password is not valid. <br/>';
						echo 'It is recalled you that : <strong>Your password must contain alphanumeric code and have between 6 and 15 characters. </strong> <br/>';
						echo 'Please, try again.';
					}
				}
				else
				{
					echo 'Your confirmation of your  password is wrong. <br/>';
					echo 'Please, try again.';
				}

			}
			else
			{
				echo 'You have not fill all the compulsories datas or you have not well write the random image. <br/>';
				echo 'Please, try again.';
			}

			?>

	
		</p>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	