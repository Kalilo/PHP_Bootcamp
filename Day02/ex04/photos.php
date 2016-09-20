#!/usr/bin/php
<?php
if ($argv[1] == NULL)
	return (1);
$curl = curl_init($argv[1]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$website = curl_exec($curl);
curl_close($curl);
preg_match_all("/<img.+?src=[\'\"]([^\'\"]+)[\'\"].*>/", $website, $match);
if (!file_exists($argv[1]))
	mkdir($argv[1] . "/");
foreach ($match[1] as $imagelink)
{
	preg_match("/\/([^\/]*)(?!.\/*)/", $imagelink, $namearray);
	$imagename = $namearray[1];
	$imgcurl = curl_init($imagelink);
	curl_setopt($imgcurl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($imgcurl, CURLOPT_HEADER, FALSE);
	curl_setopt($imgcurl, CURLOPT_BINARYTRANSFER,TRUE);
	if (!file_exists($argv[1]."/".$imagename))
	{
		$file = fopen($argv[1]."/".$imagename, "x");
		fwrite($file, curl_exec($imgcurl));
		fclose($file);
	}
	curl_close($imgcurl);
}
?>