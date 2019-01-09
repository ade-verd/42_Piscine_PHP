#!/usr/bin/php
<?php
/*
	#define _UTX_USERSIZE	256		// matches MAXLOGNAME
	#define _UTX_LINESIZE	32
	#define	_UTX_IDSIZE	4
	#define _UTX_HOSTSIZE	256

	char ut_user[_UTX_USERSIZE];	// login name
	char ut_id[_UTX_IDSIZE];		// id
	char ut_line[_UTX_LINESIZE];	// tty name
	pid_t ut_pid;					// process id creating the entry
	short ut_type;					// type of this entry
	struct timeval ut_tv;			// time entry was created
	char ut_host[_UTX_HOSTSIZE];	// host name
	__uint32_t ut_pad[16];			// reserved for future use

	Code	Description
a	NUL - Une chaîne complétée avec NULL
A	SPACE - Une chaîne complétée avec un espace
h	Chaîne hexadécimale h, bit de poids faible en premier
H	Chaîne hexadécimale H, bit de poids fort en premier
c	Caractère signé
C	Caractère non signé
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
q	entier doublement long signé (toujours 64 bits, ordre des octets dépendant de la machine)
Q	entier doublement long non signé (toujours 64 bits, ordre des octets dépendant de la machine)
J	entier doublement long non signé (toujours 64 bits, ordre des octets big endian)
P	entier doublement long non signé (toujours 64 bits, ordre des octets little endian)
f	nombre à virgule flottante (taille et représentation dépendantes de la machine)
g	nombre à virgule flottante (taille dépendantes de la machine, ordre des octets little endian)
G	nombre à virgule flottante (taille dépendantes de la machine, ordre des octets big endian)
d	nombre à virgule flottante double (taille et représentation dépendantes de la machine)
e	nombre à virgule flottante double (taille dépendantes de la machine, ordre des octets ittle endian)
E	nombre à virgule flottante double (taille dépendantes de la machine, ordre des octets big endian)
x	caractère NUL
X	Recule d'un caractère
Z	Chaîne complétée par la valeur NULL (nouveau en PHP 5.5)
@	Remplit avec des NUL jusqu'à la position absolue

https://github.com/libyal/dtformats/blob/master/documentation/Utmp%20login%20records%20format.asciidoc#32-record
*/
//	$utmpx = file_get_contents('/var/run/utmpx');
	//var_dump($utmpx);
/*
	if (($fd = fopen("/var/run/utmpx", "r")))
	{
		while (($buffer = fgets($fd, 628)) !== FALSE)
		{
			///$arr_utmpx = unpack("a256_user/a4_ttyid/a32_ttyname/i_pid/i_logintype/I_timestamp/", $buffer);
			$arr_utmpx = unpack("a256user/a4id/a32ttyname/ipid/itype/lloginsec/lloginus", $buffer);
			var_dump($arr_utmpx);
		//	print_r($arr_utmpx);
		}
		fclose($fd);
	}
*/	$utmpx = file_get_contents('/var/run/utmpx');

	while ($utmpx != "")
	{
		date_default_timezone_set("Europe/Paris");
		//$x = unpack("A256user/A4id/A32ttyname/ipid/itype/lloginsec/lloginus/A256host/A64pad", $utmpx);
		$arr_utmpx = unpack("a256_user/a4_ttyid/a32_ttyname/i_pid/i_logintype/i_unknown/i_timestamp/i_microseconds/a256_hostname/a64_unknown", $utmpx);
		var_dump($arr_utmpx);

	//	if ($x['type'] == 7)
		//	$y[] = $x['user'] . " " . $x['ttyname'] . "  " . strftime("%b %e %R", $x['loginsec']) . PHP_EOL;
		$utmpx = substr($utmpx, 628);
	}
//	sort($y);

//	$i = 0;
	//while ($i < count($y))
	//{
		//print($y[$i]);
		//$i++;
//	}
?>
