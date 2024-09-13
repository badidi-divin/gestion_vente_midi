<?php
	require_once('../model/db.php');

	// ******Supprimer user**********************************************

	if(isset($_GET['id'])){

	$id=$_GET['id'];

	$ps=$pdo->prepare("DELETE FROM commande WHERE id_com=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer user**********************************************


	// ********************Affichage des clients****************************
   $rech=isset($_GET['rech'])?$_GET['rech']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM commande WHERE id_com LIKE '%$rech%'";			
	}else{
		$requete="SELECT * FROM commande";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// ********************Insertion de la commande*************************

    if (isset($_POST['envoie'])) {
        $id_pro=$_POST['id_pro'];
        $id_cli=$_POST['id_cli']; 
        $qte_com=htmlspecialchars($_POST['qte_com']);
        $red_com=htmlspecialchars($_POST['red']);

        if (empty($qte_com) && empty($red_com)) {
            $erreur="Tous les champs doivent être completés!";
        }else{
            // Recuperation du PV
            $req=$pdo->prepare("SELECT * FROM produit WHERE id_pro=?");	
            $req->execute(array($id_pro));
            $userpro=$req->fetch();
            $pv=$userpro['pu_pro'];
            $qte1=$userpro['qte_stock'];
            if ($qte_com<=$qte1) {
                if ($qte1<>0) {
                    $pt=$qte_com*$pv;
                    $reste=$qte1-$qte_com;
                    if ($red_com==0) {
                        $ptok=$pt;
                        // Insertion dans la base des données et mis à jour du stock
                        $req=$pdo->prepare("INSERT INTO commande(id_pro,id_cli,pv,qte_com,pt,red,net)VALUES(?,?,?,?,?,?,?)");
                        $req->execute(array($id_pro,$id_cli,$pv,$qte_com,$ptok,$red_com,0));
                        // Decrémentation de la quantité en stock
                        $req=$pdo->prepare("UPDATE produit SET qte_pro=? WHERE code_pro=?");
		                $req->execute(array($reste,$code_pro));
                        //Affichage du message du succès!
                        echo "<script>alert('Enregistrement effectué avec succès!')</script>";
                        echo "<script>window.open('commande.php', '_self')</script>";
                        exit();	
                    }else{
                        $valrem=($pt*$red_com)/100;
                        $net=$pt-$valrem;
                        // Insertion dans la base des données et mis à jour du stock
                        $req=$pdo->prepare("INSERT INTO commande(code_pro,code_cli,pv_pro,qte_com,red_com,pt_net)VALUES(?,?,?,?,?,?)");
                        $req->execute(array($code_pro,$code_cli,$pv,$qte_com,$red_com,$net));
                        // Decrémentation de la quantité en stock
                        $req=$pdo->prepare("UPDATE produit SET qte_pro=? WHERE code_pro=?");
		                $req->execute(array($reste,$code_pro));
                        //Affichage du message du succès!
                        echo "<script>alert('Enregistrement effectué avec succès!')</script>";
                        echo "<script>window.open('commande.php', '_self')</script>";
                        exit();	
                    }
                }else{
                    $erreur="Approvisionné le stock de la marchandise commandée(0 en stock)"; 
                }
            }else{
                $erreur="la quantité commandée doit être inférieur ou égale à la quantité en stock!"; 
            }

        }
    }