#!/usr/bin/php
<?php
	if ($argv > 1)
	{
		if (!strcmp("Why this demo ?", $argv[1]))
		{
			echo "To avoid people noticing this while going over\n";
			echo "the subject briefly\n";
		}
		else if (!strcmp("Why this song ?", $argv[1]))
			echo "Because we re all children inside\n";
		else if (!strcmp("really ?", $argv[1]))
		{
			$k = mt_rand(1, 2);
			if ($k == 1)
				echo "No it s because it s april s fool\n";
			else
				echo "Yeah we really are all children inside\n";
		}
	}
?>