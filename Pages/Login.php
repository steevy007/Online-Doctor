<?php
session_start();
require_once '../App/init.php';
use App\Model\AuthFilter;
AuthFilter::alreadyConnect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Online Doctor | About</title>
	<link rel="stylesheet" href="../Public/CSS/styleLogin.css">
	<?php require_once '../Ressources/head.css.php' ?>
</head>

<body style="background-image:url('../Public/IMAGES/img2.jpg');background-size:cover;background-repeat:no-repeat">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../Public/IMAGES/boy-2027768_640.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form id="form" action="../App/Controller/Login.ctrl.php" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="email" id="email" name="email" class="form-control input_user" placeholder="votre mail" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id="password" name="password" class="form-control input_pass" placeholder="password" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<a href="https://online-doctorapp.000webhostapp.com/Pages/Accueil" style="color:whitesmoke"><i class="fas fa-home"></i> &nbsp; Retourner à la page d'Accueil</a>
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<input type="submit" name="submit" class="btn login_btn" value="Login">
						</div>
					</form>
				</div>

				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="https://online-doctorapp.000webhostapp.com/Pages/Inscription" class="ml-2" style="color:whitesmoke">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="#" style="color:whitesmoke">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once '../Ressources/footer.js.php' ?>
	<?php
	if (isset($_GET['register']) and $_GET['register'] === 'true') {
	?>
		<script src="../Public/JS/verifyTrue.js"></script>

	<?php
	}
	?>
	<script src="../Public/JS/TraitLogin.js"></script>
</body>

</html>