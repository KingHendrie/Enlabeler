<?php
	session_start();
	require_once 'db_connection.php';

   $query = "SELECT p.pro_id, p.project_name, p.budget, p.billing_cur, p.pro_cost, p.budget_remaining, s.service FROM projects AS p JOIN services AS s ON p.serv_id = s.serv_id WHERE p.member_id = ?";
   $stmt = mysqli_prepare($conn, $query);

   if ($stmt) {
      mysqli_stmt_bind_param($stmt, "s", $_SESSION['member_id']);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $rows = [];
      while ($row = mysqli_fetch_assoc($result)) {
         $rows[] = $row;
      }

      echo json_encode($rows);

      mysqli_stmt_close($stmt);
   };

	mysqli_close($conn);
?>