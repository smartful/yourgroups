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
	


		<form method="post" action="modif_post.php?optional=true">
			
			
			<fieldset>
				<legend>Optional Description</legend>
				<table>
					<tr>
						<td><label for="quotation">Quotation</label> </td>
						<td><input type=text name="quotation" id="quotation" size=40 value="<?php echo $_SESSION['quotation']; ?>"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="movies">Movies</label> </td>
						<td><input type=text name="movies" id="movies" size=40 value="<?php echo $_SESSION['movies']; ?>"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="books">Books</label> </td>
						<td><input type=text name="books" id="books" size=40 value="<?php echo $_SESSION['books']; ?>"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="musics">Musics</label> </td>
						<td><input type=text name="musics" id="musics" size=40 value="<?php echo $_SESSION['musics']; ?>"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="favorite_personality">Favorite Personality</label> </td>
						<td><input type=text name="favorite_personality" id="favorite_personality" size=40 value="<?php echo $_SESSION['favorite_personality']; ?>"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="hobby">Hobby</label> </td>
						<td><input type=text name="hobby" id="hobby" size=40 value="<?php echo $_SESSION['hobby']; ?>"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="pseudo">Pseudo</label> </td>
						<td><input type=text name="pseudo" id="pseudo" size=40 value="<?php echo $_SESSION['pseudo']; ?>"/><br/></td>
					</tr>
				
				</table>
			</fieldset>
			
			<!--Champ caché pour transmettre à le page modif_post de qu'elle modification il s'agit : main ou optional -->
			
			
			
			<p>
				<input type="submit" value="Go"/>
			</p>

		</form>
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	