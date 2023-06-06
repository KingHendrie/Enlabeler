<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);

	if (empty($email) || empty($password)) {
		echo '<script>alert("Please enter your email and password.");window.loaction.href="../html/login.html";</script>';
	}
	else {
		$query = "SELECT * FROM members WHERE email='$email' and password='$password'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1) {
			$_SESSION['logged_in'] = true;
			header('Location: ../html/dashboard.html');
			exit();
		}
		else {
			echo '<script>alert("Invalid email or password.");</script>';
		}
	}
}

mysqli_close($conn);
?>