#!/usr/bin/php
<?php
	function parse_href($html)
	{
		$match = array();
		//$url = preg_match_all('/<a [^\/a>]*href=(.+)title="(.+)"/', $html, $match);
		preg_match_all('/<a href=.*title="(.+)".*<\/a>/', $html, $match1);
		preg_match_all('/<a href=.*>[.*]</', $html, $match2);
		print_r($match1);
		print_r($match2);
//		if(count($match))
//		{
//			for($j=0; $j < count($match); $j++)
//				$html = str_replace($match[1][$j], $replaceStr.urlencode($match[1][$j]), $html);
//		}
//		return $html;
	}

	if ($argc > 1)
	{
		$file = $argv[1];
		$str = file_get_contents($file);
		parse_href($str);
		//$str = preg_replace('/<a href*.)(.*?)(?=<\/span>$)/iu','/1/',  $str);
		//echo $str;

	}
?>