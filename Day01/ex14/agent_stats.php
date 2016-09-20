#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		/*Gets the table*/
		while ((($line = fgets(STDIN)) == TRUE))
			$arr[] = explode(";", $line);
		/*Runs over calculations for the args*/
		if (!strcmp($argv[1], "average"))
		{
			$k = 0;
			$sum = 0;
			$num = 0;
			while ((++$k) < count($arr))
			{
				if (($arr[$k][1]) && strcmp($arr[$k][2], "moulinette"))
				{
					$num++;
					$sum += intval($arr[$k][1]);
				}
			}
			printf("%f\n", ($sum / $num));
		}
		else if (!strcmp($argv[1], "average_user"))
		{
			sort($arr);
			$k = -1;
			$z = -1;
			while ((++$k) < (count($arr)))
			{
				if (!strcmp($a[$z][0], $arr[$k][0]))
					$a[$z][1] = (floatval($arr[$k][1]) + floatval($a[$z][1])) / 2;
				else
					$a[(++$z)] = $arr[$k];
			}
			$k = 0;
			while ((++$k) < count($a))
			{
				printf("%s:%f\n", $a[$k][0], ($a[$k][1]) / 2);
			}
		}
		else if (!strcmp($argv[1], "moulinette_variance"))
		{
			//here
		}
	}
?>
