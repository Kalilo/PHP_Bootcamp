<?php

class Tyrion extends Lannister {

	/* Class Specific Methods */

	public function getSize() 
	{
		return "Short";
	}

	/* Basic Class Functions */

	public function __construct() 
	{
		parent::__construct();
		print("My name is Tyrion" . PHP_EOL); 
	}
} 		
?> 