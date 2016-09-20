#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$num1 = trim($argv[1]);
		$op = trim($argv[2]);
		$num2 = trim($argv[3]);
		$result = 0;
		echo "'$num1', '$op', '$num2'\n";
		if (strcmp($op, "+") == FALSE)
			$result = $num1 + $num2;
		else if (strcmp($op, "-") == FALSE)
			$result = $num1 - $num2;
		else if (strcmp($op, "*") == FALSE)
			$result = $num1 * $num2;
		else if (strcmp($op, "/") == FALSE)
			$result = $num1 / $num2;
		else if (strcmp($op, "%") == FALSE)
			$result = $num1 % $num2;
		echo "$result\n";
	}
	else
		echo "Incorrect Parameters\n";
?>
