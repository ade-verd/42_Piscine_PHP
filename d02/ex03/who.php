#!/usr/bin/php
<?php
	$utmpx = file_get_contents('/var/run/utmpx');
	echo $utmpx;
?>