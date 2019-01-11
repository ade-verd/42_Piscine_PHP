<?php
	session_start();
	date_default_timezone_set('Europe/Paris');

	$path = "../private";
	$fchat = "../private/chat";

	if (($_SESSION['logged_on_user']) !== "" && isset($_SESSION['logged_on_user']) !== FALSE)
	{
		if (file_exists($path) && file_exists($fchat))
		{
			if (($handle = fopen($fchat, 'r')))
			{
				flock($handle, LOCK_SH);
				$content = unserialize(file_get_contents($fchat));
				flock($handle, LOCK_UN);
				fclose($handle);

				foreach ($content as $msg)
					echo date("H:i", $msg['time'])." <b>".$msg['login']."</b>: ".$msg['msg']."<br />";
			}
		}
	}
	else
	{
		echo "ERROR\n";
		exit (1);
	}
?>
