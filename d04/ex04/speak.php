<?php
	session_start();
	date_default_timezone_set('Europe/Paris');

	$path = "../private";
	$fchat = "../private/chat";

	if (isset($_POST['msg']) && $_POST['send'] === "Send" && isset($_SESSION['logged_on_user']))
	{
		if (file_exists($path) || mkdir($path, 0700, TRUE))
		{
			$arr["login"] = $_SESSION['logged_on_user'];
			$arr["time"] = time();
			$arr["msg"] = $_POST['msg'];
			$arr = serialize($arr);
			file_put_contents($fchat, $arr, FILE_APPEND | LOCK_EX);
		}
	}
?>

<html>
	<header>
		<style>
			#message { height: 40px; width: 95%; }
			#send { height: 35px; width: 4%;}
		</style>
	</header>
	<body>
		<div id="messageForm">
		<form action="?" method="post">
			<input id="message" name="msg" type="text" value="" />
			<input id="send" name="send" type="submit" value="Send" />
		</form>

	</body>
</html>
