<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lpaosf;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST["email"])){

$email=$_POST["email"];
$mdp=$_POST["mdp"];
$req = $bdd->prepare('SELECT * FROM users WHERE login = ?');
$req->execute([
    $email
	]);
$resultat = $req->fetch();


if($mdp==$resultat['mdp'])
{
    
        session_start();
		$_SESSION['id'] = $resultat['id'];
        $_SESSION['login'] = $resultat['login'];
        $_SESSION['nom'] = $resultat['nom'];
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['fonction'] = $resultat['fonction'];
		if($resultat["fonction"]=='admin'){
			header("location:./dashboard/dashboard.php");

		}else{
        header("location:board.php");
		}
}
else {
    session_start();
    $_SESSION["error"]="mauvais identifiant ou mot de passe !";
 formulaire($_SESSION["error"]);
   
}
}else{
	formulaire("");
}

?>
<?php

function formulaire($val){?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Membres</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="">
					<span class="login100-form-title">
						MON PORTAIL
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="email" placeholder="email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="mdp" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Mot de passe
						</span>

						<a href="#" class="txt2">
							oublié?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div><br>
					<center><h4 class="text-danger" ><?php echo $val ?></h4></center>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Vous n'avez pas de compte?
						</span>

						<p>
							veuillez contactez l'administrateur
						</p>

					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php } ?>