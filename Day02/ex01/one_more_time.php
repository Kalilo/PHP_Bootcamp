#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		/*Disassemble*/
		$str = trim($argv[1]);
		$str = preg_replace('/\s+/', ' ', $str);
		$str = preg_replace('/\t+/', ' ', $str);
		$str = trim($str);
		$arr = explode(" ", $str);
		if (count($arr) != 5)
		{
wrongformat:
			echo "Wrong Format\n";
			return ;
		}
		/*Setup*/
		$arr_day = array ("[lL]undi", "[mM]ardi", "[jJ]eudi", "[mM]ercredi", "[vV]endredi", "[sS]amedi", "[dD]imanche");
		$arr_day_e = array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
		$arr_month = array ("[jJ]anvier", "[fF]évrier", "[mM]ars", "[aA]vril", "[mM]ai", "[jJ]uin", "[jJ]uillet", "[aA]oût", "[sS]eptembre", "[oO]ctobre", "[nN]ovembre", "[dD]écembre");
		$arr_month_e = array ("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$k = -1;
		while (++$k < 7)
			$arr_day[$k] = "/^" . $arr_day[$k] . "$/";
		$k = -1;
		while (++$k < 12)
			$arr_month[$k] = "/^" . $arr_month[$k] . "$/";
		/*Sub*/
		$k = -1;
		while (++$k < 7)
		{
			if (preg_match($arr_day[$k], $arr[0], $match))
			{
				$arr[0] = $arr_day_e[$k];
				goto set_month;
			}
		}
		goto wrongformat;
set_month:
		$k = -1;
		while (++$k < 12)
		{
			if (preg_match($arr_month[$k], $arr[2], $match))
			{
				$arr[2] = $arr_month_e[$k];
				$arr[5] = $k + 1;
				goto assemble;
			}
		}
		goto wrongformat;
assemble:
		/*Assemble*/
		$a = explode(":", $arr[4]);
		if (!checkdate(intval($arr[5]), intval($arr[1]), intval($arr[3])))
			goto wrongformat;
		date_default_timezone_set("Europe/Paris");
		$str = "{$arr[3]}-{$arr[5]}-{$arr[1]} {$arr[4]}";
		$s = strtotime($str);
		echo "$s\n";
	}
?>