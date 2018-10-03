#!/usr/bin/php
<?php
	setlocale(LC_TIME, 'fra', 'fr_FR');
	date_default_timezone_set('Europe/Paris');

	if ($argc > 1)
	{
		$strdate = $argv[1];
		$a = strptime($strdate, '%A %d %B %Y %H:%M:%S');
		$timestamp = mktime($a['tm_hour'], $a['tm_min'], $a['tm_sec'],
							$a['tm_mon'] + 1, $a['tm_mday'], $a['tm_year'] + 1900);
		echo $timestamp."\n";
	}
?>