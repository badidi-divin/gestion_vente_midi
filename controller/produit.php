<?php
	require_once('../model/db.php');

	// ******Supprimer user**********************************************

	if(isset($_GET['id'])){

	$id=$_GET['id'];

	$ps=$pdo->prepare("DELETE FROM produit WHERE id_pro=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer user**********************************************


	// ********************Affichage des clients****************************
   $rech=isset($_GET['rech'])?$_GET['rech']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM produit WHERE design_pro LIKE '%$rech%'";			
	}else{
		$requete="SELECT * FROM produit";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// ************************Insert user*******************************
	if (isset($_POST['envoie'])) {
		$design_pro=htmlspecialchars($_POST['design_pro']);
		$pu_pro=htmlspecialchars($_POST['pu_pro']);
		$qte_stock=htmlspecialchars($_POST['qte_stock']);
		$id_categ=htmlspecialchars($_POST['id_categ']);

				// Execution de la requêtes SQL d'insertion d'utilisateur
				$req=$pdo->prepare("INSERT INTO produit SET design_pro=?,pu_pro=?,qte_stock=?,id_categ=?");
				$req->execute(array($design_pro,$pu_pro,$qte_stock,$id_categ));
				
				?>
				<script type="text/javascript">
					alert("Enregistrement effectué avec succès!")
					window.open('produit.php','_self')
				</script>
				
				<?php
			}

// ************************Fin Insert user*******************************

// ************************Edition du produit***********************************
	if (isset($_GET['id2'])) {
		$req=$pdo->prepare("SELECT * FROM produit WHERE id_pro=?");
		$req->execute(array($_GET['id2']));
		$userinfo=$req->fetch();
	}


	if (isset($_POST['envoie2'])) {
	$design_pro=htmlspecialchars($_POST['design_pro']);
	$pu_pro=htmlspecialchars($_POST['pu_pro']);
	$qte_stock=htmlspecialchars($_POST['qte_stock']);
	$id_categ=htmlspecialchars($_POST['id_categ']);

		// Execution de la requêtes SQL d'insertion d'utilisateur
		$req=$pdo->prepare("UPDATE produit SET design_pro=?,pu_pro=?,qte_stock=?,id_categ=? WHERE id_pro=?");
		$req->execute(array($design_pro,$pu_pro,$qte_stock,$id_categ,$_GET['id2']));
			
				?>
				<script type="text/javascript">
					alert("Modification effectuée avec succès!")
					window.open('produit.php','_self')
				</script>
				<?php

				exit();
	}
// ************************end select user*******************************	

