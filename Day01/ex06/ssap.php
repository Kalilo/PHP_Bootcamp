#!/usr/bin/php
<?php
	$k = 1;
	$arr = array();
	while ($k < $argc)
	{
		$str = trim($argv[$k]);
		$str = preg_replace('/\s+/', ' ', $str);
		$tmp = explode(" ", $str);
		$arr = array_merge($arr, $tmp);
		unset($tmp);
		$k++;
	}
	sort($arr);
	$k = 0;
	while ($k < count($arr))
	{
		$str = $arr[$k];
		echo "$str\n";
		$k++;
	}
?>