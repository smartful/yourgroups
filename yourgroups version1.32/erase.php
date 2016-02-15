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
	/*On r�cup�re l'entier correspondant � l'identifiant du groupe*/
	$id_membre = (int)$_GET['id'];
	?>
	
		<!-- l'en t�te -->
	<?php include("en_tete.php"); ?>
	
	<!-- le menu -->
	<?php include("personal_menu.php"); ?>
	
		<!-- le corps -->
	<div id="corps">
		
		<p>
			Do you really want to erase your account? All your datas will be erased!  <br/>
			If yes clic here :
		</p>
		
		<a href ="real_erase.php?id=<?php echo $id_membre;?>">You confirm that you want to quit  YourGroups Adventure </a>
			
		
	</div>
	
		<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>

    </body>
</html>