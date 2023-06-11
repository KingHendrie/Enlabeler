<?php
	require_once 'db_connection.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pro_id = $_POST["pro_id"];

		echo "Received pro_id: " . $pro_id;

		$query = "DELETE FROM projects WHERE pro_id = '$pro_id'";
		$result = mysqli_query($conn, $query);

		if ($result) {
			echo "Row deleted successfully.";
		} else {
			$error_msg = implode("<br>", $errors);
			echo '<script>alert("'.$error_msg.'");window.location.href="../html/dashboard.html";</script>';
		}
	}
	mysqli_close($conn);
?>