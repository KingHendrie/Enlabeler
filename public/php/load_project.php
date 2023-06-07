<?php
	require_once 'db_connection.php';

   $query = "SELECT pro_id, member_id, serv_id, budget, budget_remaining, billing_cur, pro_cost FROM projects";
   $result = mysqli_query($conn, $query);

   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }

   echo json_encode($rows);

	mysqli_close($conn);
?>