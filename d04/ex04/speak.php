<?php
	session_start();
	date_default_timezone_set('Europe/Paris');

	$path = "../private";
	$fchat = "../private/chat";

	function get_existing_data($file)
	{
		$data = array();
		if (($handle = fopen($file, 'r')))
		{
			flock($handle, LOCK_SH);
			$data = unserialize(file_get_contents($file));
			flock($handle, LOCK_UN);
			fclose($handle);
		}
		return ($data);
	}

	if (($_SESSION['logged_on_user']) === "" || isset($_SESSION['logged_on_user']) === FALSE)
	{
		echo "ERROR\n";
		exit (1);
	}

	if (isset($_POST['msg']) && $_POST['submit'] === "OK" && isset($_SESSION['logged_on_user']))
	{
		if (file_exists($path) || mkdir($path, 0700, TRUE))
		{
			if (file_exists($fchat))
				$data = get_existing_data($fchat);
			$cur["login"] = $_SESSION['logged_on_user'];
			$cur["time"] = time();
			$cur["msg"] = $_POST['msg'];
			$data[] = $cur;
			file_put_contents($fchat, serialize($data), LOCK_EX);
		}
	}
?>

<html>
	<header>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
		<style>
			#message { height: 40px; width: 95%; }
			#send { height: 35px; width: 4%;}
		</style>
	</header>
	<body>
		<div id="messageForm">
		<form action="?" method="post">
			<input id="message" name="msg" type="text" value="" />
			<input id="send" name="submit" type="submit" value="OK" />
		</form>

	</body>
</html>
