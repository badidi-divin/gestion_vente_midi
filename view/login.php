<?php 
	require_once('../controller/user.php');
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
	<div class="contenair col-md-6 col-xd-12 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading" align="center">
				<h2>AUTHENTIFICATION</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<?php if (isset($erreur)) {
						echo $erreur;
					} ?>
					<div class="form-group">
						<label class="control-label">
							Nom d'utilisateur
						</label>
						<input type="text" name="username" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label class="control-label">
							Mot de Passe
						</label>
						<input type="password" name="password" class="form-control" required="required">
					</div>
					<div class="form-group" align="center">
						<button type="submit" class="btn btn-primary" name="envoie2">Se Connecter</button>
						<a href="inscription.php">Créer un compte</a>
					</div>
				</form>
			</div>
		</div>
	</div>






	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>