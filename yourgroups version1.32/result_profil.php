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
	
	<!-- le menu pour aller à l'espace personnel -->
	<?php include("personal_menu.php"); ?>
	
	<!-- le corps -->
	<div id="corps">
		
	<?php
		//On se connecte à la SGBD Mysql
		include("connection_bdd.php"); 
		
		$resultats = htmlspecialchars($_POST['search']);// On rend inopérand le html que l'utilisateur aurait pu entrer
		
		/*Pour éviter l'injection sql, on ne va prendre que le premier terme de la requète demandé par l'utilisateur*/
		
		$resultats = explode(" ",$resultats);//On crée un array comprenant chaque mots de la requète
		$resultats = $resultats[0]; //On ne prend que le premier mot de la requète de l'utilisateur

		$recherche = $bdd->query("SELECT *
									FROM membres
									WHERE  first_name LIKE '%$resultats%' OR name LIKE '%$resultats%' OR email LIKE '%$resultats%'
									ORDER BY name");
		

							
		$nombre_result = $bdd->query("SELECT COUNT(*)
									FROM membres
									WHERE first_name LIKE '%$resultats%' OR name LIKE '%$resultats%' OR email LIKE '%$resultats%'");
		
									
		$verif = $nombre_result->fetchColumn(); //On prend le nombre de résultat
		
		if ($verif == 0)
		{
			echo 'There is no result! <br/><br/><br/>';
			echo 'Try again!';
		}
		else
		{
			echo 'There is '.$verif.' results : <br/><br/><br/>';
			
			while($donnees = $recherche->fetch())
			{
			?>
			<table>
				<tr>
					<td><a href="voir_picture.php?picture=<?php echo $donnees['ID']; ?>"> <img src="photo_profil/mini_photo<?php echo $donnees['ID'];?>.jpg" </a> </td>
					<td><a href="voir_profil.php?id=<?php echo $donnees['ID'] ;?>"> <?php echo htmlspecialchars($donnees['first_name']).'  '.htmlspecialchars($donnees['name']);?></a> <br/></td>
				</tr>
			</table>
			<?php
			}
		
		}
		
		$recherche->closeCursor();
		$nombre_result->closeCursor();
	?>
		
		
		
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	