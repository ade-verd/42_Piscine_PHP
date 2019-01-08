#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = $argv[1];
		$str = preg_replace('/\s+/', '', $str);
		$numbers = '\d+';
		$operators = '[+\/*%-]';
		if (preg_match('/^'.$numbers.$operators.$numbers.'$/', $str) == 1)
		{
			eval('$result = '.$str.';');
			echo $result."\n";
		}
		else
			echo "Syntax Error\n";
	}
	else
		echo "Incorrect Parameters\n";
?>
