<?php 
	require_once('../controller/commande.php');
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
				<h2>AJOUT COMMANDE</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<?php if (isset($erreur)) {
						echo $erreur;
					} ?>
					<div class="form-group">
						<label class="control-label">
							PRODUIT
						</label>
						<select name="id_pro" class="form-control">
							<?php 
								require_once('../model/db.php');
								$req=$pdo->prepare("SELECT * FROM produit");
								$req->execute();
								while($info=$req->fetch()){
									?>
									<option value="<?php echo $info['id_pro']; ?>">
										<?php echo $info['design_pro']; ?>
									</option>
									<?php 
								}
								?>
						</select>
					</div>
							<div class="form-group">
						<label class="control-label">
							CLIENT
						</label>
						<select name="id_cli" class="form-control">
							<?php 
								require_once('../model/db.php');
								$req=$pdo->prepare("SELECT * FROM client");
								$req->execute();
								while($info=$req->fetch()){
									?>
									<option value="<?php echo $info['id_cli']; ?>">
										<?php echo $info['nom_complet']; ?>
									</option>
									<?php 
								}
								?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">
							QTE COM
						</label>
						<input type="number" name="qte_com" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label class="control-label">
							REDUCTION(%)
						</label>
						<input type="number" name="red" class="form-control" required="required" value="0">
					</div>
					
					<div class="form-group" align="center">
						<button type="submit" class="btn btn-primary" name="envoie">Ajouter</button>
					</div>
				</form>
				<?php if (isset($erreur)) {
					echo $erreur;
				} ?>
			</div>
		</div>
	</div>






	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>