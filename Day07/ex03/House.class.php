<?php

abstract class House
{

	/* Class Specific Methods */

	abstract public function getHouseName();
	abstract public function getHouseMotto();
	abstract public function getHouseSeat();
	public function introduce() {
		print ("House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : " . $this->getHouseMotto() . "\n");
	}
	/* Basic Class Functions */

	function __construct() 
	{

	}
} 		
?> 