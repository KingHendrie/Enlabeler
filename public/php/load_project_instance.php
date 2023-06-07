<?php
	session_start();
	require_once 'db_connection.php';

   $query = "SELECT p.pro_id, p.project_name, p.budget, p.budget_remaining, p.pro_cost, p.billing_cur s.service FROM projects AS p JOIN service AS s ON p.serv_id = s.serv_id";
   $result = mysqli_query($conn, $query);

   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }

   echo json_encode($rows);

	mysqli_close($conn);
?>