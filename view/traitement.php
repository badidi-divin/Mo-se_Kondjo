<?php
	require_once '../model/bdd/connexion.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ecole Kimbwala</title>
	<link rel="stylesheet" href="./css/test2.css">
	<style type="text/css">
		.margetop{
			margin-top: 60px;
		}
	</style>
</head>
<body>
		<div class="container margetop">
			<div class="panel panel-success">
				<div class="panel-heading">
					<a href="./accueil.php">Retour à la page d'accueil</a>
					<h4>Succès:</h4>
				</div>
				<div class="panel-body">
					<h4>Votre requete a été envoyées avec succès. Pour Confirmer votre inscription payer à la Caisse le frais d'inscription qui s'élève à 5000Fc.</h4>
					<div class="panel-body" style="background-color:#cfe8f8;">

							<table class="table table-striped">
								<thead>
									<tr>
										<th>Merci de nous avoir fait confiance voici <a href="./pdf/condition.pdf" target="_blank">les conditions</a>  à remplir pour être en ordre avec notre école </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											Passer confirmer votre inscription avant le debut de l'année scolaire ...
										</td>
									</tr>	
								</tbody>
							</table>
						</div>

					<h4><a onclick="window.print()" class="btn btn-primary">Imprimer la page >>></a></h4>
				</div>
			</div>
		</div>
	?>
<!-- **********************Code Javascript*********************-->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
