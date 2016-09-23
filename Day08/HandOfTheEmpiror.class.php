<?php
	/**
	 * This is a child of the Ships class.
	 */

require_once("Ship.class.php");
require_once("NauticalLance.class.php");

	class HandOfTheEmpiror extends Ships 
	{

			private $_Name = "Hand Of The Emperor";
			private $_Size = array('x' => 2, 'y' => 8);
			private $_HP = 5;
			private $_PP = 10;
			private $_Speed = 15;
			private $_Handling = 4;
			private $_Bouclier = 0;
			private $_Weapon = NULL;
			private $_Position = NULL;
			private $_Angle = 0;
			private $_Velocity = 0;

		/*Constructor and destructor*/
		function __construct($kwargs) 
		{
			$this->_Weapon = new NauticalLance();
			if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs))
			{
				$this->_Position = array ('x' => $kwargs['x'], 'y' => $kwargs['y']);
				$this->_Position['y'] = $kwargs['y'];
			}
			else
				$this->_Position = array('x' => random_int(15, 135), 'y' =>random_int(15, 85));
				/*Display*/
			if (self::$verbose == TRUE)
				print("Created: " . $this . PHP_EOPL);
			if (self::$interact == TRUE)
				print("The Empirors hand has extended to you a new powerfull vessel (HandOfTheEmpiror created)." . PHP_EOL);
		}
		public function AdjustVelocity()
		{

		}

		public function __toString() {
			if (self::$verbose == TRUE)
				return ('[Ship:' . PHP_EOL .
					'Name = ' . self::_Name . PHP_EOL .
					'Size = ' . self::_Size . PHP_EOL .
					'Sprite = ' . self::_Sprite . PHP_EOL .
					'HP = ' . self::_HP . PHP_EOL .
					'EnginePower = ' . self::_EnginePower . PHP_EOL .
					'Speed = ' . self::_Speed . PHP_EOL .
					'Handling = '. self::_Handling . PHP_EOL .
					'Shield = ' . self::_Shield . PHP_EOL .
					'Weapon = ' . self::_Weapon . PHP_EOL .
					'Bouclier = ' .self::_Bouclier . PHP_EOL .
					'PP = '. self::_PP . ']' . PHP_EOL);
			return ("[Ship: " . $this->_Name."]");
		}

		public function getCoords() {
			//if (!$this->_Position['x'] && !$this->_Position['y'])
		//	var_dump($this->_Size);
		//	var_dump($this->_Position);
			//	$this->_Position = array ('x' => rand(15, 135), 'y' => rand(15, 85));
			//	var_dump($this->_Position);
			$x1 = ($this->_Position['x']) - ($this->_Size['x'] / 2);
			$y1 = ($this->_Position['y']) - ($this->_Size['y'] / 2);
			$x2 = ($x1) + ($this->_Size['x']);
			$y2 = ($y1) + ($this->_Size['y']);
			$pos[0] = array('x' => $x1, 'y' => $x2);
			while ($x1 < $x2) {
				$k = $y1;
				while ($k < $y2) {
					$pos[] = array('x' => $x1, 'y' => $k);
					$k++;
				}
				$x1++;
			}
			return ($pos);
		}
	}
	
?>