<?php
	/*Determine host*/
	$eol = (defined("STDIN")) ? "\n" : "<br/>";
	/*Create connection*/
	$username = "admin";
	$password = "PgrZSHlnengJU0wd";
	$conn = mysqli_connect("127.0.0.1", $username, $password);
//	$unset($username); $unset($password);
	/*Check connection*/
	if (!$conn)
	{
		$error = mysqli_connect_error();
    	die("Connection failed: {$error}{$eol}");
	}
	/*Create database*/
	if (mysqli_query($conn, "CREATE DATABASE rush00"))
    	echo "User database created successfully{$eol}";
	else
	{
		$error = mysqli_error($conn);
		die("Error creating Orders databse: {$error}{$eol}");
	}
	/*End*/
	echo "Finished setting up the databases{$eol}";
	mysqli_close($conn);
?>
