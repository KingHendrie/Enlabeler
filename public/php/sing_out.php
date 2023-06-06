<?php
session_start();

$_SESSION['logged_in'] = false;

header('Location: ../html/index.html');
exit();
?>