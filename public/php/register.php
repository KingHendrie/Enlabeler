<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = trim($_POST["first_name"]);
	$last_name = trim($_POST["last_name"]);
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);
	$confirm_password = trim($_POST["confirm_password"]);

	$errors = array();
	if (empty($first_name)) {
		$errors[] = "Please enter your first name.";
	}
	if (empty($last_name)) {
		$errors[] = "Please enter your last name.";
	}
	if (empty($email)) {
		$errors[] = "Please enter your email address.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Please enter a valid email address.";
	}
	if (empty($password)) {
		$errors[] = "Please enter your password.";
	}
	if (empty($confirm_password) || $confirm_password != $password) {
		$errors[] = "Please confirm your password.";
	}

	$query = "SELECT * FROM members WHERE email='$email'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$errors[] = "An account with this email address already exists.";
	}

	if (count($errors) == 0) {

		$member_id = strtolower(substr($first_name,0,3).''.substr($last_name,0,3)).''.rand(1000,9999);

		$query = "INSERT INTO members (member_id, name, last_name, email, password, user_group)
						VALUES ('$member_id', '$first_name', '$last_name', '$email', '$password', 1)";
		$result = mysqli_query($conn, $query);

		if ($result) {
			header('Location: ../html/dashboard.html');
			exit();
		}
		else {
			echo "Error: " . mysqli_error($conn);
		}
	}
	else {
		$error_msg = implode("<br>", $errors);
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/register.html";</script>';
	}

}

mysqli_close($conn);
?>