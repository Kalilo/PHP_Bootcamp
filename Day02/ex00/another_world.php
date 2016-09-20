#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = trim($argv[1]);
		$str = preg_replace('/\s+/', ' ', $str);
		$str = preg_replace('/\t+/', ' ', $str);
		$str = trim($str);
		echo "$str\n";
	}
?>