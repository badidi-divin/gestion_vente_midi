<?php 
	session_start(); 
	require_once('../controller/client.php');
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
	
	<div align="center" style="margin-top: 50px;">
		<h2>LISTE DES CLIENTS</h2>
	</div>
	<div class="col-md-12 col-xs-12 spacer">
		<div class="panel panel-info spacer">
			<div class="panel-heading">
				LISTE DES CLIENTS <a onclick="window.print();" >Impression</a>
			</div>	
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>CODE</th><th>NOM_COMPLET</th><th>SEXE</th><th>TELEPHONE</th><th>EMAIL</th><th>ADRESSE</th><th>TYPE_CLIENT</th>
						</tr>
					</thead>
						<tbody>
							
								<?php while($info=$resultat->fetch()){ ?>
								<tr>
								<td><?php echo $info['id_cli']; ?></td>
								<td><?php echo $info['nom_complet']; ?></td>
								<td><?php echo $info['sexe']; ?></td>
								<td><?php echo $info['tel']; ?></td>
								<td><?php echo $info['email']; ?></td>
								<td><?php echo $info['adresse']; ?></td>
								<td><?php echo $info['id_type']; ?></td>
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