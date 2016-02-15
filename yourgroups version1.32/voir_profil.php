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
    
	<!-- l'en tête -->
	<?php include("en_tete.php"); ?>
	
	<!-- le menu pour aller à l'espace personnel -->
	<?php include("personal_menu.php"); ?>
	
	<!-- le corps -->
	<div id="corps">
        
		<?php
		//On se connecte à la SGBD Mysql
		include("connection_bdd.php"); 
		
		$id_profil = (int) $_GET['id'];//On récupère l'identifiant du profil que l'utilisateur veut visiter
		
		$profil = $bdd->prepare('SELECT *
								FROM membres
								WHERE ID = ?');
		$profil->execute(array($id_profil));
		$donnees = $profil->fetch();
		?>
		
		<table >
			<tr>
				<td ><?php echo '<a href="voir_picture.php?picture='.$id_profil.'"><img src="photo_profil/mini_photo'.$donnees['ID'].'.jpg" alt="personnal picture"/></a>' ?> </td>
				<td>	</td>
				<td>    </td>
			</tr>
					
			<tr>
				<td class="description">First name </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['first_name'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Name </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['name'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Country </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['country'])) ?><br/></td>
			</tr>
						
			<tr>
				<td class="description">Town/City </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['town'])) ?><br/></td>
			</tr>
						
			<tr>
				<td class="description">Study </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['study'])) ?><br/></td>
			</tr>
						
			<tr>
				<td class="description">Job </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['job'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Email </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['email'])) ?><br/></td>
			</tr>
				
		</table>
				
				<p>
					The optional description :
				</p>
				
		<table >
				
			<tr>
				<td class="description">Quotation </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['quotation'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Movies </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['movies'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Books </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['books'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Musics </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['musics'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Favorite Personality </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['favorite_personality'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Hobby </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['hobby'])) ?><br/></td>
			</tr>
					
			<tr>
				<td class="description">Pseudo </td>
				<td>	</td>
				<td><?php echo(htmlspecialchars($donnees['pseudo'])) ?><br/></td>
			</tr>
					
		</table >
		
		<p>
		<a href="invitation_group.php?id_profil=<?php echo $id_profil;?>">Invite in one of Your Groups</a> <br/> <br/>
		<a href="envoyer_mp.php?id_profil=<?php echo $id_profil;?>">Send a message</a>
		</p>
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	
    </body>
</html>
