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
	
	<?php
	
	//On se connecte au SGBD Mysql
		 include("connection_bdd.php"); 
	?>
	
	<!-- le corps -->
	<div id="corps">
	
	<p>
	It is compulsory to fill the field with a star * .
	</p>
		<form method="post" action="formulaire_post.php">
			<fieldset>
				<legend>Main Description</legend>
				<table>
				
					<tr>
						<td><label for="first_name">*First name</label> </td>
						<td><input type=text name="first_name" id="first_name"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="name">*Name</label> </td>
						<td><input type=text name="name" id="name"/><br/></td>
					</tr>
						
					<tr>
						<td><label for="country">*Country</label> </td>
						<td><?php
								$pays = $bdd->query('SELECT * FROM country ORDER BY name');
								echo '<select name="country" id="country">';
								echo '<option value="" selected></option>';
								while($donnees = $pays->fetch())
								{
									//$code = $donnees['Code'];
									$name = $donnees['Name'];
									echo '<option value='.$name.'>'.$name.'</option>';
								}
								echo '</select>';
								
							
							?><br/></td>
					</tr>
						
					<tr>
						<td><label for="town">*Town/City</label> </td>
						<td><input type=text name="town" id="town"/><br/></td>
					</tr>
						
					<tr>
						<td><label for="study">*Study</label> </td>
						<td><input type=text name="study" id="study"/><br/></td>
					</tr>
						
					<tr>
						<td><label for="job">*Job</label> </td>
						<td><input type=text name="job" id="job"/><br/></td>
					</tr>
				
				</table>
			</fieldset>
			
			<p>
				The Main and Optional Descriptions will be available on public pages. <br/>
			</p>
			
			<fieldset>
				<legend>Optional Description</legend>
				<table>
					<tr>
						<td><label for="quotation">Quotation</label> </td>
						<td><input type=text name="quotation" id="quotation" size=40/><br/></td>
					</tr>
					
					<tr>
						<td><label for="movies">Movies</label> </td>
						<td><input type=text name="movies" id="movies" size=40/><br/></td>
					</tr>
					
					<tr>
						<td><label for="books">Books</label> </td>
						<td><input type=text name="books" id="books" size=40/><br/></td>
					</tr>
					
					<tr>
						<td><label for="musics">Musics</label> </td>
						<td><input type=text name="musics" id="musics" size=40/><br/></td>
					</tr>
					
					<tr>
						<td><label for="favorite_personality">Favorite Personality</label> </td>
						<td><input type=text name="favorite_personality" id="favorite_personality" size=40/><br/></td>
					</tr>
					
					<tr>
						<td><label for="hobby">Hobby</label> </td>
						<td><input type=text name="hobby" id="hobby" size=40/><br/></td>
					</tr>
					
					<tr>
						<td><label for="pseudo">Pseudo</label> </td>
						<td><input type=text name="pseudo" id="pseudo" size=40/><br/></td>
					</tr>
				
				</table>
			</fieldset>
			
			<p>
				Your password must contain alphanumeric code and have between 6 and 15 characters. <br/>
			</p>
			
			<fieldset>
				<legend>Your access</legend>
				<table>
				
					<tr>
						<td><label for="email">*Email adress</label> </td>
						<td><input type=text name="email" id="email"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="confirmation_email">*Rewrite your Email adress</label> </td>
						<td><input type=text name="confirmation_email" id="confirmation_email"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="pass">*Password</label> </td>
						<td><input type=password name="pass" id="pass"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="confirmation_pass">*Rewrite your Password</label> </td>
						<td><input type=password name="confirmation_pass" id="confirmation_pass"/><br/></td>
					</tr>
						
				</table>
				
				<label for="capcha">*Copy the word :</label> <br/> <img src="capcha.php" alt="random image"><br/>
				<input type=text name="capcha" id="capcha"/>
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
	