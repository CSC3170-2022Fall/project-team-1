<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<title>consumer login website</title>
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
						<h2>Consumer sign in</h2>
					</div>
					<div class="row">
						<div class="col-12 col-md-6 offset-md-1 info">
						
						<form action="consumer-login.php" method="post">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Consumer name</label>
							<input type="text" class="form-control" name="consumer_name" required="required">
							
						</div>
						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" required="required">
						</div>
						<button type="submit" class="btn btn-primary" value="Login">Login</button>  <a href="consumer-register.php">Sign Up</a>

						</form>
						</div>
					</div>
				</div>
			</section>
		</main>
		<footer class="page-footer">
			<div class="container">
			<div class="links"><a href="consumer-register.php">Sign Up</a><a href="index.php">Home</a><a href="#">Login</a></div>
			</div>
		</footer>
		<script src="assets/bootstrap/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
		<script src="assets/js/theme.js"></script>
	</body>
</html>




<!-- backend: check login -->
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$mysqli = new mysqli("localhost", 'root', '', "chip_website");

		session_start();
		$consumer_name = $mysqli->real_escape_string($_POST['consumer_name']);
		$password = $mysqli->real_escape_string($_POST['password']);

		$query = $mysqli->query("SELECT * from Consumers WHERE consumer_name='$consumer_name'"); //Query the users table if there are matching rows equal to $consumer_name
		$exists = mysqli_num_rows($query); //Checks if consumer_name exists
		$table_users = "";
		$table_password = "";
		if ($exists > 0) { //IF there are no returning rows or no existing consumer_name
			while ($row = mysqli_fetch_assoc($query)) { //display all rows from query
				$table_users = $row['consumer_name']; // the first consumer_name row is passed on to $table_users, and so on until the query is finished
				$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
			}
			if (($consumer_name == $table_users) && ($password == $table_password)) { // checks if there are any matching fields
				if ($password == $table_password) {
					$_SESSION['consumer'] = $consumer_name; //set the consumer_name in a session. This serves as a global variable
					header("location: consumer-appoint.php"); // redirects the user to the authenticated home page
				}
			} else {
				print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
				print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
			}
		} else {
			print '<script>alert("Incorrect consumer_name!");</script>'; //Prompts the user
			print '<script>window.location.assign("consumer-login.php");</script>'; // redirects to login.php
		}
	}
?>