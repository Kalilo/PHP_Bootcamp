<?php
	/*Standard Setup*/
	if ($_POST['q'] == NULL)
		die("Error: no text given" . PHP_EOL);
	if (file_exists("list.csv") == FALSE)
		mkdir("list.csv");
	if (file_exists("list.csv") == FALSE && file_put_contents("list.csv", ""))
		die("Error: Failed to create the csv database" .PHP_EOL);
	/*Save content*/
	$list = array (array($_POST['q']));
	$fp = fopen('list.csv', 'a+');

	foreach ($list as $fields) {
    	fputcsv($fp, $fields);
	}

	fclose($fp);
?>