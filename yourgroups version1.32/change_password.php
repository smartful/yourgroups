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
	
	<?php
	
	//On récupère l'identifiant de l'utilisateur
	$id_membre = intval($_GET['id_membre']);
	
	//On se connecte au SGBD Mysql
	include("connection_bdd.php");
	?>
	
	<!-- le corps -->
	<div id="corps">
	
		<form method="post" action="change_password_post.php">
			<fieldset>

			<p>
				Your password must contain alphanumeric code and have between 6 and 15 characters. <br/>
			</p>
			
				<table>
				
					<tr>
						<td><label for="newpass">New Password</label> </td>
						<td><input type=password name="newpass" id="newpass"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="confirmation_newpass">Rewrite your New Password</label> </td>
						<td><input type=password name="confirmation_newpass" id="confirmation_newpass"/><br/></td>
					</tr>
						
				</table>
				
				<label for="captcha">*Copy the word :</label> <br/> <img src="capcha.php" alt="random image"><br/>
				<input type=text name="captcha" id="captcha"/>
			</fieldset>
			
			<p>
				<input type="submit" value="Go"/>
			</p>

		</form>
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	