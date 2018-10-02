#!/usr/bin/php
<?php
	function is_pair($n)
	{
		if (($n % 2) == 0)
			return TRUE;
		return FALSE;
	}

	$stdin = fopen('php://stdin', 'r');
	while ($stdin && !feof($stdin))
	{
		echo "Entrez un nombre: ";
		if ($line = trim(fgets($stdin)))
		{
			if (is_numeric($line))
			{
				if (is_pair($line))
					echo "Le chiffre ".$line." est Pair\n";
				else
					echo "Le chiffre ".$line." est Impair\n";
			}
			else
				echo "'".$line."' n'est pas un chiffre\n";
		}
	}
	fclose ($stdin);
	echo "\n";
?>
