#!/usr/bin/php
<?php
	$a = 1;
	while ($a < $argc) {
		$str = $argv[$a];
		echo "$str\n";
		$a++;
	}
?>
