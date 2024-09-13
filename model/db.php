<?php 
	// Connexion à la base des donées
	$connection='mysql:host=localhost;dbname=gestion_vente_soir';
	// affectation de la connection à la database dans la classe PDO
	$pdo=new PDO($connection,'root','');

 ?>