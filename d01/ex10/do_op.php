#!/usr/bin/php
<?php
	function ft_calc($param1, $op, $param2)
	{
//		echo "1:\t|".$param1."|\n";
//		echo "#:\t|".$op."|\n";
//		echo "2:\t|".$param1."|\n";
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

	print_r($argv);
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
