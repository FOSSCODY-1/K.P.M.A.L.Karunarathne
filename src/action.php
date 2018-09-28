<!--
Authenticate users or register new users
Gets data from login.php and register.php
-->

<?php
	include 'connect.php';
	session_start();

	if (isset($_GET) && $_GET['check'] == 'login') {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		$query = "SELECT username FROM user WHERE username='$username' and password='$password'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		// If only 1 row in the result then username and password match
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['username'] = $username;
			header("location: index.php");
		}
		else {
			//Todo: Warn user that the username and password don't match
			header("Location: login.php");
		}
	} else if (isset($_GET) && $_GET['check'] == 'register') {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		// Add to database
		$query = "INSERT INTO user VALUES ('$username', '$password')";
		echo $query;
		mysqli_query($connection, $query);

		//Create a folder to store notes
		mkdir("files/$username");
		
		header("location: login.php");
	}
?>
