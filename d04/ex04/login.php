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

	if (isset($_SESSION['logged_on_user']) || (is_valid() && auth($_POST['login'], $_POST['passwd'])))
	{
		$_SESSION['logged_on_user'] ?: $_SESSION['logged_on_user'] = $_POST['login'];
?>

<html>
	<body>
		<div id="user">Logged as: <b><?php echo $_SESSION['logged_on_user']; ?></b><br /></div>
		<div id=logout><a href="./logout.php">Log out</a><br /><br /></div>
		<div><iframe name="chat" src="chat.php" width="100%" height="550px" scrolling="auto"></iframe></div>
		<div><iframe name="speak" src="speak.php" width="100%" height="50px" scrolling="no"></iframe></div>
	</body>
</html>

<?php
	}
	else
	{
		$_SESSION['logged_on_user'] = "";
		echo "ERROR\n";
		exit (1);
	}
?>
