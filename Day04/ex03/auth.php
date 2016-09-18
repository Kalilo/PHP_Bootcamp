<?php
	function auth($login, $password)
	{
		/*Setup*/
		$password = hash(whirlpool, "a6f27f471" . $password);
		$file = unserialize(file_get_contents("../private/passwd"));
		/*Scan*/
		foreach ($file as $var => $value)
		{
			if ($value['login'] === $login && $value['passwd'] === $password)
				return (TRUE);
		}
		return (FALSE);
	}
?>
