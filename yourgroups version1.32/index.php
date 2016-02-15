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
			Welcome to YourGroups web site. <br/>
			You can register now!

	
		</p>
		
		<form method="post" action="main.php">
			<fieldset>
				<legend>Your access</legend>
				<table>
				
					<tr>
						<td><label for="email">Email adress</label> </td>
						<td><input type=text name="email" id="email"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="pass">Password</label> </td>
						<td><input type=password name="pass" id="pass"/><br/></td>
					</tr>
						
				</table>
			</fieldset>
			<p>
				<input type="submit" value="Go"/>
			</p>
		</form>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page_auteur.php"); ?>
	</body>
</html>
	