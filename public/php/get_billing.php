<?php
	require_once 'db_connection.php';

	$query = "SELECT * FROM exchange_rate";
	$result = mysqli_query($conn, $query);

	$currencies = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$currencies[] = $row;
	}

	header('Content-Type: application/json');
	echo json_encode($currencies);

	mysqli_close($conn);
?>