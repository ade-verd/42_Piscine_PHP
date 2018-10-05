<?php
	session_start();
	include ("auth.php");

	function is_valid()
	{
		$submit = (isset($_POST['submit']) && $_POST['submit'] == "OK");
		$log = (isset($_POST['login']) && $_POST['login'] != "");
		$pass = (isset($_POST['passwd']) && $_POST['passwd'] != "");
		if ($submit && $log && $pass)
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

<html><body>
<form method="get" action="index.php">
	Identifiant: <input type="text" name="login">
	<br />
	Mot de passe: <input type="text" name="passwd">
	<input type="submit" name="submit" value="OK">
</form>
</body></html>
