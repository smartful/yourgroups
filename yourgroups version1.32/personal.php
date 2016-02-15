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
	<?php include("deconnexion_menu.php"); ?>
	
	<!-- le menu de création et de navigation des groupes -->
	<?php include("menu_groups.php"); ?>
	
	<!-- le menu de recherche des profils -->
	<?php include("menu_recherche.php"); ?>

	<!-- le corps -->
	<div id="corps">
		<p>
		
		
			<table >
					<tr>
						<td ><?php echo '<a href="picture.php"><img src="photo_profil/mini_photo'.$_SESSION['ID'].'.jpg" alt="personnal picture"/></a>' ?> </td>
						<td>	</td>
						<td>    </td>
					</tr>
					
					<tr>
						<td><a href="modif_main.php">Change my main description</a></td>    
						<td>	</td>
						<td>    </td>
					</tr>
					
					<tr>
						<td class="description">First name </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['first_name'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Name </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['name'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Country </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['country'])) ?><br/></td>
					</tr>
						
					<tr>
						<td class="description">Town/City </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['town'])) ?><br/></td>
					</tr>
						
					<tr>
						<td class="description">Study </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['study'])) ?><br/></td>
					</tr>
						
					<tr>
						<td class="description">Job </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['job'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Email </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['email'])) ?><br/></td>
					</tr>
				
				</table>
				
				<p>
					The optional description :
				</p>
				
				<table >
				
					<tr>
						<td><a href="modif_optional.php">Change my optional description</a></td>    
						<td>	</td>
						<td>    </td>
					</tr>

				
					<tr>
						<td class="description">Quotation </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['quotation'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Movies </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['movies'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Books </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['books'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Musics </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['musics'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Favorite Personality </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['favorite_personality'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Hobby </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['hobby'])) ?><br/></td>
					</tr>
					
					<tr>
						<td class="description">Pseudo </td>
						<td>	</td>
						<td><?php echo(htmlspecialchars($_SESSION['pseudo'])) ?><br/></td>
					</tr>
					
				</table >
				
				<!--ajout du formulaire d'envoi de la photo de profil -->
				
				<form action="profil_post.php" method="post" enctype="multipart/form-data">
					<p>
						Upload your personnal picture : <br/>
						<input type="file" name="photo_profil" /> <br/><br/>
						<input type="submit" value="send" />
					</p>
				</form>
				
			<!-- On a ici les liens vers la messagerie privée et les invitations -->
			<table >
					<tr>
						<td ><a href="mp.php"><img src="images/message.png" alt="personal messages"/></a> </td>
						<td>	</td>
						<td><a href="invitation.php"><img src="images/invitation.png" alt="invitations"/></a> </td>
					</tr>
			<table >
			
			<br/><br/><br/><br/>
			
			<a href="change_password.php?id_membre=<?php echo $_SESSION['ID']?>">Change your Password</a>
			
			<br/><br/><br/><br/>
		
			<a href="erase.php?id=<?php echo $_SESSION['ID']?>">Erase your account</a>
		</p>
		
	</div>
	<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>
	</body>
</html>
	