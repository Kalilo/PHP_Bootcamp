#!/usr/bin/php
<?php
	$date = explode(" ", shell_exec("date"));
	$w = (explode("\n", shell_exec("w")));

	$k = 1;
	while (++$k < count($w) && $w)
	{
		$w[$k] = explode(" ", preg_replace('/\s+/', ' ', $w[$k]));
		$s = ($k == 2) ? NULL : "tty";
		echo "{$w[$k][0]} {$s}{$w[$k][1]}  {$date[1]} {$date[2]} {$w[$k][3]}\n";
	}	
?>