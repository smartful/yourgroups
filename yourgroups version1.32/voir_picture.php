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
		$id_picture = (int) $_GET['picture'];
	?>
	
	<!-- l'en tête -->
	<?php include("en_tete.php"); ?>
	
	<!-- lien pour retourner à la page du profil ou à sa page personnel -->
	<div id="menu">        
   <div class="element_menu">
	   <h3>YourGroups</h3>
	   <ul>
		   <li><a href="personal.php">Personal Page</a></li>
		   <li><a href="voir_profil.php?id=<?php echo $id_picture;?>">Profil Page</a></li>

	   </ul>
   </div>    
	</div>
	
	<!-- le corps -->
	<div id="corps">
		
		<?php  
		$id_picture = (int) $_GET['picture'];
		
		echo '<img src="photo_profil/photo'.$id_picture.'.jpg" alt="picture"/>' ;
		?> 
		
		
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	