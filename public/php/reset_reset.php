<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);
	$confirm_password = trim($_POST["confirm_password"]);
	$mem_id = trim($_POST["mem_id"]);
	$current_url = trim($_POST["current_url"]);

	$errors = array();
	if (empty($email) || empty($password) || empty($confirm_password)) {
		$errors[] = "Please fill in all fields.";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Please enter a valid email.";
	}
	if (strlen($password) > 16 || strlen($password) < 6) {
		$errors[] = "Please enter your password.";
	}
	if ($confirm_password != $password) {
		$errors[] = "Please confirm your password.";
	}

	$query = "SELECT email FROM members WHERE member_id='$mem_id'";
	$result = mysqli_query($conn, $query);

	$compare = $result->fetch_assoc();
	$compare_email = $compare['email'];

	if ($email != $compare_email) {
		$errors[] = "Email does mot match your account.";
	}

	if (count($errors) == 0) {
		$query = "UPDATE members SET password='$password' WHERE email='$email'";
		$result = mysqli_query($conn, $query);

		if ($result) {

			echo "Password Reset Successfully";
			
			header("Location: ../html/login.html");
			exit();
		}
		else {
			echo "Error: " . mysqli_error($conn);
		}
	}
	else {
		$error_msg = implode("<br>", $errors);
		echo '<script>alert("'.$error_msg.'");window.location.href='.$current_url.';</script>';
	}
}
?>