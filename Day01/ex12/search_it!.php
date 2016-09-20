#!/usr/bin/php
<?php
	if ($argc > 2)
	{
		$k = 2 - 1;
		$key = $argv[$k];
		while ($argv[(++$k)])
			$arr[] = $argv[$k];
		$k = -1;
		while ((++$k) < count($arr))
		{
			$pos = explode(":", $arr[$k]);
			if (strcmp($pos[0], $key) == FALSE)
			{
				$f = 1;
				$result = $pos[1];
			}
			unset($pos);
		}
		if ($f)
			echo "$result\n";
	}
?>
