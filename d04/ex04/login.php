<?php
	session_start();
	include ("auth.php");

	function is_valid()
	{
		$log = (isset($_POST['login']) && $_POST['login'] != "");
		$pass = (isset($_POST['passwd']) && $_POST['passwd'] != "");
		if ($log && $pass)
			return TRUE;
		return FALSE;
	}

	if (is_valid() && auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['logged_on_user'] = $_POST['login'];
?>
<html><body>
		<div id=user>Logged as: <b><?php echo $_SESSION['logged']; ?></b></div>
		<iframe src="https://www.w3schools.com"></iframe>
		<iframe src="https://www.w3schools.com"></iframe>
</body></html>
<?php
	}
	else
	{
		$_SESSION['logged_on_user'] = "";
		echo "ERROR\n";
	}
?>
