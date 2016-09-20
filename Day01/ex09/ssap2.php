#!/usr/bin/php
<?php

if ($argc > 1) {
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
	sort($arr, 0);
	$k = 0;
	while ($k < (count($arr)))
	{
		if (ctype_alpha($arr[$k][0]))
			$alpha[] = $arr[$k];
		else if (ctype_digit($arr[$k][0]))
			$num[] = $arr[$k];
		else
			$other[] = $arr[$k];
		$k++;
	}
	$k = 0;
	while ($k < count($alpha) + 1)
	{
		$l = $k + 1;
		$s1 = strtolower($alpha[$k]);
		while ($l < count($alpha))
		{
			$s2 = strtolower($alpha[$l]);
			if (strcmp($s1, $s2) > 0)
			{
				$tmp = $alpha[$k];
				$alpha[$k] = $alpha[$l];
				$alpha[$l] = $tmp;
			}
			$l++;
		}
		$k++;
	}
	$k = 0;	
	while ($k < count($alpha))
	{
		$str = $alpha[$k];
		echo "$str\n";
		$k++;
	}
	rsort($num);
	$k = 0;
	while ($k < count($num))
	{
		$str = $num[$k];
		echo "$str\n";
		$k++;
	}
	$k = 0;
	while ($k < count($other))
	{
		$str = $other[$k];
		echo "$str\n";
		$k++;
	}
}
?>
