<?php 

	require_once('../controller/commande.php');
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
		<h2>LISTE DES COMMANDES</h2>
	</div>
	<div class="col-md-12 col-xs-12 spacer">
		<div class="panel panel-info spacer">
			<div class="panel-heading">
				LISTE DES COMMANDES <a onclick="window.print();">Imprimer</a>
			</div>	
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>CODE</th><th>PRODUIT</th><th>CLIENT</th><th>PV</th><th>QTE_COM</th><th>PT</th><th>REDUCTION</th><th>NET_A_PAYER</th><th>DATE_COM</th>
						</tr>
					</thead>
						<tbody>
						<?php while($info=$resultat->fetch()){ ?>
								<tr>
								
									<td><?php echo $info['id_com']; ?></td>
									<td><?php echo $info['id_pro']; ?></td>
									<td><?php echo $info['id_cli']; ?></td>
									<td><?php echo $info['pv']; ?></td>
									<td><?php echo $info['qte_com']; ?></td>
									<td><?php echo $info['pt']; ?></td>
									<td><?php echo $info['red']; ?></td>
									<td><?php echo $info['net']; ?></td>
									<td><?php echo $info['date_com']; ?></td>
									
									
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