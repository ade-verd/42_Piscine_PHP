#!/usr/bin/php
<?php
	include ("../ex03/ft_split.php");

	if ($argc > 1)
	{
		$i = 1;
		$tab_all = array();
		while ($i < $argc)
		{
			$string_array = ft_split($argv[$i]);
			foreach ($string_array as $word)
				array_push($tab_all, $word);
			$i++;
		}
		sort($tab_all);
		foreach ($tab_all as $word)
			echo $word."\n";
	}
?>
