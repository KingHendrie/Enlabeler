<?php
	require_once 'db_connection.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $member_id = $_POST['formName'];

		echo "Received member_id: " . $member_id;

		$query = "DELETE FROM members WHERE member_id = '$member_id'";
		$result = mysqli_query($conn, $query);

      if ($result) {
			echo "Succesfully deleted";
		} else {
			$error_msg = implode("<br>", $errors);
			echo '<script>alert("'.$error_msg.'");window.location.href="../html/view_users.html";</script>';
		}
   }
	mysqli_close($conn);
?>