#!/usr/bin/php
<?php

/*
	/usr/include/utmpx.h

	https://github.com/libyal/dtformats/blob/master/documentation/Utmp%20login%20records%20format.asciidoc#32-record

	Code	Description
a	NUL - Une chaîne complétée avec NULL
A	SPACE - Une chaîne complétée avec un espace
s	entier court signé (toujours sur 16 bits, ordre des octets dépendant de la machine)
S	entier court non signé (toujours 16 bits, ordre des octets dépendant de la machine)
n	entier court non signé (toujours 16 bits, ordre des octets big endian)
v	entier court non signé (toujours 16 bits, ordre des octets little endian)
i	entier signé (taille et ordre des octets dépendants de la machine)
I	entier non signé (taille et ordre des octets dépendants de la machine)
l	entier long signé (toujours 32 bits, ordre des octets dépendant de la machine)
L	entier long non signé (toujours 32 bits, ordre des octets dépendant de la machine)
N	entier long non signé (toujours 32 bits, ordre des octets big endian)
V	entier long non signé (toujours 32 bits, ordre des octets little endian)
*/

	$str = file_get_contents('/var/run/utmpx');

	while ($str != "")
	{
		date_default_timezone_set("Europe/Paris");
		$utmpx = unpack("a256_user/a4_ttyid/a32_ttyname/i_pid/s_logintype/s_unknown1/i_timestamp/i_microsec/a256_hostname/a64_unknown2", $str);
		$global_array[] = $utmpx;
		$str = substr($str, 628);
	}
	//print_r($global_array);

	foreach ($global_array as $line)
	{
		//print_r($line);
		if ($line["_logintype"] == 7)
		{
			$date = date("M  j H:i", $line["_timestamp"]);
			printf("%s %s  %s\n", $line["_user"], $line["_ttyname"], $date);
		}
	}

?>
