<?php
	function ft_is_sort($arr)
	{
		$newarray = $arr;
		sort($newarray);
		$counter = 0;
		while ($counter < count($arr))
		{
			if (!strcmp($arr[$counter], $newarray[$counter]))
				return(0);
			$counter++;
		}
		return (1);
	}
?>