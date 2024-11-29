<?php
	session_start();

	// Generation Matricule
	$requser=$pdo->prepare("SELECT * FROM candidat ORDER BY matricule DESC LIMIT 1");
	$requser->execute();
	$userinfo=$requser->fetch();

	$lastid=$userinfo['matricule'];

	if ($lastid=="") {
		$matr="k-1001";
	}
	else
	{
		$matr=substr($lastid, 2);
		$matr=intval($matr);
		$matr="k-".($matr+1);
		
	}
	// End Generation

	if (isset($_POST['divin'])) {
		$nom=htmlspecialchars($_POST['nom']);
		$postnom=htmlspecialchars($_POST['postnom']);
		$prenom=htmlspecialchars($_POST['prenom']);
		$sexe=htmlspecialchars($_POST['sexe']);
		$email=htmlspecialchars($_POST['email']);
		$numero=htmlspecialchars($_POST['numero']);
		$adresse=htmlspecialchars($_POST['adresse']);
		$classe=htmlspecialchars($_POST['classe']);
		$errors=array();

		if (empty($_POST['nom']) || !preg_match('/^[A-Z_]+$/', $_POST['nom'])) {
			$errors['nom']="Votre nom n'est pas valide(Pas d'espace, ni d'accent, En Majuscule)";
		}

		if (empty($_POST['postnom']) || !preg_match('/^[A-Z_]+$/', $_POST['postnom'])) {
			$errors['postnom']="Votre post_nom n'est pas valide(Pas d'espace, ni d'accent, En Majuscule)";
		}

		if (empty($_POST['numero']) || !preg_match('/^[0-9_+]+$/', $_POST['numero'])) {
					$errors['numero']="Votre Numero n'est pas valide";
				}
				else
				{
					$req=$pdo->prepare('SELECT id_candidat FROM candidat WHERE numero=?');
					$req->execute([$_POST['numero']]);
					$user=$req->fetch();
					if ($user) {
						$errors['numero']='Ce Numero est déjà pris';
					}
					if (strlen($numero)>15) {
						$errors['numero']="Votre Numero est incorrect(trop long valeur maximum de caractères 15)";
					}
				}

		if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email']="Votre Adress_Email n'est pas valide";
			}
			else
			{
				$req=$pdo->prepare('SELECT id_candidat FROM candidat WHERE email=?');
				$req->execute([$_POST['email']]);
				$user=$req->fetch();
				if ($user) {
					$errors['email']='Cet Adresse Email est déjà prise';
				}
			}
			if (empty($errors)) {
		if (isset($_POST['code']) && $_POST['code']==$_SESSION['code']) {
		//Création de l'objet prepare et envoie de la requête
		$ps=$pdo->prepare("INSERT candidat SET nom=?,postnom=?,prenom=?,sexe=?,email=?,numero=?,matricule=?,adresse=?,classe=?");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($nom,$postnom,$prenom,$sexe,$email,$numero,$matr,$adresse,$classe);
		//Execution de la requête par leur paramètre en ordre 
		$ps->execute($params);
	?>
			<script type="text/javascript">
				alert('Vos données ont été bien enregistré!')
			</script>
			<script>
				window.open('./traitement.php','_self')
			</script>
			<?php

			exit();	
			}else{
				$errors['code']= "Code CAPTCHA incorrect !";
			}
	}
}