<?php
	session_start();

	if (!isset($_SESSION['user_group']) || $_SESSION['user_group'] !== 'admin') {
		$response = array('redirect' => true, 'redirect_url' => '../html/dashboard.html');
  		echo json_encode($response);
  		exit();
	};
?>