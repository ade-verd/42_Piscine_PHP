#!/usr/bin/php
<?php
	if ($argc > 2)
	{
		$tosearch = $argv[1];
		$i = 2;

		$array = array();
		while ($i < $argc)
		{
			if (strpos($argv[$i], ':') !== FALSE)
			{
				list($key, $value) = explode(':', $argv[$i]);
				$array[$key] = $value;
			}
			$i++;
		}
		if (array_key_exists($tosearch, $array) === TRUE)
			echo $array[$tosearch]."\n";
	}
?>
