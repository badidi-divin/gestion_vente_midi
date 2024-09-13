<?php 
	
	require_once('../controller/produit.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<?php require_once('menu.php'); ?>
	<div align="center" style="margin-top: 100px;">
		<h2>LISTE DES PRODUITS</h2>
	</div>
	<div class="col-md-12 col-xd-12 space">
		<form method="get" action="">
			<div class="form-group">
				<label class="control-label">
						Code Produit
				</label>
				<div class="form-group">
					<input type="text" class="form-control" name="rech"  placeholder="Entrer la designation du produit à chercher...">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" name="search">Recherche</button>
					<a href="imprimer_produit.php" class="btn btn-success">Imprimer</a>
					<a href="ajout_produit.php" class="btn btn-primary">Ajouter</a>
				</div>				
			</div>
		</form>
	</div>
	<div class="col-md-12 col-xs-12 spacer">
		<div class="panel panel-info spacer">
			<div class="panel-heading">
				LISTE DES PRODUITS 
			</div>	
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>CODE</th><th>DESIGNATION</th><th>PU</th><th>QTE</th><th>CATEGORIE</th><th>ACTIONS</th>
						</tr>
					</thead>
						<tbody>
							
								<?php while($info=$resultat->fetch()){ ?>
								<tr>
								
								<td><?php echo $info['id_pro']; ?></td>
								<td><?php echo $info['design_pro']; ?></td>
								<td><?php echo $info['pu_pro']; ?></td>
								<td><?php echo $info['qte_stock']; ?></td>
								<td><?php  

								$req=$pdo->prepare("SELECT * FROM categorie WHERE id_categ=?");
								$req->execute(array($info['id_categ']));
								$userinfo=$req->fetch();
								 echo $userinfo['design_categ']; 

								?></td>
								<td>
									<a href="../controller/produit.php?id=<?php echo $info['id_pro']; ?>">Supprimer</a>
									<a href="edit_produit.php?id2=<?php echo $info['id_pro']; ?>">Editer</a>
								</td>
								</tr>
								<?php }
								 ?>		
							
						</tbody>
				</table>
			</div>
		</div>	
	</div>
	<!-- Circulation de la page -->
</body>
</html>