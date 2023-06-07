<?php
	session_start();

	if (isset($_SESSION['user_group']) && $_SESSION['user_group'] == 'admin') {
		echo "<li><a href='../html/admin_dashboard.html'>Admin</a></li>";
	}
	else {
		echo "";
	}
?>