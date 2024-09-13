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
	
	<div align="center" style="margin-top: 100px;">
		<h2>LISTE DES PRODUITS</h2>
	</div>

	<div class="col-md-12 col-xs-12 spacer">
		<div class="panel panel-info spacer">
			<div class="panel-heading">
				LISTE DES PRODUITS <a onclick="window.print()">Impression</a>
			</div>	
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>CODE</th><th>DESIGNATION</th><th>PU</th><th>QTE</th><th>CATEGORIE</th>
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