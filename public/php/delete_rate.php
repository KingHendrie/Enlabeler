<?php
	require_once 'db_connection.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $country = $_POST['formName'];

		echo "Received country: " . $country;

		$query = "DELETE FROM exchange_rate WHERE country = '$country'";
		$result = mysqli_query($conn, $query);

      if ($result) {
			echo "Succesfully deleted";
		} else {
			$error_msg = implode("<br>", $errors);
			echo '<script>alert("'.$error_msg.'");window.location.href="../html/view_rate.html";</script>';
		}
   }
	mysqli_close($conn);
?>