<?php

abstract Class Fighter 
{
	public $type;
	
	abstract public function fight($target);

	public function __construct($input) 
	{
		$this->type = $input;
	}
} 		
?> 