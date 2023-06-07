<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$service = trim($_POST["service"]);
	$description = trim($_POST["description"]);
	$price_p_unit = trim($_POST["price_p_unit"]);
	$unit = trim($_POST["unit"]);

	$errors = array();
	if (empty($service)) {
		$errors[] = "Please enter your service name.";
	}
	if (empty($description)) {
		$errors[] = "Please enter your description.";
	}
	if (empty($price_p_unit)) {
		$errors[] = "Please enter the price per unit.";
	}
	if (empty($unit)) {
		$errors[] = "Please enter unit measurement.";
	}

	if (count($errors) == 0) {
		$service_id = strtolower(substr($service,0,3)).''.rand(1000000,9999999);

		$query = "INSERT INTO services (serv_id, service, description, price_p_unit, unit)
						VALUES ('$service_id', '$service', '$description', $price_p_unit, $unit)";
		$result = mysqli_query($conn, $query);

		if ($result) {
	
			header('Location: ../html/service.html');
			exit();
		}
		else {
			echo "Error: " . mysqli_error($conn);
		}
	}
	else {
		$error_msg = implode("<br>", $errors);
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/add_service.html";</script>';
	}
}
?>