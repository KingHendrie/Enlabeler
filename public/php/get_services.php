<?php
	require_once 'db_connection.php';

	$query = "SELECT * FROM services";
	$result = mysqli_query($conn, $query);

	$services = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$services[] = $row;
	}

	header('Content-Type: application/json');
	echo json_encode($services);

	mysqli_close($conn);
?>