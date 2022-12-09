<html>
	<head>
		<title>My first PHP website</title>
	</head>
	<body>
		<h2>Login Page</h2>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="consumer-login-check.php" method="post">
			Enter consumer_name: <input type="text" name="consumer_name" required="required"/> <br/>
			Enter Password: <input type="password" name="password" required="required" /> <br/>
			<input type="submit" value="Login"/>
		</form>
	</body>
</html>