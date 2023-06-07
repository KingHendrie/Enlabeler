<?php
require_once 'db_connection.php';
require_once 'send_email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = trim($_POST["first_name"]);
	$last_name = trim($_POST["last_name"]);
	$email = strtolower(trim($_POST["email"]));

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

	if (count($errors) == 0) {
		$query = "SELECT * FROM members WHERE email = '$email'";
		$result = mysqli_query($conn, $query);
		
		if (mysqli_num_rows($result) == 1) {
			$mem_id = $result->fetch_assoc();
			$mem_id = $mem_id['member_id'];

			$query = "UPDATE members SET user_group = 2 WHERE member_id = '$mem_id'";
			$result = mysql_query($conn, $query);

			$mail->SetFrom($email, 'Enlabeler Info');
			$mail->addAddress($email, $first_name);

			$mail->Subject = 'Admin Invite';
			$mail->Body = 'You have been invite to be an admin on the Enlabeler platform.';

			$mail->send();

			header('Location: ../html/admin.html');
			exit();
		}
		else {
			$member_id = strtolower(substr($first_name,0,3).''.substr($last_name,0,3)).''.rand(1000,9999);

			$query = "INSERT INTO members (member_id, name, last_name, email, user_group)
							VALUES ('$member_id', '$first_name', '$last_name', '$email', 1)";
			$result = mysqli_query($conn, $query);

			if ($result) {

				$mail->SetFrom($email, 'Enlabeler Info');
				$mail->addAddress($email, $first_name);
	
				$mail->Subject = 'Registration Complete';
				$mail->Body = "You have been invite to be an admin on the Enlabeler platform. To accept this invite go to: http://localhost/Enlabeler/public/html/accept_invite.html?id=$member_id";

				$mail->send();
	
				header('Location: ../html/admin.html');
				exit();
			}
			else {
				echo "Error: " . mysqli_error($conn);
			}
		}
	}
	else {
		$error_msg = implode("<br>", $errors);
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/add_admin.html";</script>';
	}
}
?>