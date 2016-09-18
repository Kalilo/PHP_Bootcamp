<?php
	session_start();
	$str = ($_SESSION['loggued_on_user'] != NULL) ? "{$_SESSION['loggued_on_user']}\n" : "ERROR\n";
	echo "$str";
?>