<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$project_name = trim($_POST["project_name"]);
	$budget = trim($_POST["budget"]);
	$service_id = trim($_POST["idserviceid"]);
	$billing_cur = trim($_POST["idbillingDropdown"]);
	$pro_cost = trim($_POST["idcost"]);
	$budget_remaining = trim($_POST["idbudgetRemaining"]);
	$units = trim($_POST["idunits"]);

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

		$query = "INSERT INTO projects (pro_id, project_name, member_id, serv_id, budget, billing_cur, pro_cost, budget_remaining, units)
						VALUES ('$pro_id', '$project_name', '$mem_id', '$service_id', '$budget', '$billing_cur', '$pro_cost', '$budget_remaining', '$units')";
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
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/new_project.html";</script>';
	}

}

mysqli_close($conn);
?>