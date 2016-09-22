<?php
	/**
	 * This is a child of the Ships class.
	 */
	class HandOfTheEmpiror extends Ships {
		/*Constructor and destructor*/
		function __construct($kwargs) {
				/*Details*/
			$this->_Name = "Hand of the Empiror";
			$this->_Size = array('x' => 1, 'y' => 4);
			$this->_HP = 5;
			$this->_PP = 10;
			$this->_Speed = 15;
			$this->_Handling = 4;
			$this->_Bouclier = 0;
			$this->_Weapon = new NauticalLance();/*To be added*/
				/*kwargs*/
			$this->_Position = (array_key_exists('position', $kwargs)) ? $kwargs['position'] : 
				array('x' => rand(15, 135), 'y' =>rand(15, 85));
			$this->_Angle = (array_key_exists('angle', $kwargs)) ? $kwargs['angle'] : 0;
			$this->_Velocity = (array_key_exists('velocity', $kwargs)) ? $kwargs['velocity'] : 0;
				/*Display*/
			if (self::$verbose == TRUE)
				print("Created: " . $this . PHP_EOPL);
			if (self::$interact == TRUE)
				print("The Empirors hand has extended to you a new powerfull vessile (HandOfTheEmpiror created)." . PHP_EOL);
		}
	}
	
?>