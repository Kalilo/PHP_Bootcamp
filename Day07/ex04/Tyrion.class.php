<?php

class Tyrion extends Lannister {

	/* Class Specific Methods */

	public function sleepWith($person) 
	{
		if (get_class($person) == "Sansa")
			print ("Let's do this.\n");
		else
			print ("Not even if I'm drunk !\n");
	}

	/* Basic Class Functions */

	public function __construct() 
	{
	}
} 		
?> 