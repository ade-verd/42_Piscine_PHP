#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		if ($argv[1] == "moyenne")
			average();
		elseif ($argv[1] == "moyenne_user")
			average_user();
		elseif ($argv[1] == "ecart_moulinette")
			mouli_gap();

		$i = 2;

		$array = array();
		while ($i < $argc)
		{
			list($key, $value) = explode(':', $argv[$i]);
			$array[$key] = $value;
			$i++;
		}
		if (array_key_exists($tosearch, $array) === TRUE)
			echo $array[$tosearch]."\n";
	}
?>