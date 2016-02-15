<?php
//On se connecte au SGBD Mysql
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=YourGroups','root','');
		}
		//Si il y a une erreur on affiche un message
		catch(Exception $e)
		{
			die('Error :'.$e->getMessage());
		}
?>