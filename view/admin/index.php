<?php
	session_start();
	// Connection datatabase
	require_once '../../model/bdd/connexion.php';
	require_once '../../model/login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width-device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/test2.css">
	<style type="text/css">
		.spacer{
				margin-top: 10px;
			}
			.space{
				margin-top: 70px;
			}
			.spac{
				margin-top: 80px;
			}
			.a{
				text-align:center;
				text-decoration: blink;
			}
	</style>
</head>
<body>
<div class="contenair space col-md-6 col-xd-12 col-md-offset-3">
	<!-- panel default ce n'est que la couleur qui va changer -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="a">CONNECTEZ-VOUS</h3>

		</div>
		<div class="panel-body">
			<form method="post" action="">
				<div class="form-group">
					<label class="control-label">
						Username:
					</label>
					<input type="text" name="nom" required="required" class="form-control">
				</div>
			  <div class="form-group">
					<label class="control-label">
						Password:
					</label>
					<input type="password" name="password" required="required" class="form-control">
			  </div>
				<div class="control-label a">
					<button type="submit" class="btn btn-primary" name="formconnect">Login</button>
				</div>
			</form>
			<?php
			if (isset($erreur)) {
				echo "<font color='red'>".$erreur."</font>";
			}
		?>
		</div>
	</div>
</div>
</body>
</html>
