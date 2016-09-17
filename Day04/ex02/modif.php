<?php
	/*Check form return*/
	if ($_POST['login'] == NULL || $_POST['oldpw'] == NULL || $_POST['newpw'] == NULL)
		die("ERROR not all input given\n");
	/*Set variables*/
	$username = $_POST['login'];
	$oldpassword = hash(whirlpool, "a6f27f471" . $_POST['oldpw']);
	$newpassword = hash(whirlpool, "a6f27f471" . $_POST['newpw']);
	if ($newpassword == $oldpassword)
		die("ERROR new password same as old password\n");
	$file = unserialize(file_get_contents("../private/passwd"));
	if ($file === NULL)
		die("ERROR file contents was null\n");
	/*Scan for matching login*/
	$index = -1;
	while ($file[++$index])
		if ($file[$index]['login'] == $username && $file[$index]['passwd'] == $oldpassword)
		{
			/*Store New Password*/
			$file[$index]['passwd'] == $newpassword; //Might not be reinserting into $file
			$file = serialize($file);
			if (file_put_contents("../private/passwd", $file) === FALSE)
				die("ERROR could not write file\n");
			die ("OK\n");
		}
	die("ERROR no password set\n");
?>
