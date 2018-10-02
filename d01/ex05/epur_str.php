#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$epur = trim(preg_replace("/ +/", ' ', $arv[1]));
		echo $epur."\n";
	}
?>
