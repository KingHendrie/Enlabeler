<?php
	require_once 'db_connection.php';

   $query = "SELECT member_id, name, last_name, email FROM members WHERE user_group = 1";
   $result = mysqli_query($conn, $query);

   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }

   echo json_encode($rows);

	mysqli_close($conn);
?>