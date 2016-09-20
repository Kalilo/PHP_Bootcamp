#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = preg_replace('/\s+/', '', $argv[1]);
		if (strchr($str, "+") == TRUE)
		{
			$arr = explode("+", $str);
			if (is_numeric($arr[0]) && is_numeric($arr[1]) && !$arr[2])
				printf("%d\n", ($arr[0] + $arr[1]));
			else
				printf("Syntax Error\n");
		}
		else if (strchr($str, "-") == TRUE)
		{
			$arr = explode("-", $str);
			if (is_numeric($arr[0]) && is_numeric($arr[1]) && !$arr[2])
				printf("%d\n", ($arr[0] - $arr[1]));
			else
				printf("Syntax Error\n");
		}
		else if (strchr($str, "*") == TRUE)
		{
			$arr = explode("*", $str);
			if (is_numeric($arr[0]) && is_numeric($arr[1]) && !$arr[2])
				printf("%d\n", ($arr[0] * $arr[1]));
			else
				printf("Syntax Error\n");
		}
		else if (strchr($str, "/") == TRUE)
		{
			$arr = explode("/", $str);
			if (is_numeric($arr[0]) && is_numeric($arr[1]) && !$arr[2])
				printf("%d\n", ($arr[0] / $arr[1]));
			else
				printf("Syntax Error\n");
		}
		else if (strchr($str, "%") == TRUE)
		{
			$arr = explode("%", $str);
			if (is_numeric($arr[0]) && is_numeric($arr[1]) && !$arr[2])
				printf("%d\n", ($arr[0] % $arr[1]));
			else
				printf("Syntax Error\n");
		}
		else
			printf("Syntax Error\n");
	}
	else
		echo "Incorrect Parameters\n";
?>
