<?php
	function is_valid()
	{
		$submit = (isset($_POST['submit']) && $_POST['submit'] == "OK");
		$log = (isset($_POST['login']) && !empty($_POST['login']));
		$pass = (isset($_POST['passwd']) && !empty($_POST['passwd']));

		if ($submit && $log && $pass)
			return TRUE;
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
			echo "OK\n";
		else
			echo "ERROR\n";
	}

	function login_exists($global, $current_login)
	{
		foreach ($global as $index)
		{
			if ($index['login'] == $current_login)
				return TRUE;
		}
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
		$current['passwd'] = $_POST['passwd'];
	
		if (file_exists($save_path) === FALSE)
			mkdir($save_path, 0700, TRUE);
		elseif (file_exists($save_fullpath) === TRUE)
			$global_array = read_existing_pw($save_fullpath);
		
		if (!login_exists($global_array, $current['login']))
		{
			$global_array[] = $current;
			write_pw($save_fullpath, $global_array);
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>