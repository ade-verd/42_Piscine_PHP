<?php
	session_start();

	if ($_GET['submit'] == "OK" && $_GET['name'] && $_GET['passwd'])
	{
		$_SESSION['name'] = $_GET['name'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}

	echo "<html><body>\n";
	echo "<form method='get' action='index.php'>\n";
	echo "Identifiant: <input type='text' name='login' value='".$_SESSION['name']."'/>\n";
	echo "<br />\n";
	echo "Mot de passe: <input type='text' name='passwd' value='".$_SESSION['passwd']."'/>\n";
	echo "<input type='submit' name='submit' value='OK'/>\n";
	echo "</form>\n";
	echo "</body></html>\n";
?>
