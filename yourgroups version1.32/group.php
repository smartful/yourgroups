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
	$id_group = (int)$_GET['group'];	//on sécurise ce que l'on récupère par l'url
	?>
	
	<!-- l'en tête -->
	<?php include("en_tete.php"); ?>
	
	<!-- le menu pour aller à l'espace perso -->
	<?php include("personal_menu.php"); ?>
	
	<!-- le menu pour aller voir les membres du groupe -->
	<div id="menu_right">        
	   <div class="element_menu">
		   <h3>Profils</h3>
		   <ul>
			   <li><a href="membres_groupe.php?id=<?php echo $id_group;?>">Members</a></li><br/><br/>
			   <li><a href="quit_group.php?id=<?php echo $id_group;?>">Quit this Group</a></li>

		   </ul>
	   </div>    
	</div>
	
	<!-- le corps -->
	<div id="corps">
		
	<h1>Your Groups page</h1>

	<?php
	//On se connecte à la SGBD Mysql
	include("connection_bdd.php"); 
	
	/*On calcul le nombre de membres*/
	$nbr_membres = $bdd->prepare('SELECT COUNT(*) FROM groupe_membre WHERE ID_groupe = ?');
	$nbr_membres->execute(array($id_group));
	$nbr = $nbr_membres->fetchColumn();
	
	/*On prend la liste des membres qui sont autorisés à voir les données du groupe*/
	
	$acces = $bdd->prepare('SELECT ID_membre
							FROM groupe_membre
							WHERE ID_groupe = ?');
	$acces->execute(array($id_group));
	
	$i = 0;//On crée un variable i pour compter le nombre de membres
	
	//On crée un tableau avec les id des membres du groupe
	while($donnees = $acces->fetch())
	{
		$id_membres[$i] = $donnees['ID_membre'];
		$i++;
	}
	
	$acces->closeCursor();//on ferme la requète
	
	//On vérifie que l'utilisateur fait bien partie du groupe
	if (in_array($_SESSION['ID'],$id_membres))
	{
		$contenu = $bdd->prepare('SELECT nom, description, autorisation_majeur, nombre_membres, DATE_FORMAT(date_creation, "%d/%m/%Y %Hh%imin%ss") AS date_creation
									FROM groupe
									WHERE ID = ?');
		$contenu->execute(array($id_group));
		
		$group = $contenu->fetch();
		
		/*On affiche les données du groupe*/
		
		?>
		<table >
			<tr>
				<td ><?php echo '<a href="picture_group.php?id='.$id_group.'"><img src="groupe_profil/mini_photo_group'.$id_group.'.jpg" alt="main picture"/></a>' ?> </td>
				<td>	</td>
				<td>    </td>
			</tr>
			
			<tr>
				<td class="description">Name </td>
				<td>	</td>
				<td> <?php echo $group['nom']; ?>   </td>
			</tr>
			
			<tr>
				<td class="description">Description </td>
				<td>	</td>
				<td> <?php echo $group['description']; ?>   </td>
			</tr>
			
			<tr>
				<td class="description">Date and time of creation </td>
				<td>	</td>
				<td> <?php echo $group['date_creation']; ?>   </td>
			</tr>
			
			<tr>
				<td class="description">Only +18 (1: yes; 0: no) </td>
				<td>	</td>
				<td> <?php echo $group['autorisation_majeur']; ?>   </td>
			</tr>
			
			<tr>
				<td class="description">Number of member </td>
				<td>	</td>
				<td> <?php echo $nbr; ?>   </td>
			</tr>
			
		</table >
		
		<form action="group_post.php?id=<?php echo $id_group;?>" method="post" enctype="multipart/form-data">
						<p>
							Upload the main picture of your group : <br/>
							<input type="file" name="groupe_photo" /> <br/><br/>
							<input type="submit" value="send" />
						</p>
		</form>

	
	
		<!-- Agora -->
		
		<form action="group_agora_post.php?group=<?php echo $id_group;?>" method="post" >
					<p>
						<label for="agora">Agora : <br/>
						<textarea cols=70 rows=3 name="agora" id="agora"> </textarea> <br/><br/>
						<input type="submit" value="Go" />
					</p>
		</form>
		<?php

		/*On va afficher les données de l'agora*/
		$agora_output = $bdd->prepare('SELECT prenom, nom, message, DATE_FORMAT(date_envoi, "%d/%m/%Y %Hh%imin%ss") AS date_envoi
										FROM agora
										WHERE id_group = ?
										ORDER BY ID DESC');

		$agora_output->execute(array($id_group));
		while($donnees = $agora_output->fetch())
		{
		?>
			<table>
				<tr>
					<td class="auteur_agora"><?php echo htmlspecialchars($donnees['prenom']).'  '.htmlspecialchars($donnees['nom']).' send : '.$donnees['date_envoi'];?> </td>
				</tr>
				
				<tr>
					<td class="message_agora"> <?php echo nl2br(htmlspecialchars($donnees['message']));?> </td>
				</tr>
			
			</table>
		<?php
		}
		
		$agora_output->closeCursor(); //On ferme la requète
		
	}
	
	else
	{
		echo 'You are not allowed to access here!';
	}
	?>	
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	