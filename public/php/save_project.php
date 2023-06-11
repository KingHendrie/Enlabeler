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
	$pro_id = trim($_POST["idprojectid"]);

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
		$mem_id = $_SESSION['member_id'];

		$query = "UPDATE projects 
					 SET project_name = '$project_name', 
					 	  member_id = '$mem_id', 
						  serv_id = '$service_id', 
						  budget = '$budget', 
						  billing_cur = '$billing_cur', 
						  pro_cost = '$pro_cost', 
						  budget_remaining = '$budget_remaining', 
						  units = '$units' 
					 WHERE pro_id = '$pro_id'";
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
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/edit_project.html?projectid='.$pro_id.'";</script>';
	}

}

mysqli_close($conn);
?>