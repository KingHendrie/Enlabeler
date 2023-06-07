<?php
session_start();
require_once 'db_connection.php';
require_once 'send_email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = trim($_POST["email"]);

	if (empty($email)) {
		echo "Please enter an email address";
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Please enter a valid email address.";
	}

	$query = "SELECT * FROM members WHERE email='$email'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {

		$query = "SELECT member_id FROM members WHERE email='$email'";
		$mem_id = mysqli_query($conn, $query);
		$row = $mem_id->fetch_assoc();

		$mem_id = $row['member_id'];

		$mail->SetFrom($email, 'Enlabeler Info');
		$mail->addAddress($email, $email);

		$mail->Subject = 'Reset Password';
		$mail->Body = "To reset your password, follow this link: http://localhost/Enlabeler/public/html/reset_reset.html?id=$mem_id";

		$mail->send();

		header('Location: ../html/reset_middle_man.html');
		exit();
	}
	else {
		echo "Account could not be found";
	}
}

mysqli_close($conn);
?>