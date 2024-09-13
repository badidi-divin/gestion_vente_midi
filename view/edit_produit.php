<?php 
	require_once('../controller/produit.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion Kin Marché</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	<?php require_once('menu.php'); ?>
	<div class="contenair col-md-6 col-xd-12 col-md-offset-3" style="margin-top:80px">
		<div class="panel panel-default">
			<div class="panel-heading" align="center">
				<h2>EDITION</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<?php if (isset($erreur)) {
						echo $erreur;
					} ?>
					<div class="form-group">
						<label class="control-label">
							DESIGNATION
						</label>
						<input type="text" name="design_pro" class="form-control" required="required" value="<?= $userinfo['design_pro'] ?>">
					</div>
					<div class="form-group">
						<label class="control-label">
							PU
						</label>
						<input type="number" name="pu_pro" class="form-control" required="required" value="<?= $userinfo['pu_pro']  ?>">
					</div>
					<div class="form-group">
						<label class="control-label">
							QTE STOCK
						</label>
						<input type="number" name="qte_stock" class="form-control" required="required" value="<?= $userinfo['qte_stock']; ?>">
					</div>
					<div class="form-group">
						<label class="control-label">
							CATEGORIE
						</label>
						<select name="id_categ" class="form-control">
							<?php 
								require_once('../model/db.php');
								$req=$pdo->prepare("SELECT * FROM categorie");
								$req->execute();
								while($info=$req->fetch()){
									?>
									<option value="<?php echo $info['id_categ']; ?>">
										<?php echo $info['design_categ']; ?>
									</option>
									<?php 
								}
								?>
						</select>
					</div>
					<div class="form-group" align="center">
						<button type="submit" class="btn btn-primary" name="envoie2">Edition</button>
					</div>
				</form>
			</div>
		</div>
	</div>






	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>