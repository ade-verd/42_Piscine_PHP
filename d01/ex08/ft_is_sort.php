<?php
	function ft_is_sort($array)
	{
		$tmp1 = $array;
		$tmp2 = $array;

		sort($tmp1);
		if ($tmp1 == $tmp2)
			return TRUE;
		else
			return FALSE;
	}
?>
