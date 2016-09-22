<?php

class Greyjoy 
{
	
	/* Variables */
	protected $familyMotto = "We do not sow";

	/* Class Specific Methods */

	protected function announceMotto() 
	{
		print($this->familyMotto . PHP_EOL);
	}

	/* Basic Class Functions */

	function __construct() 
	{
	}
} 		
?> 