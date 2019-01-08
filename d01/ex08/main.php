#!/usr/bin/php
<?php
	include ("ft_is_sort.php");

	$tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
	$tab[] = "Et qu’est-ce qu’on fait maintenant ?";

//	sort($tab);
	print_r($tab);
	if (ft_is_sort($tab))
		echo "Le tableau est trié\n";
	else
		echo "Le tableau n’est pas trié\n";
?>
