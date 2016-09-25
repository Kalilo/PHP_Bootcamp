<?php
	/*Standard Setup*/
	if ($_POST['q'] == NULL)
		die("Error: no text given" . PHP_EOL);
	if (file_exists("list.csv") == FALSE)
		mkdir("list.csv");
	if (file_exists("list.csv") == FALSE && file_put_contents("list.csv", ""))
		die("Error: Failed to create the csv database" .PHP_EOL);
	/*Delete content*/
	if (($handle = fopen("test.csv", "r")) !== FALSE) {
    	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       		$num = count($data);
        	for ($c=0; $c < $num; $c++) {
				if ($data[$c] == $_POST['q']) {
					$k = $c;
					while (++$k < $num + 1)
						$data[$k] = $data[$k + 1];
					$data[$k] = NULL;
				}
        	}
		}
		fputcsv($data);
    	fclose($handle);
	}
?>