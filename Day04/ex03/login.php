<?php
	session_start();
	/*Includes*/
	include("auth.php");
	/*Setup*/
	
	if ($_GET['login'] != NULL)
	{
		$username = $_GET['login'];
		$passwd = $_GET['passwd'];
	}
	else
	{
		$username = $_POST['login'];
		$passwd = $_POST['passwd'];
	}
	/**/
	$valid = auth($username, $passwd);
	$_SESSION['loggued_on_user'] = ($valid) ? $username : NULL;
	$str = ($valid) ? "OK\n" : "ERROR\n";
	echo $str;
?>