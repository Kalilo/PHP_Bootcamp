<?php
	/*Standard Setup*/
	if ($_POST['q'] == NULL)
		die("Error: no text given" . PHP_EOL);
	if (file_exists("list.csv") == FALSE)
		mkdir("list.csv");
	if (file_exists("list.csv") == FALSE && file_put_contents("list.csv", ""))
		die("Error: Failed to create the csv database" .PHP_EOL);
	/*Read content*/
/*	if (($handle = fopen("test.csv", "r")) !== FALSE) {
    	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       		$num = count($data);
      	  	echo "<tr> $num fields in line $row: <br /></tr>\n";
       		$row++;
        	for ($c=0; $c < $num; $c++) {
            	echo $data[$c] . PHP_EOF;
        	}
		}
    	fclose($handle);
	}*/
	$file = fopen("list.csv","r");
	while(! feof($file))
  	{
 		echo ("<li id=toto>" . fgets($file) . "</li><br />");
  	}

	fclose($file);
?>