<?php
	function get_data_img($path)
	{
		return base64_encode(file_get_contents($path));
	}

	$img = "../img/42.png";
	$valid_user = "zaz";
	$valid_password = "jaimelespetitsponeys";

	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
	$valid = ($user == $valid_user && $pass == $valid_password);

	if (!$valid)
	{
		header('WWW-Authenticate: Basic realm="Espace membres"');
		header('HTTP/1.0 401 Unauthorized');
		echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	}
	else
	{
		echo "<html><body>\n";
		echo "Bonjour Zaz<br />\n";
		echo "<img src='data:image/png;base64,".get_data_img($img)."'>\n";
		echo "</body></html>\n";
	}
?>
