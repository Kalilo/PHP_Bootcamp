<?php

class UnholyFactory
{
	/* Variables */

	public $recruits = array ();

	/* Class Specific Methods */

	public function absorb($person) 
	{
		var_dump($person);
		if (is_subclass_of($person, "Fighter"))
		{
			$this->recruits[$person->type] = clone $person;
			print ("(Factory absorbed a fighter of type {$person->type})\n");
		}
		else
			print ("(Factory can't absorb this, it's not a fighter)");
		var_dump($recruits);
	}

	public function fabricate($requested)
	{
		var_dump($recruits);
		if (array_key_exists($requested, $this->recruits))
		{
			print ("(Factory fabricates a fighter of type {$recruit->type})\n");
			return($recruit);
		}
		print ("(Factory hasn't absorbed any fighter of type {$requested})");
	}

	/* Basic Class Functions */

	public function __construct() 
	{
	}
} 		
?> 