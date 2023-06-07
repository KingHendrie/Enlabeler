<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$country = trim($_POST["country"]);
	$currency = trim($_POST["currency"]);
	$rate = trim($_POST["rate"]);
	$unit = trim($_POST["unit"]);

	$errors = array();
	if (empty($country)) {
		$errors[] = "Please enter country name.";
	}
	if (empty($currency)) {
		$errors[] = "Please enter currency.";
	}
	if (empty($rate)) {
		$errors[] = "Please enter the rate.";
	}

	if (count($errors) == 0) {

		$query = "INSERT INTO exchange_rate (country, currency, rate)
						VALUES ('$country', '$currency', '$rate')";
		$result = mysqli_query($conn, $query);

		if ($result) {
	
			header('Location: ../html/exchange_rate.html');
			exit();
		}
		else {
			echo "Error: " . mysqli_error($conn);
		}
	}
	else {
		$error_msg = implode("<br>", $errors);
		echo '<script>alert("'.$error_msg.'");window.location.href="../html/add_rate.html";</script>';
	}
}
?>