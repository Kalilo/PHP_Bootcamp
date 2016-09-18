<?php
	session_start();
	/**/
	$eol = '\n';
	/*Create connection*/
	$conn = mysqli_connect("127.0.0.1", "admin", "PgrZSHlnengJU0wd");
	/*Check connection*/
	if (!$conn)
	{
		$error = mysqli_connect_error();
    	die("Connection failed: {$error}{$eol}");
	}
	/*Create database*/
	mysqli_query($conn, "DELETE DATABASE rush00");
	if (mysqli_query($conn, "CREATE DATABASE rush00"))
    	echo "Rush00 database created successfully{$eol}";
	/*Create Tables*/
	mysql_select_db("rush00", $conn); //select the Tables
	if ($_FILES[csv][size] > 0) {
    //get the csv file 
 // $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"elements.csv");
    //loop through the csv file and insert into database
	mysqli_query($conn, "CREATE TABLE elements(
		atomic_num INT NOT NULL,
		symbol CHAR(5),
		aname CHAR(30),
		atomic_mass decimal(18, 10), 
		CPK_color CHAR(7),
		electronic_configuration CHAR(5), 
		electronegativity decimal(18, 3),
		atomic_radius decimal(18, 3), 
		ion_radius decimal(18, 3), 
		van_der_Waals_radius decimal(18, 3), 
		IE1 CHAR(30),
		EA CHAR(30), 
		oxidation_states CHAR(30), 
		standard_state CHAR(30), 
		bonding_type CHAR(30), 
		melting_point CHAR(30), 
		boiling_point CHAR(30), 
		density CHAR(30), 
		metalornonmetal CHAR(30), 
		year_discovered CHAR(30));");
    do {
		echo "data = '$data'\n";//debug
        if ($data[0]) { 
            mysql_query("INSERT INTO elements(
				atomic_num, 
				symbol, 
				aname, 
				atomic_mass, 
				CPK_color, 
				electronic_configuration, 
				electronegativity, 
				atomic_radius, 
				ion_radius, 
				van_der_Waals_radius, 
				IE1, 
				EA, 
				oxidation_states, 
				standard_state,
				bonding_type,
				melting_point,
				boiling_point,
				density,
				metalornonmetal,
				year_discovered) VALUES 
                ( 
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."',
					'".addslashes($data[2])."',
					'".addslashes($data[3])."', 
                    '".addslashes($data[4])."',
					'".addslashes($data[5])."', 
                    '".addslashes($data[6])."',
					'".addslashes($data[7])."',
					'".addslashes($data[8])."', 
                    '".addslashes($data[9])."',
					'".addslashes($data[10])."', 
                    '".addslashes($data[11])."',
					'".addslashes($data[12])."',
					'".addslashes($data[13])."', 
                    '".addslashes($data[14])."',
					'".addslashes($data[15])."',
                    '".addslashes($data[16])."',
					'".addslashes($data[17])."', 
                    '".addslashes($data[18])."',
                    '".addslashes($data[19])."' 
                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,100000,",","'")); 
    // 
    //redirect 
    header('Location: import.php?success=1'); die;
} 

?> 

<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Setup</title> 
</head> 

<body> 

<?php if (!empty($_GET[success])) { echo "<b>Setup Complete.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html>
