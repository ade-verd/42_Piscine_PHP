<?php
	function ft_split ($string)
	{
		$string = trim(preg_replace("/ +/", ' ', $string));
		$tab = array_filter(explode(' ', $string));
		return $tab;
	}
?>
