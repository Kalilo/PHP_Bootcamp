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
	$user = -1;
	while ($file[++$user])
		if ($file[$user]['login'] == $username && $file[$user]['passwd'] == $oldpassword)
		{
			/*Store New Password*/
			$file[$user]['passwd'] = $newpassword;
			$f = serialize($file);
			if (file_put_contents("../private/passwd", $f) === FALSE)
				die("ERROR could not write file\n");
			die ("OK\n");
		}
	die("ERROR no password set\n");
?>
