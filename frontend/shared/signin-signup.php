<?php
session_start();

if ($requiring_file_name == "c-signin.php") {
	$signup_file_name = "c-signup.php";
	$title = "Consumer Signin";
} elseif ($requiring_file_name == "p-signin.php") {
	$signup_file_name = "p-signup.php";
	$title = "Plant Signin";
} elseif ($requiring_file_name == "c-signup.php") {
	$title = "Consumer Signup";
} else {
	$title = "Plant Signup";
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title> <?php echo "$title"; ?> </title>
	<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap">
	<link rel="stylesheet" href="assets/fonts/ionicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
	<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
		<div class="container"><a class="navbar-brand logo" href="index.php">ChipLand</a><button
				data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span
					class="visually-hidden">Toggle
					navigation</span><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="c-signin.php">Consumer</a></li>
					<li class="nav-item"><a class="nav-link" href="p-signin.php">Plant Owner</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<main class="page project-page">
		<section class="portfolio-block project">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-6 offset-md-1 info">
						<div class="heading">
							<?php echo "<h2>$title</p>"; ?>
						</div>
						<form action=<?php echo "$requiring_file_name" ?> method="post"
							style="position:relative; left:210px; top:2px;;">
							<div class="mb-3">
								<label for="exampleInputEmail1" class="form-label">Username</label>
								<input type="text" class="form-control" name="username" required="required">
							</div>
							<div class="mb-3">
								<label for="exampleInputPassword1" class="form-label">Password</label>
								<input type="password" class="form-control" name="password" required="required">
							</div>
							<button type="submit" class="btn btn-primary">Confirm</button>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer class="page-footer">
		<div class="container">
			<?php if ($signup_file_name) {
	            echo "<div class=\"links\"><a href=\"$signup_file_name\">Signup</a></div>";
            }
            ?>
		</div>
	</footer>
	<script src="assets/bootstrap/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
	<script src="assets/js/theme.js"></script>
</body>

</html>
