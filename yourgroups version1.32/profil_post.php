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
	
	<!-- le menu pour aller à l'espace perso -->
	<?php include("personal_menu.php"); ?>
	
		<!-- le corps -->
	<div id="corps">
	
		<?php
		/*On vérifie l'existence du fichier et si il n'y a pas d'erreur*/
		if(isset($_FILES['photo_profil']) AND $_FILES['photo_profil']['error']==0)
		{
			/*On vérifie maintenant que la taille n'est pas trop imposante*/
			if($_FILES['photo_profil']['size'] <= 1000000)
			{
				/*On vérifie l'extension du fichier envoyé*/
				
				$extensions_accept = array('jpg','jpeg','gif','png'); 
				$infosfichier = pathinfo($_FILES['photo_profil']['name']);
				$extension = $infosfichier['extension'];
				
				if(in_array($extension,$extensions_accept))
				{
					/*On enregistre le fichier dans le dossier upload*/
					if(move_uploaded_file($_FILES['photo_profil']['tmp_name'],'photo_profil/photo'.$_SESSION['ID'].'.jpg'))
					{
						
						/*On vas maintenant miniaturiser l'image qui nous a été envoyé*/
			
						$source = imagecreatefromjpeg("photo_profil/photo".$_SESSION['ID'].".jpg");//création des images
						$destination = imagecreatetruecolor(110,100);
						
						$largeur_destination = imagesx($destination);//affectation des mesures des images
						$hauteur_destination = imagesy($destination);
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						
						imagecopyresampled($destination,$source,0,0,0,0,$largeur_destination,$hauteur_destination,$largeur_source,$hauteur_source);
						
						imagejpeg($destination,'photo_profil/mini_photo'.$_SESSION['ID'].'.jpg');
						
						echo 'the picture has been well send <br/>';
					}
					else
					{
						echo 'there was a problem when the picture has been saved, please try again <br/>';
					}
				
				}
				else
				{
					echo 'extension of your picture is not jpg,jpeg,gif or png <br/>'; 
				}
			}
			else
			{
				echo 'your picture is more than 1Mo, it is too much for a picture <br/>';
			}
		}
		else
		{
			echo 'the files doesn\'t exist or there is an error <br/><br/>';
			echo $_FILES['photo_profil']['error'].'<br/>';
		}

		
		?>
		
	
	</div>
	
		<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>

    </body>
</html>