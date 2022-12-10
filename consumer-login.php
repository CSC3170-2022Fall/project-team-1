<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My first PHP website</title>
		<link href="styles/consumer-login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login">
			<h1>Login Page</h1>
			<!-- <div class="input box"> -->
				<div class="login_input">
					<form action="consumer-login-check.php" method="post">
						<div class="user_n">
							<span>Enter consumer_name:</span> 
							<!-- <div> -->
							<input type="text" name="consumer_name" required="required"/> <br/>
							<!-- </div> -->
						</div>
						<div class="pass">
							<span>Enter Password:</span> 
							<!-- <div> -->
							<input type="password" name="password" required="required" /> <br/>
							<!-- </div> -->
						</div>
						<div sub_b>
							<input type="submit" value="Login"/>
						</div>
						
					</form>
				</div>
				<div class="jump"><a href="index.php">Click here to go back</a><br/><br/></div>
				
			<!-- </div> -->
			

		</div>
		
	</body>
</html>