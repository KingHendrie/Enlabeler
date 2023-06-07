<?php
require_once 'db_connection.php';
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = trim($_POST["first_name"]);
	$last_name = trim($_POST["last_name"]);
	$email = strtolower(trim($_POST["email"]));
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
	if (empty($password) || strlen($password) > 16 || strlen($password) < 6) {
		$errors[] = "Please enter your password.";
	}
	if (empty($confirm_password) || $confirm_password != $password) {
		$errors[] = "Password does not match.";
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

			$mail = new PHPMailer(true);

			$mail->isSMTP();
			$mail->SMTPAuth = true;

			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;

			$mail->Username = 'info.enlabeler@gmail.com';
			$mail->Password = 'tbomhbilcirufezx';

			$mail->SetFrom($email, 'Enlabeler Info');
			$mail->addAddress($email, $first_name);

			$mail->Subject = 'Registration Complete';
			$mail->Body = "Thank you for registering with Enlabeler, $first_name.";

			$mail->send();

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