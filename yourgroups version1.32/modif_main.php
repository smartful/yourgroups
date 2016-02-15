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
	
	//On se connecte au SGBD Mysql
	 include("connection_bdd.php"); 
	?>
	
	<!-- le corps -->
	<div id="corps">
	
	

		<form method="post" action="modif_post.php?main=true">
			<fieldset>
				<legend>Main Description</legend>
				<table>
				
					<tr>
						<td><label for="first_name">First name</label> </td>
						<td><input type=text name="first_name" id="first_name" value="<?php echo $_SESSION['first_name']; ?>"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="name">Name</label> </td>
						<td><input type=text name="name" id="name" value="<?php echo $_SESSION['name']; ?>"/><br/></td>
					</tr>
						
					<tr>
						<td><label for="country">Country</label> </td>
						<td><?php
								$pays = $bdd->query('SELECT * FROM country ORDER BY name');
								?>
								<select name="country" id="country">
								<option value="<?php echo $_SESSION['name']; ?>" selected></option>
							<?php
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
						<td><label for="town">Town/City</label> </td>
						<td><input type=text name="town" id="town" value="<?php echo $_SESSION['town']; ?>"/><br/></td>
					</tr>
						
					<tr>
						<td><label for="study">Study</label> </td>
						<td><input type=text name="study" id="study" value="<?php echo $_SESSION['study']; ?>"/><br/></td>
					</tr>
						
					<tr>
						<td><label for="job">Job</label> </td>
						<td><input type=text name="job" id="job" value="<?php echo $_SESSION['job']; ?>"/><br/></td>
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
	