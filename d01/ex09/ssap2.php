#!/usr/bin/php
<?php
	include ("../ex03/ft_split.php");

	function char_group($c)
	{
		$group1 = "abcdefghijklmnopqrstuvwxyz";
		$group2 = "0123456789";

		if (!$c)
			return 0;
		if (strpos($group1, $c) !== FALSE)
			return 1000 + ord($c);
		if (strpos($group2, $c) !== FALSE)
			return 2000 + ord($c);
		return 3000 + ord($c);
	}

	function cmp($a, $b)
	{
		$a = strtolower($a);
		$b = strtolower($b);
		if ($a == $b)
			return 0;
		$i = 0;
		while ($a[$i] && $b[$i])
		{
			if ($a[$i] != $b[$i])
				return (char_group($a[$i]) - char_group($b[$i]));	
			$i++;
		}
		return (char_group($a[$i]) - char_group($b[$i]));	
	}

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
		usort($tab_all, 'cmp');
		foreach ($tab_all as $word)
			echo $word."\n";
	}
?>
