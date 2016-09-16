<?php
	$action = NULL;
	foreach ($_GET as $key => $value)
	{
		if (!strcmp($key, "action"))
		{
			if (!strcmp($value, "set") || !strcmp($value, "del") || !strcmp($value, "get"))
				$action = $value;
		}
		else
		{
			if (!strcmp($action, "set"))
				setcookie($key, $value, time() + 86400, "/");
			else if (!strcmp($action, "del"))
				setcookie($key, $value, time() - 1000, "/");
			else if (!strcmp($action, "get"))
				echo "{$_COOKIE[$key]}\n";
		}
	}	
?>
