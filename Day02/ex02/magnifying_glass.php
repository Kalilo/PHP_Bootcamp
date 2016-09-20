#!/usr/bin/php
<?php
if ($argv[1] == NULL | !file_exists($argv[1]))
	return (1);
$contents = file_get_contents($argv[1]);

$index = -1;
preg_match_all("/<a(?:.[^>]*)title=\"(.[^\"]*)\"*>/", $contents, $matches, PREG_OFFSET_CAPTURE);
preg_match_all("/<a(?:(?:[^<])*>[\s]*)(.[^<>]*)</", $contents, $matches1, PREG_OFFSET_CAPTURE);
$matches = array_merge($matches, $matches1);
$correct = -1;
while($matches[$correct += 2])
{
	$index = -1;
	while($matches[$correct][++$index])
		$contents = substr_replace($contents, strtoupper($matches[$correct][$index][0]), $matches[$correct][$index][1], strlen($matches[$correct][$index][0]));
}
printf("%s", $contents);
?>