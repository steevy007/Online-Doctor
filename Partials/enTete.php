<?php

use App\Model\Friend;
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="https://online-doctorapp.000webhostapp.com/Pages/Accueil">Online Doctor</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span><i class="fas fa-bars"></i></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a id="home" href="https://online-doctorapp.000webhostapp.com/Pages/Accueil" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="https://online-doctorapp.000webhostapp.com/Pages/Propos" class="nav-link">About</a></li>
				<li class="nav-item"><a href="https://online-doctorapp.000webhostapp.com/Pages/Utilisateurs" class="nav-link">Find Doctor</a></li>
				<li class="nav-item"><a href="https://online-doctorapp.000webhostapp.com/Pages/Contact" class="nav-link">Contact</a></li>
				<?php
				if (!isset($_SESSION['session']) and empty($_SESSION['session'])) {
				?>
					<li class="nav-item cta mr-md-2"><a href="https://online-doctorapp.000webhostapp.com/Pages/Inscription" class="nav-link">Sign Up</a></li>
					<li class="nav-item cta cta-colored"><a href="https://online-doctorapp.000webhostapp.com/Pages/Connexion" class="nav-link">Sign In</a></li>
			</ul>
		<?php
				} else {
		?>
		
			<div class="dropdown">
				<a type="button" class="btn text-secondary" data-toggle="dropdown">
					<i class=" fas fa-user-circle fa-2x"></i>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="https://online-doctorapp.000webhostapp.com/Pages/Profil/<?=$_SESSION['session']['id']?>"><i class="far fa-user"></i> Profile</a>
					<a class="dropdown-item" href="https://online-doctorapp.000webhostapp.com/Pages/Modification"><i class="fas fa-user-edit"></i> Edit User</a>
					<?php
					if ($_SESSION['session']['typeUser']=='Medecin') {
					?>
						<a class="dropdown-item" href="#"><i class="fas fa-chalkboard-teacher"></i></i> Dashbord</a>
					<?php } ?>
					<a class="dropdown-item" href="https://online-doctorapp.000webhostapp.com/App/Controller/Deconnexion"><i class="fas fa-sign-out-alt"></i> Logout</a>
				</div>
			</div>
			<div class="dropdown">
				<a type="button" class="btn text-secondary" data-toggle="dropdown">
				<i class="fas fa-bell fa-2x"></i>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="https://online-doctorapp.000webhostapp.com/Pages/FRequest/<?=$_SESSION['session']['id']?>"><i class="far fa-user"></i>&nbsp; Request <span><?= Friend::getRequest($_SESSION['session']['id']) ?></span></a>
				</div>
			</div>
		<?php
				} ?>
		</div>

	</div>
</nav>