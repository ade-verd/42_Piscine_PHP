#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');

	if ($argc == 2)
	{
		$weekdays = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
		$months = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");

		$wd = "(".implode("|", $weekdays).")";
		$d = "((?:(?:[0-2]?[1-9]{1})|(?:[3][01]{1})))";
		$m = "(".implode("|", $months).")";
		$y = "([0-9]{4})";
		$t = "(?:(?:([01]\d|2[0-3]):)?([0-5]\d):)?([0-5]\d)";
		$regex = implode(" ", array($wd, $d, $m, $y, $t));

		$str = strtr(strtolower($argv[1]), 'éû', 'eu');
		if (preg_match("/^".$regex."$/", $str, $match))
		{
			$timestamp = mktime($match[5], $match[6], $match[7],
								array_search($match[3], $months) + 1,
								$match[2], $match[4]);
			echo $timestamp."\n";
		}
		else
			echo "Wrong Format\n";
	}
?>
