<?php
	require_once 'db_connection.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $pro_id = $_POST['formName'];

		echo "Received pro_id: " . $pro_id;

		$query = "DELETE FROM projects WHERE pro_id = '$pro_id'";
		$result = mysqli_query($conn, $query);

      if ($result) {
			echo "Succesfully deleted";
		} else {
			$error_msg = implode("<br>", $errors);
			echo '<script>alert("'.$error_msg.'");window.location.href="../html/view_project.html";</script>';
		}
   }
?>