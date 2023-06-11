<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["projectID"])) {
	$projectID = $_GET["projectID"];
   $response = array();

   $query = "SELECT * FROM projects WHERE pro_id = ?";
   $stmt = mysqli_prepare($conn, $query);
   mysqli_stmt_bind_param($stmt, "s", $projectID);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);

   if ($result && mysqli_num_rows($result) > 0) {
		$project = mysqli_fetch_assoc($result);
      $response['success'] = true;
      $response['project'] = $project;
   } else {
      $response['success'] = false;
      $response['message'] = "Failed to fetch project data";
   }

   mysqli_stmt_close($stmt);
} else {
   $response['success'] = false;
   $response['message'] = "Invalid request";
}

echo json_encode($response);

mysqli_close($conn);
?>