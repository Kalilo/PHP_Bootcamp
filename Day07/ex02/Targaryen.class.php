<?php

abstract class Targaryen 
{

	/* Class Specific Methods */

	public function resistsFire() 
	{
		return FALSE;
	}
 
	public function getBurned() 
	{
		if ($this->resistsFire())
			return ("emerges naked but unharmed");
		else
			return ("burns alive");
	}

	/* Basic Class Functions */

	function __construct() 
	{

	}
} 		
?> 