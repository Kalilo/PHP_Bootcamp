<?php
init:
	/*Determine host*/
	$eol = (defined("STDIN")) ? "\n" : "<br/>";
	/*Create connection*/
	$username = "admin";
	$password = "PgrZSHlnengJU0wd";
	$conn = mysqli_connect("127.0.0.1", $username, $password);
	$unset($username); $unset($password);
	/*Check connection*/
	if (!$conn)
	{
		$error = mysqli_connect_error();
    	die("Connection failed: {$error}{$eol}");
	}
	/*Create database*/
	if (mysqli_query($conn, "CREATE DATABASE rush00"))
    	echo "Rush00 database created successfully{$eol}";
	else
	{
sqlerror:
		$error = mysqli_error($conn);
		die("SQL Error: {$error}{$eol}");
	}
	/*Create Tables*/
database_setup:
	if (mysql_query("CREATE TABLE users"))
		echo "Sucessfully created users table{$eol}";
	else
		goto sqlerror;
	if (mysql_query("CREATE TABLE items"))
		echo "Sucessfully created items table{$eol}";
	else
		goto sqlerror;
	if (mysql_query("CREATE TABLE orders"))
		echo "Sucessfully created orders table{$eol}";
	else
		goto sqlerror;
	/*End*/
end:
	echo "Finished setting up rush00 database{$eol}";
	mysqli_close($conn);
?>
