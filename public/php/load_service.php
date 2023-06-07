<?php
	require_once 'db_connection.php';

   $query = "SELECT serv_id, service, description, price_p_unit, unit FROM services";
   $result = mysqli_query($conn, $query);

   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
   }

   echo json_encode($rows);

	mysqli_close($conn);
?>