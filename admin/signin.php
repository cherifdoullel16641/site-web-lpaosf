<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lpaosf;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST["email"])){
$requete = $bdd->prepare("insert into users(login,mdp,nom,prenom,fonction) values(?,?,?,?,?)");
$requete->execute([$_POST["email"],$_POST["mdp"],$_POST["nom"],$_POST["prenom"],$_POST["fonction"]]);
echo"<script>alert('inscription réuissi')</script>";
}
else{
    echo"<script>alert('vous n'avez pas rempli tous les champs ')</script>";

}


?>

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
                        Créer un compte
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="saisir votre nom">
						<input class="input100" type="text" name="nom" placeholder="NOM">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="saisir votre prenom">
						<input class="input100" type="text" name="prenom" placeholder="Prenom">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="saisir votre email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
                    <center>
                    <select name="fonction" id="" style="width:100%">
                        <option value="chercheur">Enseignant-Chercheur</option>
                        <option value="comptable">Stagiaire</option>
                        <option value="secretaire">Master</option>
				<option value="secretaire">Doctorant</option>
                    </select>
                    </center>

                    <br>
					<div class="wrap-input100 validate-input" data-validate = "saisir votre mot de passe">
						<input class="input100" type="password" name="mdp" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div> <br>
                    <div class="wrap-input100 validate-input" data-validate = "Confirmer votre mot de passe">
						<input class="input100" type="password" name="pass" placeholder="Confirmer mot de passe">
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
							S'inscrire
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Vous n'avez déjà un compte
						</span>

						<a href="signup.php" class="txt3">
							Se connecter
						</a>
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