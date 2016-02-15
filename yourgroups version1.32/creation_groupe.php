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
	It is compulsory to fill the field with a star * .<br/><br/>
	</p>
	
	<p>
	The information Only +18, is used to know if in the group you will create, it will be allow to speak
	, exchanges pictures and videos about adult matters (by example : sex).<br/><br/>
	</p>
	
		<form method="post" action="creation_groupe_post.php">
			<fieldset>
				<legend>Main Description of your Group</legend>
				<table>
				
					<tr>
						<td><label for="name_group">*name</label> </td>
						<td><input type=text name="name_group" id="name_group"/><br/></td>
					</tr>
					
					<tr>
						<td><label for="description">*description</label> </td>
						<td><textarea rows=7 cols=40 name="description" id="description"></textarea><br/></td>
					</tr>
					
					<tr>
						<td>*Only +18 </td>
						<td><input type="radio" name="major" value="yes" id="yes" /> <label for="yes">Yes</label><br/></td>
						<td><input type="radio" name="major" value="no" id="no" checked="checked" /> <label for="no">No</label><br/></td>
					</tr>

				</table>
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
	