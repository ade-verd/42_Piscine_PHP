#!/usr/bin/php
<?php
/* 	shorter version with Date library */
/*	setlocale(LC_TIME, 'fra', 'fr_FR');
	date_default_timezone_set('Europe/Paris');

	if ($argc > 1)
	{
		$strdate = $argv[1];
		$a = strptime($strdate, '%A %d %B %Y %H:%M:%S');
		$timestamp = mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'],
							$a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
		if ($timestamp < 0)
			echo "Wrong Format\n";
		else
			echo $timestamp."\n";
	}*/

	date_default_timezone_set('Europe/Paris');

	function check_date(array $arr)
	{
		$d = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
		$m = array("janvier", "fevrier", "mars", "avril", "mai", "juin",
			"juillet", "aout", "septembre", "octobre", "novembre", "decembre");

		if (count($arr) != 5)
			return (FALSE);
		if (in_array($arr[0], $d) === FALSE)
			return (FALSE);
		if (!(is_numeric($arr[1]) && $arr[1] >= 1 && $arr[1] <= 31))
			return (FALSE);
		$arr[2] = strtr($arr[2], 'éû', 'eu');
		if (in_array($arr[2], $m) === FALSE)
			return (FALSE);
		if (!(is_numeric($arr[3]) && strlen($arr[3]) == 4 && $arr[3] >= 1970))
			return (FALSE);
		$date = array(	"d" => $arr[1],
						"m" => array_search($arr[2], $m) + 1,
						"y" => $arr[3]);
		return ($date);
	}

	function check_time($str)
	{
		$arr = preg_split('/:/', $str, NULL, PREG_SPLIT_NO_EMPTY);

		if (count($arr) != 3)
			return (FALSE);
		if (!(is_numeric($arr[0]) && $arr[0] >= 0 && $arr[0] <= 23))
			return (FALSE);
		if (!(is_numeric($arr[1]) && $arr[1] >= 0 && $arr[1] <= 59))
			return (FALSE);
		if (!(is_numeric($arr[1]) && $arr[1] >= 0 && $arr[1] <= 59))
			return (FALSE);
		$time = array(	"h" => $arr[0],
						"m" => $arr[1],
						"s" => $arr[2]);
		return ($time);
	}

	if ($argc == 2)
	{
		$arr = preg_split('/ /', strtolower($argv[1]), NULL, PREG_SPLIT_NO_EMPTY);
		if (!($date = check_date($arr)) || !($time = check_time($arr[4])))
			echo "Wrong Format\n";
		else
		{
			$timestamp = mktime($time['h'], $time['m'], $time['s'],
								$date['m'], $date['d'], $date['y']);
			echo $timestamp."\n";
		}

	}
?>
