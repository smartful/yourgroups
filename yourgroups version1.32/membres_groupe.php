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
	/*On récupère l'entier correspondant à l'identifiant du groupe*/
	$id_group = (int)$_GET['id'];
	?>
	
	<!-- l'en tête -->
	<?php include("en_tete.php"); ?>
	
	<!-- le menu pour aller à l'espace du groupe -->
	<div id="menu">        
	   <div class="element_menu">
		   <h3>YourGroups</h3>
		   <ul>
			   <li><a href="group.php?group=<?php echo $id_group ;?>">Group</a></li>

		   </ul>
	   </div>    
	</div>
	
	<?php
	
	//On se connecte au SGBD Mysql
		include("connection_bdd.php"); 
	?>
	
	<!-- le corps -->
	<div id="corps">
	
	<p>
	Here, there is the members of the group : 
	</p>
	
	<?php
	/*On réalise une requète sql pour obtenir  tous les membres appartenant au groupe*/
	
	//On prend tous les identifiants de groupes du membre
	$membres = $bdd->prepare('SELECT ID_membre
								FROM groupe_membre
								WHERE ID_groupe = ?');
	$membres->execute(array($id_group));
	
	echo 'You can see the profil of each member of the group. <br/><br/>';
	while($donnees = $membres->fetch())
	{
		//On cherche les noms correspondant au identifiant
		
		$nom_membres = $bdd->prepare('SELECT first_name,name
										FROM membres
										WHERE ID = ?');
		$nom_membres->execute(array($donnees['ID_membre']));
		
		$donnees2 = $nom_membres->fetch();
		
	
		echo ' <a href="voir_profil.php?id='.$donnees['ID_membre'].'">  '.$donnees2['first_name'].'  '.$donnees2['name'].' </a> <br/>';
	
		
	}
	
	$membres->closeCursor();
	$nom_membres->closeCursor();
	?>
	
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	