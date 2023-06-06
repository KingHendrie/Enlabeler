<?php
$servername = "sql212.epizy.com";
$username = "epiz_34349693";
$password = "vQw68G9Ul8lBst";
$dbname = "epiz_34349693_enlabeler";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "enlabeler";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
}
?>