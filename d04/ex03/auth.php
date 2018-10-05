<?php
	function read_existing_pw($path)
	{
		$tab_serialized = file_get_contents($path);
		return unserialize($tab_serialized);
	}

	function logs_match(&$global, $login, $passwd)
	{
		$passwd_hash = hash("whirlpool", $passwd);
		foreach ($global as $index)
		{
			if ($index['login'] == $login && $index['passwd'] == $passwd_hash)
				return TRUE;
		}
		return FALSE;
	}

	function auth($login, $passwd)
	{
		$save_path = "../private";
		$save_file = "passwd";
		$save_fullpath = $save_path."/".$save_file;

		if (file_exists($save_path) && file_exists($save_fullpath))
		{
			$array = read_existing_pw($save_fullpath);
			if (logs_match($array, $login, $passwd))
				return TRUE;
		}
		return FALSE;
	}
?>