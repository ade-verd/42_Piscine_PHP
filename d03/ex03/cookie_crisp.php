<?php
	function set_cookie()
	{
		if ($_GET['name'] && $_GET['value'])
			setcookie($_GET['name'], $_GET['value'], time() + 3600, "/");
	}

	function get_cookie()
	{
		if ($_GET['name'] && $_COOKIE[$_GET['name']])
			echo $_COOKIE[$_GET['name']]."\n";
	}

	function del_cookie()
	{
		if ($_GET['name'])
			setcookie($_GET['name'], '', time() - 3600, "/");
	}

	if ($_GET['action'])
	{
		if ($_GET['action'] == "set")
			set_cookie();
		elseif ($_GET['action'] == "get")
			get_cookie();
		elseif ($_GET['action'] == "del")
			del_cookie();
	}
?>
