<?php

	function is_valid()
	{
		$submit = (isset($_POST['submit']) && $_POST['submit'] == "OK");
		$log = (isset($_POST['login']) && $_POST['login'] != "");
		$oldpw = (isset($_POST['oldpw']) && $_POST['oldpw'] != "");
		$newpw = (isset($_POST['newpw']) && $_POST['newpw'] != "");
		if ($submit && $log && $oldpw && $newpw)
			return TRUE;
		echo "ERROR\n";
		return FALSE;
	}

	function read_existing_pw($path)
	{
		$tab_serialized = file_get_contents($path);
		return unserialize($tab_serialized);
	}

	function write_pw($path, $array)
	{
		if (file_put_contents($path, serialize($array)))
		{
			echo "OK\n";
			header("Location: index.html");
		}
		else
		{
			echo "ERROR\n";
			exit (1);
		}
	}

	function logs_match(&$global, $current)
	{
		foreach ($global as &$index)
		{
			if ($index['login'] == $current['login'] && $index['passwd'] == $current['oldpw'])
			{
				$index['passwd'] = $current['newpw'];
				return TRUE;
			}
		}
		echo "ERROR\n";
		return FALSE;
	}

	$save_path = "../private";
	$save_file = "passwd";
	$save_fullpath = $save_path."/".$save_file;

	$global_array = array();
	$current = array();

	if (is_valid())
	{
		$current['login'] = $_POST['login'];
		$current['oldpw'] = hash("whirlpool", $_POST['oldpw']);
		$current['newpw'] = hash("whirlpool", $_POST['newpw']);

		if (file_exists($save_path) && file_exists($save_fullpath))
		{
			$global_array = read_existing_pw($save_fullpath);
			if (logs_match($global_array, $current))
				write_pw($save_fullpath, $global_array);
		}
		else
			echo "ERROR\n";
	}
?>
