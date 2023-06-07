<?php
	session_start();

	if (isset($_SESSION['user_group']) && $_SESSION['user_group'] == 'admin') {
		echo "<li><a href='../html/admin.html' target='_blank'>Admin</a></li>";
	}
	else {
		echo "";
	}
?>