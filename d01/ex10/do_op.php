#!/usr/bin/php
<?php
	function ft_calc($param1, $op, $param2)
	{
		if (strpos($op, '+') !== FALSE)
			return $param1 + $param2;
		if (strpos($op, '-') !== FALSE)
			return $param1 - $param2;
		if (strpos($op, '*') !== FALSE)
			return $param1 * $param2;
		if (strpos($op, '/') !== FALSE)
			return $param1 / $param2;
		if (strpos($op, '%') !== FALSE)
			return $param1 % $param2;
	}

	if ($argc == 4)
	{
		$param1 = trim(preg_replace("/\t+/", "", $argv[1]));
		$op = trim(preg_replace("/\t+/", "", $argv[2]));
		$param2 = trim(preg_replace("/\t+/", "", $argv[3]));
		echo ft_calc($param1, $op, $param2)."\n";
	}
	else
		echo "Incorrect Parameters\n";
?>
