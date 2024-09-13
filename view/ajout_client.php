<?php 
	require_once('../controller/client.php');
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
				<h2>AJOUT CLIENT</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<?php if (isset($erreur)) {
						echo $erreur;
					} ?>
					<div class="form-group">
						<label class="control-label">
							Nom Complet
						</label>
						<input type="text" name="nom" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label class="control-label">
							Sexe
						</label>
						<select name="sexe" class="form-control">
							<option value="M">M</option>
							<option value="F">F</option>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">
							Telephone
						</label>
						<input type="number" name="tel" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label class="control-label">
							Email
						</label>
						<input type="email" name="email" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label class="control-label">
							Adresse Complete
						</label>
						<input type="text" name="adresse" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label class="control-label">
							Type Client
						</label>
						<select name="type_cli" class="form-control">
							<?php 
								require_once('../model/db.php');
								$req=$pdo->prepare("SELECT * FROM type_cli");
								$req->execute();
								while($info=$req->fetch()){
									?>
									<option value="<?php echo $info['id_type']; ?>">
										<?php echo $info['design_type']; ?>
									</option>
									<?php 
								}
								?>
						</select>
					</div>
					<div class="form-group" align="center">
						<button type="submit" class="btn btn-primary" name="envoie">Ajouter</button>
					</div>
				</form>
			</div>
		</div>
	</div>






	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>