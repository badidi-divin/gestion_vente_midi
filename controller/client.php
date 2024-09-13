<?php
	require_once('../model/db.php');

	// ******Supprimer user**********************************************

	if(isset($_GET['id'])){

	$id=$_GET['id'];

	$ps=$pdo->prepare("DELETE FROM client WHERE id_cli=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer user**********************************************


	// ********************Affichage des clients****************************
   $rech=isset($_GET['rech'])?$_GET['rech']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM client WHERE nom_complet LIKE '%$rech%'";			
	}else{
		$requete="SELECT * FROM client";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// ************************Insert user*******************************
	if (isset($_POST['envoie'])) {
		$nom=htmlspecialchars($_POST['nom']);
		$sexe=htmlspecialchars($_POST['sexe']);
		$tel=htmlspecialchars($_POST['tel']);
		$email=htmlspecialchars($_POST['email']);
		$adresse=htmlspecialchars($_POST['adresse']);
		$type_cli=htmlspecialchars($_POST['type_cli']);

				// Execution de la requêtes SQL d'insertion d'utilisateur
				$req=$pdo->prepare("INSERT INTO client SET nom_complet=?,sexe=?,tel=?,email=?,adresse=?,id_type=?");
				$req->execute(array($nom,$sexe,$tel,$email,$adresse,$type_cli));
				
				?>
				<script type="text/javascript">
					alert("Enregistrement effectué avec succès!")
					window.open('client.php','_self')
				</script>
				<?php

				exit();
			}

// ************************Fin Insert user*******************************

// ************************select user***********************************
	// Execution de la requêtes SQL d'insertion d'utilisateur
	if (isset($_GET['id2'])) {
		$req=$pdo->prepare("SELECT * FROM client WHERE id_cli=?");
		$req->execute(array($_GET['id2']));
		$userinfo=$req->fetch();
	}
	if (isset($_POST['envoie2'])) {
	$nom=htmlspecialchars($_POST['nom']);
	$sexe=htmlspecialchars($_POST['sexe']);
	$tel=htmlspecialchars($_POST['tel']);
	$email=htmlspecialchars($_POST['email']);
	$adresse=htmlspecialchars($_POST['adresse']);
	$type_cli=htmlspecialchars($_POST['type_cli']);

	// Execution de la requêtes SQL d'insertion d'utilisateur
	$req=$pdo->prepare("UPDATE client SET nom_complet=?,sexe=?,tel=?,email=?,adresse=?,id_type=? WHERE id_cli=?");
	$req->execute(array($nom,$sexe,$tel,$email,$adresse,$type_cli,$_GET['id2']));
			
				?>
				<script type="text/javascript">
					alert("Modification effectuée avec succès!")
					window.open('client.php','_self')
				</script>
				<?php

				exit();
	}
// ************************end select user*******************************	

