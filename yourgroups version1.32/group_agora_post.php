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
	$id_group = (int)$_GET['group'];
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
	
		<!-- le corps -->
	<div id="corps">
	
		<?php
		//On se connecte à la SGBD Mysql
		include("connection_bdd.php"); 
		
		if($_POST['agora'] != "")
		{
			/*On insère les données que l'utilisateur a envoyé à l'agora*/
			$agora_input = $bdd->prepare('INSERT INTO agora (prenom,nom,message,date_envoi,id_group)
										VALUES (:prenom,:nom,:message,NOW(),:id_group)') or die(print_r($bdd->errorInfo()));

			$agora_input->execute(array(
										'prenom' => $_SESSION['first_name'],
										'nom' => $_SESSION['name'],
										'message' => $_POST['agora'],
										'id_group' => $id_group
										));
			$agora_input->closeCursor();
			header('Location: group.php?group='.$id_group.'');
		}
		else
		{
			echo 'You have not filled the message field';
		}
		
		?>

	</div>
	
		<!-- le pied de page -->
	<?php include("pied_de_page.php"); ?>

    </body>
</html>