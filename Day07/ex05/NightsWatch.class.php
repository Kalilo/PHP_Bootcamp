<?php

class NightsWatch 
{
	/* Variables */

	private $_recruits;

	/* Class Specific Methods */

	public function recruit($person) 
	{
		if (in_array("fight", get_class_methods($person)))
			$this->_recruits[] = $person;
	}

	public function fight()
	{
		foreach ($this->_recruits as $recruit)
		{
			$recruit->fight();
		}
	}

	/* Basic Class Functions */

	public function __construct() 
	{
	}
} 		
?> 