<?php
	$server = "";
	$user = "";
	$pass = "";
	$database = "";

	date_default_timezone_set("");

	$link = new mysqli($server, $user, $pass, $database);
	mysqli_set_charset($link, "utf8");
?>