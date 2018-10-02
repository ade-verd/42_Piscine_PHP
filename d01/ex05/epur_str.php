#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$epur = trim(preg_replace("/ +/", ' ', $argv[1]));
		echo $epur."\n";
	}
?>
