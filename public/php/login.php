<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = strtolower(trim($_POST["email"]));
	$password = trim($_POST["password"]);

	if (empty($email) || empty($password)) {
		echo '<script>alert("Please enter your email and password.");window.loaction.href="../html/login.html";</script>';
	}
	else {
		$query = "SELECT * FROM members WHERE email='$email' and password='$password'";
		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1) {
			$mem_id = $result->fetch_assoc();
			$mem_id = $mem_id['member_id'];
			$query = "SELECT g.group FROM user_group AS g JOIN members AS m ON g.number = m.user_group WHERE m.member_id = '$mem_id'";
			$result = mysqli_query($conn, $query);

			$user_group = $result->fetch_assoc();
			$user_group = $user_group['group'];

			$_SESSION['logged_in'] = true;
			$_SESSION['member_id'] = $mem_id;
			$_SESSION['user_group'] = $user_group;

			header('Location: ../html/dashboard.html');
			exit();
		}
		else {
			echo '<script>alert("Invalid email or password.");window.location.href="../html/login.html"</script>';
		}
	}
}

mysqli_close($conn);
?>