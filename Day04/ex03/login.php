<?php
	/*Includes*/
	include("namedauth.php");
	/*Setup*/
	session_start();
	$username = ($_GET['login'] != NULL) ? $_GET['login'] : $_POST['login'];
	$password = ($_GET['passwd'] != NULL) ? $GET['passwd'] : $_POST['passwd'];
	/**/
	$valid = auth($username, $password);
	$_SESSION['loggued_on_user'] = ($valid) ? $username : NULL;
	$str = ($valid) ? "OK\n" : "ERROR\n";
	echo $str;
?>