<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>plant_registration</title>
		<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap">
		<link rel="stylesheet" href="assets/fonts/ionicons.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
	</head>
	<body>
		<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
			<div class="container"><a class="navbar-brand logo" href="#">Chip Land</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="projects-grid-cards.html">Projects</a></li>
						<li class="nav-item"><a class="nav-link" href="consumer-login.php">I'm a consumer</a></li>
						<li class="nav-item"><a class="nav-link" href="plant-login.php">I'm a plant owner</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<main class="page project-page">
			<section class="portfolio-block project">
				<div class="container">
					<div class="heading">
						<h2>Plant sign up</h2>
					</div>
					<div class="row">
						<div class="col-12 col-md-6 offset-md-1 info">
						
						<form action="plant-register.php" method="post">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Plant name</label>
							<input type="text" class="form-control" name="plant_name" required="required">
							
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" required="required">
						</div>
						<button type="submit" class="btn btn-primary" value="Register">Sign up</button>

						</form>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer class="page-footer">
			<div class="container">
				<div class="links"><a href="#">Sign Up</a><a href="index.php">Home</a><a href="plant-login.php">Login</a></div>
			</div>
		</footer>
		<script src="assets/bootstrap/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
		<script src="assets/js/theme.js"></script>
	</body>
</html>




<!-- backend: insert plant info into database -->
<?php
	$mysqli = new mysqli("localhost", 'root', '', "chip_website");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$plant_name = $mysqli->real_escape_string($_POST['plant_name']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$not_existing = true;
		$query = $mysqli->query("SELECT * from Plants");

		while ($row = mysqli_fetch_array($query)) {
			if ($plant_name == $row['plant_name']) {
				$not_existing = false; 
				Print '<script>alert("plant_name has been taken!");</script>';
				Print '<script>window.location.assign("plant-register.php");</script>';
			}
		}
		if ($not_existing) {
			$mysqli->query("INSERT INTO Plants (`plant_name`, `password`) VALUES ('$plant_name','$password')"); 
			Print '<script>alert("Successfully Registered!");</script>';
			Print '<script>window.location.assign("plant-register.php");</script>';
		}
	}
?>
