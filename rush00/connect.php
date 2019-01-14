<?php

	$servername = "localhost:3306";
	$username = "root";
	$password = "123456";
	$db = "db_minishop";
	$handle = mysqli_connect($servername, $username, $password, $db);
	if (!$handle) {
		die("<br>Connection failed.<br>DB not created");
	}

?>
