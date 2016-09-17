<?php
	$action = NULL;
	$name = NULL;
	$val = NULL;
	$k = $_GET;
	$k[] = "1";
	foreach ($k as $key => $value)
	{
		if ($key == "action")
		{
			if (($value == "set") || ($value == "del") || ($value == "get"))
				$action = $value;
		}
		else if (($key == "name") || ($key == "value"))
		{
			if (($key == "name"))
				$name = $value;
			else if (($key == "value"))
				$val = $value;
		}
		if($name != NULL && $val != NULL && ($action == "set"))
		{
			setcookie($name, $val, time() + 86400, "/");
			$name = NULL;
			$val = NULL;
		}
		else if ($name != NULL && (($action == "del") || ($action == "get")))
		{
			if (($action == "del"))
				setcookie($name, NULL, time() - 3600, "/");
			else if (($action == "get") && $_COOKIE[$name] != NULL)
				echo "{$_COOKIE[$name]}\n";
			$name = NULL;
		}
	}
?>
