<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$project_name = trim($_POST["project_name"]);
	$budget = trim($_POST["budget"]);
	$service_id = trim($_POST["serviceDropdown"]);
	$billing_cur = trim($_POST["billingDropdown"]);
	$units = trim($_POST["units"]);

	$errors = array();
	if (empty($project_name)) {
		$errors[] = "Please enter project name.";
	}
	if (empty($budget)) {
		$errors[] = "Please enter budget.";
	}
	if (empty($service_id)) {
		$errors[] = "Please select service.";
	}
	if (empty($billing_cur)) {
		$errors[] = "Please select currency.";
	}
	if (empty($units)) {
		$errors[] = "Password enter units.";
	}

	if (count($errors) == 0) {

		$pro_id = substr($service_id,0,3).''.rand(1000000,9999999);
		$mem_id = $_SESSION['member_id'];

		$query = "INSERT INTO projects (pro_id, project_name, member_id, budget, serv_id, billing_cur, units)
						VALUES ('$pro_id', '$project_name', '$mem_id', '$budget', '$service_id', '$billing_cur', '$units')";
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
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/dashboard.html";</script>';
	}

}

mysqli_close($conn);
?>