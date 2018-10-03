#!/usr/bin/php
<?php
	function length_sort($a, $b)
	{
		return strlen($b) - strlen($a);
	}

	function parse_href(&$html)
	{
		$match = array();
		preg_match_all('/<(?:a href|span|div).*?title="(.+?)"/s', $html, $title);
		preg_match_all('/<(?:a href|span).*?>(.+?)</s', $html, $desc_a_span);
		preg_match_all('/<div.*?>(.+?)</s', $html, $desc_div);
		$all = array_merge($title[1], $desc_a_span[1], $desc_div[1]);
		usort($all,'length_sort');

		foreach ($all as $link)
			$html = str_replace($link, strtoupper($link), $html);
	}

	if ($argc > 1)
	{
		$file = $argv[1];
		$str = file_get_contents($file);
		parse_href($str);
		echo $str;
	}
?>