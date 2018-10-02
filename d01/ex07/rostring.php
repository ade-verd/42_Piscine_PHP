#!/usr/bin/php
<?php
	include ("../ex03/ft_split.php");

	if ($argc > 1)
	{
		$i = 0;
		$imax = 0;

		$array = ft_split($argv[1]);
		$imax = sizeof($array) - 1;
		$first = $array[$i];
		while ($i < $imax)
		{
			$array[$i] = $array[$i + 1];
			$i++;
		}
		$array[$i] = $first;
		$str = implode(' ', $array);
		echo $str."\n";
	}
?>
