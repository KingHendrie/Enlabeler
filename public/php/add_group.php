<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$group = trim($_POST["group"]);

	$errors = array();
	if (empty($group)) {
		$errors[] = "Please enter group name.";
	}

	if (count($errors) == 0) {

		$query = "INSERT INTO user_group (`group`)
						VALUES ('$group')";
		$result = mysqli_query($conn, $query);

		if ($result) {
	
			header('Location: ../html/group.html');
			exit();
		}
		else {
			echo "Error: " . mysqli_error($conn);
		}
	}
	else {
		$error_msg = implode("<br>", $errors);
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/add_group.html";</script>';
	}
}
?>