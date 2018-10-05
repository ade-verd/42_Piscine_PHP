<?php
	session_start();
	include ("auth.php");

	function is_valid()
	{
		$log = (isset($_GET['login']) && $_GET['login'] != "");
		$pass = (isset($_GET['passwd']) && $_GET['passwd'] != "");
		if ($log && $pass)
			return TRUE;
		return FALSE;
	}

	if (is_valid() && auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_GET['login'];
		echo "OK\n";
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>