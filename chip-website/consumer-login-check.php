<?php
	$mysqli = new mysqli("localhost", 'root', '', "chip_website");

	session_start();
	$consumer_name = $mysqli->real_escape_string($_POST['consumer_name']);
	$password = $mysqli->real_escape_string($_POST['password']);

	$query = $mysqli->query("SELECT * from Consumers WHERE consumer_name='$consumer_name'"); //Query the users table if there are matching rows equal to $consumer_name
	$exists = mysqli_num_rows($query); //Checks if consumer_name exists
	$table_users = "";
	$table_password = "";
	if($exists > 0) //IF there are no returning rows or no existing consumer_name
	{
		while($row = mysqli_fetch_assoc($query)) //display all rows from query
		{
			$table_users = $row['consumer_name']; // the first consumer_name row is passed on to $table_users, and so on until the query is finished
			$table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
		}
		if(($consumer_name == $table_users) && ($password == $table_password)) // checks if there are any matching fields
		{
			if($password == $table_password)
			{
				$_SESSION['consumer'] = $consumer_name; //set the consumer_name in a session. This serves as a global variable
				header("location: consumer-home.php"); // redirects the user to the authenticated home page
			}
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
			Print '<script>window.location.assign("consumer-login.php");</script>'; // redirects to login.php
		}

	}
	else
	{
		Print '<script>alert("Incorrect consumer_name!");</script>'; //Prompts the user
		Print '<script>window.location.assign("consumer-login.php");</script>'; // redirects to login.php
	}
?>