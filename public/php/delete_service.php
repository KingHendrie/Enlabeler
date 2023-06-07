<?php
	require_once 'db_connection.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $service_id = $_POST['formName'];

		echo "Received service_id: " . $service_id;

		$query = "DELETE FROM services WHERE serv_id = '$service_id'";
		$result = mysqli_query($conn, $query);

      if ($result) {
			echo "Succesfully deleted";
		} else {
			$error_msg = implode("<br>", $errors);
			echo '<script>alert("'.$error_msg.'");window.location.href="../html/view_admins.html";</script>';
		}
   }
	mysqli_close($conn);
?>