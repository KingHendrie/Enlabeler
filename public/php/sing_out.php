<?php
session_start();
session_unset();
session_destroy();

$_SESSION['logged_in'] = false;
$_SESSION['member_id'] = '';
$_SESSION['user_group'] = '';

header('Location: ../html/index.html');
exit();
?>