<?php

use App\Model\Friend;
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="../Pages/Home.php">Online Doctor</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span><i class="fas fa-bars"></i></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a id="home" href="../Pages/Home.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="../Pages/About.php" class="nav-link">About</a></li>
				<li class="nav-item"><a href="../Pages/ListUser.php" class="nav-link">Find Doctor</a></li>
				<li class="nav-item"><a href="../Pages/Contact.php" class="nav-link">Contact</a></li>
				<?php
				if (!isset($_SESSION['session']) and empty($_SESSION['session'])) {
				?>
					<li class="nav-item cta mr-md-2"><a href="../Pages/Register.php" class="nav-link">Sign Up</a></li>
					<li class="nav-item cta cta-colored"><a href="../Pages/Login.php" class="nav-link">Sign In</a></li>
			</ul>
		<?php
				} else {
		?>
		
			<div class="dropdown">
				<a type="button" class="btn text-secondary" data-toggle="dropdown">
					<i class=" fas fa-user-circle fa-2x"></i>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="../Pages/Profile.php?id=<?=$_SESSION['session']['id']?>"><i class="far fa-user"></i> Profile</a>
					<a class="dropdown-item" href="../Pages/EditProfile.php"><i class="fas fa-user-edit"></i> Edit User</a>
					<?php
					if ($_SESSION['session']['typeUser']=='Medecin') {
					?>
						<a class="dropdown-item" href="#"><i class="fas fa-chalkboard-teacher"></i></i> Dashbord</a>
					<?php } ?>
					<a class="dropdown-item" href="../App/Controller/logout.ctrl.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
				</div>
			</div>
			<div class="dropdown">
				<a type="button" class="btn text-secondary" data-toggle="dropdown">
				<i class="fas fa-bell fa-2x"></i>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="../Pages/RequestFriend.php?id=<?=$_SESSION['session']['id']?>"><i class="far fa-user"></i>&nbsp; Request <span><?= Friend::getRequest($_SESSION['session']['id']) ?></span></a>
					<a class="dropdown-item" href=""><i class="fas fa-user-edit"></i>&nbsp;  Message <span>0</span></a>
				</div>
			</div>
		<?php
				} ?>
		</div>

	</div>
</nav>