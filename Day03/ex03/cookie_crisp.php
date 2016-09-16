<?php
	$action = NULL;
	$name = NULL;
	$val = NULL;
	$k = $_GET;
	$k[] = "1";
	foreach ($k as $key => $value)
	{
		if (!strcmp($key, "action"))
		{
			if (!strcmp($value, "set") || !strcmp($value, "del") || !strcmp($value, "get"))
				$action = $value;
		}
		else if (!strcmp($key, "name") || !strcmp($key, "value"))
		{
			if (!strcmp($key, "name"))
				$name = $value;
			else if (!strcmp($key, "value"))
				$val = $value;
		}
		if($name != NULL && $val != NULL && !strcmp($action, "set"))
		{
			setcookie($name, $val, time() + 86400, "/");
			$name = NULL;
			$val = NULL;
		}
		else if ($name != NULL && (!strcmp($action, "del") || !strcmp($action, "get")))
		{
			if (strcmp($action, "del") == FALSE)
				setcookie($name, NULL, time() - 3600, "/");
			else if (!strcmp($action, "get") && $_COOKIE[$name] != NULL)
				echo "{$_COOKIE[$name]}\n";
			$name = NULL;
		}
	}
?>
