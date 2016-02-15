<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>YourGroups</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" media="screen" type="text/css" title="Bordeaux" href="design_bordeaux.css" />
    </head>
    <body>
	
	<?php
	/*On récupère l'entier correspondant à l'identifiant du groupe*/
	$id_group = (int)$_GET['id'];
	?>
	
		<!-- l'en tête -->
	<?php include("en_tete.php"); ?>
	
	<!-- le menu -->
	<?php include("personal_menu.php"); ?>
	
		<!-- le corps -->
	<div id="corps">
		
			<?php
				//On se connecte à la SGBD Mysql
				include("connection_bdd.php");
				
				$quit = $bdd->prepare ('DELETE FROM membres 
												WHERE ID = ?');
				$quit->execute(array($_SESSION['ID']));
			
				header('Location: index.php');
			?>
			
		
	</div>
	
		<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>

    </body>
</html>