<?php
	session_start();
	require_once('../model/db.php');

	// ******Supprimer user**********************************************

	if(isset($_GET['id'])){

	$id=$_GET['id'];
	
	require_once('../model/connexion.php');

	$ps=$pdo->prepare("DELETE FROM user WHERE id=?");

	$params=array($id);

	$ps->execute($params);
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
	}
// ******End Supprimer user**********************************************

	
	$c=1;

	// ********************Affichage des clients****************************
   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM user WHERE username LIKE '%$mot1%'";			
	}else{
		$requete="SELECT * FROM user";	
	}
	$resultat=$pdo->query($requete);
// ********************End Affichage des clients************************

// ************************Insert user*******************************
	if (isset($_POST['envoie'])) {
		$username=htmlspecialchars($_POST['username']);
		$password1=htmlspecialchars($_POST['password1']);
		$password2=htmlspecialchars($_POST['password2']);
		$role=$_POST['role'];

		if (!empty($username) && !empty($password1) && !empty($password2)) {

			if($password1<>$password2){
				$erreur="vos mots de passes sont incorrects!!!!";
			}else{
				$password=md5($password2);
				// Execution de la requêtes SQL d'insertion d'utilisateur
				$req=$pdo->prepare("INSERT INTO user SET username=?,password=?,role=?");
				$req->execute(array($username,$password,$role));
				
				?>
				<script type="text/javascript">
					alert("Enregistrement effectué avec succès!")
					window.open('login.php','_self')
				</script>
				<?php
			}

		}else{
				$erreur="Tous les champs doivent être complétés!";
			}
		}
// ************************Fin Insert user*******************************

// ************************select user***********************************		
	if (isset($_POST['envoie2'])) {
		$username=htmlspecialchars($_POST['username']);
		$password=md5($_POST['password']);
		if (!empty($username) && !empty($password)) {
			// verification de l'utilisateur
			$requiser=$pdo->prepare("SELECT * FROM user WHERE username=? AND password=?");
			$requiser->execute(array($username,$password));

			// après avoir executé ma requête, je vais créer les sessions de l'utilisateur

			$userexist=$requiser->rowCount();
			if ($userexist==1) {

				$userinfo=$requiser->fetch();

				$_SESSION['id']=$userinfo['id'];
				$_SESSION['username']=$userinfo['username'];
				$_SESSION['role']=$userinfo['role'];
				header("location: profile.php");		
			}
			else
			{
				$erreur="Mauvais Pseudo ou mauvais mot de passe! ";
			}
		}else{
			$erreur="Tous les champs doivent être complétés!";
		}
	}
// ************************end select user*******************************	

// ***************************edition de l'utilisateur**************************
	if (isset($_SESSION['id'])) {
		$requser=$pdo->prepare("SELECT * FROM user WHERE id=?");
		$requser->execute(array($_SESSION['id']));
		$userinfo=$requser->fetch();
	
		if (isset($_POST['envoie5'])) {
			$username=htmlspecialchars($_POST['username']);
			$password=md5($_POST['password']);
			
			$ps=$pdo->prepare("UPDATE user SET username=?, password=? WHERE id=?");
			//Pour bien recupere les données on crée un table de parametre
			$params=array($username,$password,$_SESSION['id']);
			//Execution de la requête par leur paramètre en ordre 
			$ps->execute($params);
			$success['cool']="Opération reussie";		
		}
	}
// ***************************edition de l'utilisateur**************************
	if (isset($_GET['dk'])) {
		$requser=$pdo->prepare("SELECT * FROM user WHERE id=?");
		$requser->execute(array($_GET['dk']));
		$userinfo=$requser->fetch();
	
		if (isset($_POST['envoie7'])) {
			$username=htmlspecialchars($_POST['username']);
			$role=htmlspecialchars($_POST['role']);
			if (!isset($_POST['password'])) {
				$ps=$pdo->prepare("UPDATE user SET username=?,role=? WHERE id=?");
				//Pour bien recupere les données on crée un table de parametre
				$params=array($username,$role,$_GET['dk']);
				//Execution de la requête par leur paramètre en ordre 
				$ps->execute($params);
				$success['cool']="Opération reussie";
			}else{
				$password=md5($_POST['password']);
				$ps=$pdo->prepare("UPDATE user SET username=?,password=?,role=? WHERE id=?");
				//Pour bien recupere les données on crée un table de parametre
				$params=array($username,$password,$role,$_GET['dk']);
				//Execution de la requête par leur paramètre en ordre 
				$ps->execute($params);
				$success['cool']="Opération reussie";	
			}
				
		}
	}
