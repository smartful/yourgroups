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
	<?php
	/*On r�cup�re l'entier correspondant � l'identifiant du groupe*/
	$id_group = (int)$_GET['id'];
	?>
	
	<!-- l'en t�te -->
	<?php include("en_tete.php"); ?>
	
	<!-- le menu pour aller � l'espace du groupe -->
	<div id="menu">        
   <div class="element_menu">
	   <h3>YourGroups</h3>
	   <ul>
		   <li><a href="group.php?group=<?php echo $id_group ;?>">Group</a></li>
		   

	   </ul>
   </div>    
	</div>
	
	<!-- le corps -->
	<div id="corps">
		
		<?php  
		
		/*On affiche la photo*/
		echo '<img src="groupe_profil/photo_group'.$id_group.'.jpg" alt="main picture"/>' ?> 
		
		
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	