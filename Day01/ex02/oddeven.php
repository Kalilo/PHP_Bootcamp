#!/usr/bin/php
<?php
$line = "hello";
while (1)
{
	if (strlen($line) > 0)
		echo "Enter a number: ";
	if (($line = fgets(STDIN)) == FALSE)
	{
		echo "\n";
		break;
	}
t1:
	$line = trim($line, "\n");
	if (is_numeric($line))
	{
		if ($line % 2 == 0)
		{
			echo "The number $line is even\n";
		}
		else
		{
			echo "The number $line is odd\n";
		}
	}
	else
	{
		echo "'$line' is not a number\n";
		while (!is_numeric($line))
		{
			echo "enter a number: ";
			if (($line = fgets(STDIN)) == FALSE)
			{
				break;
			}
			goto t1;
		}
	}
}
?>
