<?php
	require_once 'db_connection.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $number = $_POST['formName'];

		echo "Received number: " . $number;

		$query = "DELETE FROM user_group WHERE number = '$number'";
		$result = mysqli_query($conn, $query);

      if ($result) {
			echo "Succesfully deleted";
		} else {
			$error_msg = implode("<br>", $errors);
			echo '<script>alert("'.$error_msg.'");window.location.href="../html/view_group.html";</script>';
		}
   }
	mysqli_close($conn);
?>