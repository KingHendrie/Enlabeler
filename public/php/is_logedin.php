<?php
	session_start();

	if (isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == true) {
		$response = array('redirect' => true, 'redirect_url' => '../html/dashboard.html');
  		echo json_encode($response);
  		exit();
	};
?>