#!/usr/bin/php
<?php
	function read_stdin()
	{
		$array = array();
		$handle = fopen("php://stdin", "r");
		if ($handle)
		{
			while (($buffer = fgets($handle, 4096)) !== false)
			{
				list($user, $note, $noteur, $feedback) = explode(';', $buffer);
				$subarray = array();
				$subarray['user'] = $user;
				$subarray['note'] = $note;
				$subarray['noteur'] = $noteur;
				$subarray['feedback'] = $feedback;
				$array[$user][] = $subarray;
			}
			if (!feof($handle))
				echo "Error: fgets() failed\n";
			fclose($handle);
		}
		return $array;
	}

	function average()
	{
		$sum_arr = array();
		$array = read_stdin();

		foreach ($array as $agent)
		{
			foreach ($agent as $eval)
			{
				if (is_numeric($eval['note']) && ($eval['noteur'] != "moulinette"))
					$sum_arr[] = $eval['note'];
			}
		}
		$average = array_sum($sum_arr) / count($sum_arr);
		echo $average."\n";
	}

	function average_user()
	{
		$array = read_stdin();
		ksort($array);

		foreach ($array as $agent)
		{
			$sum_arr = array();
			foreach ($agent as $eval)
			{
				if (is_numeric($eval['note']) && ($eval['noteur'] != "moulinette"))
					$sum_arr[] = $eval['note'];
			}
			if (count($sum_arr) > 0)
			{
				$average = array_sum($sum_arr) / count($sum_arr);
				echo $eval['user'].":".$average."\n";
			}
		}
	}
	
	function mouli_gap()
	{
		$array = read_stdin();
		ksort($array);

		foreach ($array as $agent)
		{
			$moulinote = "";
			$ecart_arr = array();
			foreach ($agent as $eval)
			{
				if (is_numeric($eval['note']))
				{
					if ($eval['noteur'] == "moulinette")
						$moulinote = $eval['note'];
					else
						$ecart_arr[] = $eval['note'];
				}
			}
			if (count($ecart_arr) > 0 && is_numeric($moulinote))
			{
				$average = array_sum($ecart_arr) / count($ecart_arr);
				$ecart = $average - $moulinote;
				echo $eval['user'].":".$ecart."\n";
			}
		}
	}
	
	if ($argc == 2)
	{
		if ($argv[1] == "moyenne")
			average();
		elseif ($argv[1] == "moyenne_user")
			average_user();
		elseif ($argv[1] == "ecart_moulinette")
			mouli_gap();
	}
?>