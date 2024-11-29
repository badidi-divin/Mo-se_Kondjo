<?php
	session_start();
	require_once('securico.php');
	$id=1;
	if ($_SESSION['role']=="caissier(e)") {
		header("location:frais/view/profile.php");
	}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title> 
	<link rel="stylesheet" type="text/css" href="../css/test2.css">
</head>
	<style type="text/css">
		/** Pour creer un decallage **/
			.spacer{
				padding-top: 80px;
			}
			.space{
				margin-top: 60px;
			}
			.spac{
				margin-top: 80px;
			}
			.a{
				text-align:center;
				text-decoration: blink;
			}
	</style>
	<body>
		<!-- Navigation -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="profile.php">Tableau de bord</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter</a>
				</li>
			</ul>
		</div>
	<!-- navigation end -->
	<?php 
	    require_once("../../model/bdd/connexion.php");
		require_once('../../model/selection_candidat.php');
	?>
	<div class="contenair col-lg-12 col-md-6 spacer">
		<div class="panel panel-primary ">
				<div class="panel-heading">
					Rechercher
				</div>
				<div class="panel-body">
					<form method="get" action="" class="form-inline">
						<div class="form-group">
							<label for="propri">Nom:</label>
							<input type="text" name="mot1" class="form-control" placeholder="Mettez le nom du candidat" value="<?php echo $mot1 ?>">
						</div>
						<label for="option">Etat:</label>
						<select name="mot2" class="form-control" onchange="this.form.submit()" id="option">
							<option value="all"  <?php if($mot2==="all") echo "selected" ?>>Tous</option>
							<option value="1" <?php if($mot2==="1") echo "selected" ?>>Valider</option>
							<option value="0" <?php if($mot2==="0") echo "selected" ?>>Non Valider</option>
						</select>
						<button type="submit" class="btn btn-success">
						Rechercher</button>
						&nbsp;&nbsp;
						<a href="ajout-eleve.php" class="btn btn-primary">Ajouter Elève</a>
						&nbsp;&nbsp;
						<a href="imprimer.php" class="btn btn-primary">Imprimer candidats(Validés)</a>
						&nbsp;&nbsp;
						<a href="imprime1.php" class="btn btn-danger">Imprimer candidats(Non Validés)</a>
					</form>
				</div>
			</div>

		<div align="center">

			<h1 style="font-size: 45px;">
				Bienvenue  <?php echo $_SESSION['nom']."(".$_SESSION['role'].")"; ?>
			</h1>
		</div>

			<div class="col-md-12 col-xs-12 ">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						LISTE DES CANDIDATS
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<div class="table-responsive table--no-card m-b-30">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th><th>NOM COMPLET</th><th>SEXE</th><th>EMAIL</th><th>TELEPHONE</th>
										<th>MATRICULE</th>

										<th>CLASSE</th><th>ADRESSE</th><th>DATES</th>
									</tr>
								</thead>
															<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr class="<?php echo ($et['etat']==1? 'success':'danger');?>">
								<td><?php  echo($id)?></td>
								<td><?php  echo($et['nom']." ".$et['postnom']." ".$et['prenom'])?></td>
								<td><?php  echo($et['sexe'])?></td>
								<td><?php  echo($et['email'])?></td>
								<td>+<?php  echo($et['numero'])?></td>
								<td><?php  
											if ($et['etat']==1) {
												echo($et['matricule']);
											}else{
												echo "Pas disponible";
											}
										?></td>
								<td><?php  echo($et['classe'])?></td>
								<td><?php  echo($et['adresse'])?></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td><a onclick="return confirm('Etes-vous sûre...?');" href="../../model/supprimer-candidat.php?id=<?php echo($et['id_candidat'])?>" class="btn btn-danger">Supprimer</a><br>
									<a href="activeetudiant.php?id=<?php echo($et['id_candidat'])?>&etat=<?= $et['etat']; ?>" class="btn btn-success">

								<?php
									if($et['etat']!=1)
										echo 'Valider';

									else
										echo 'Rejetter';
								?>
									
								</a>								
								<a href="Editetudiant.php?id=<?php echo($et['id_candidat'])?>" class="btn btn-primary">Edit</a>
								</td>
											</tr>	
									<?php $id++;} ?>	
							</tbody>
							</table>
						</div>
					</div>
				</div>	
			</div>
		</div>
	<!-- Circulation de la page -->
	</body>
</html>
<?php
}
?>