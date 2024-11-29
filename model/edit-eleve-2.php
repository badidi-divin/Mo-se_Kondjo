<?php
	
	require_once('securico.php');
	$id=$_GET['id'];
	$requser=$pdo->prepare("SELECT * FROM candidat WHERE id_candidat=?");
	$requser->execute(array($id));
	$userinfo=$requser->fetch();

	if (isset($_POST['divin'])) {
		$nom=htmlspecialchars($_POST['nom']);
		$postnom=htmlspecialchars($_POST['postnom']);
		$prenom=htmlspecialchars($_POST['prenom']);
		$sexe=htmlspecialchars($_POST['sexe']);
		$email=htmlspecialchars($_POST['email']);
		$numero=htmlspecialchars($_POST['numero']);
		$adresse=htmlspecialchars($_POST['adresse']);
		$classe=htmlspecialchars($_POST['classe']);
		$annee_scolaire=htmlspecialchars($_POST['annee_scolaire']);
		$errors=array();

		
			if (empty($errors)) {

		//Création de l'objet prepare et envoie de la requête
		$ps=$pdo->prepare("UPDATE candidat SET nom=?,postnom=?,prenom=?,sexe=?,email=?,numero=?,adresse=?,classe=?,annee_scolaire=? WHERE id_candidat=?");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($nom,$postnom,$prenom,$sexe,$email,$numero,$adresse,$classe,$annee_scolaire,$id);
		//Execution de la requête par leur paramètre en ordre 
		$ps->execute($params);
	?>
			<script type="text/javascript">
				alert('Vos données ont été bien Modifiées!')
			</script>
			<script>
				window.open('./profile.php','_self')
			</script>
			<?php

			exit();	
			}
	}
