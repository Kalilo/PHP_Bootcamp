<?php
	/*Check form return*/
	if ($_POST['login'] == NULL || $_POST['passwd'] == NULL)
		die("ERROR\n");
	/*Set variables*/
	$username = $_POST['login'];
	$password = hash(whirlpool, "a6f27f471" . $_POST['passwd']);
	if (file_exists("../private") === FALSE)
		mkdir("../private/");
	if (file_exists("../private/passwd") === FALSE)
		if (file_put_contents("../private/passwd", "") === FALSE)
			die ("ERROR\n");
	$file = unserialize(file_get_contents("../private/passwd"));
	/*Scan for duplicate*/
	foreach ($file as $varname =>$varval)
		if ($varval['login'] == $username)
			die("ERROR\n");
	/*Store values*/
	$user['login'] = $username;
	$user['passwd'] = $password;
	$file[] = $user;
	$f = serialize($file);
	if (file_put_contents("../private/passwd", $f) === FALSE)
		die("ERROR\n");
	echo "OK\n";
?>
