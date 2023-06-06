<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUETS_METHOD"] == "POST") {
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);

	if (empty($email) || empty($password)) {
		echo '<script>alert("Please enter your email and password.");window.loaction.href="../html/login.html";</script>';
	}
	else {
		$query = "SELECT * FROM member WHERE email='$email' and password='$password'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1) {
			header('Location: ../html/register.html');
			exit();
		}
		else {
			echo '<script>alert("Invalid member ID or password.");</script>';
			echo '<p>Invalid email or password. <a href="../html/password_reset.html">Reset your password</a> or <a href="../html/login.html">try again</a>.</p>';
		}
	}
}

mysqli_close($conn);
?>