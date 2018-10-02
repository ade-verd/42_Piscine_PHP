#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$epur = trim($argv[1]);
		$epur = trim(preg_replace("/ +/", ' ', $epur));
		echo $epur."\n";
	}
?>
