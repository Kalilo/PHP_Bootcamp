#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$arr = array();
		$str = preg_replace('/\s+/', ' ', $argv[1]);
		$arr = explode(" ", $str);
		$k = 1;
		while ($k < count($arr))
		{
			$str = $arr[$k];
			echo "$str ";
			$k++;
		}
		$str = $arr[0];
		echo "$str\n";
	}
?>
