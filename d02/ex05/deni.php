#!/usr/bin/php
<?php
	function parse_data($path, $mainkey)
	{
		if (preg_match("/^(nom|prenom|mail|IP|pseudo)$/", $mainkey) === 0)
			return FALSE;
		if (($handle = fopen($path, "r")) === FALSE)
			return FALSE;
		while (($buffer = fgets($handle, 4096)) !== false)
		{
			$buffer = trim($buffer);
			list($nom, $prenom, $mail, $IP, $pseudo) = explode(';', $buffer);
			$subarray['prenom'] = $prenom;
			$subarray['nom'] = $nom;
			$subarray['mail'] = $mail;
			$subarray['IP'] = $IP;
			$subarray['pseudo'] = $pseudo;
			$array[$$mainkey][] = $subarray;
		}
		if (!feof($handle))
			echo "Error: fgets() failed\n";
		fclose($handle);
		return $array;
	}

	if ($argc == 3)
	{
		$datapath = $argv[1];
		$mainkey = $argv[2];
		if (($array = parse_data($datapath, $mainkey)) !== FALSE)
		{
			if (($stdin = fopen('php://stdin', 'r')) === FALSE)
				exit (1);
			$ft = "(echo|print|printf|print_r|var_dump)";
			$keys = "(prenom|nom|mail|IP|pseudo)";
			while ($stdin && !feof($stdin))
			{
				echo "Entrez votre commande : ";
				$line = trim(fgets($stdin));
				//if (preg_match("/^".$ft.".+\$".$keys."\[['\"].+['\"]\].*;$/", $line) !== 0)
				$line = "echo $"."nom['miawallace'].\"\\n\"    ; echo '\n'  ;";
				//if (preg_match('/^'.$ft.'(.+?)\$'.$keys.'\[[\'"](.+?)[\'"]\](.*?(;|(?=&&)))/', $line, $matches) !== 0)
				if (preg_match_all('/\s*'.$ft.'(.*?);/g', $line, $matches) !== 0)
				{
				/*	if (array_key_exists($matches[4], $array))
					{
						${matches[3]} = $array[$matches[4][$matches[3]]];
						echo $matches[4]." exists\n";
					}
					else
						echo $matches[4]." does not exist\n";
					//eval($cmd);*/
				}
				else
					echo "PHP Parse error :  syntax error, unexpected T_STRING in [....]";
				print_r($matches);
			}
			fclose ($stdin);
		}
	}
?>
