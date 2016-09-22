<?php
		Abstract Class Ships {
		/*Constants*/
		private $_Name = NULL;
		private $_Size = NULL;
		private $_Sprite = NULL;
		private $_HP = NULL;
		private $_EnginePower = NULL;
		private $_Speed = NULL;
		private $_Handling = NULL;
		private $_Shield = NULL;
		private $_Weapon = NULL;
		private $_PP = NULL;
		private $_Bouclier = NULL;
		/*Variables*/
		private $_Position = array('x' => 0, 'y' => 0);
		private $_Velocity = 0;
		private $_Angle = 0;
		public static $verbose = FALSE;
		public static $interact = FALSE;
		/*Standard Basic Methods*/
		public static function doc() {
			print(file_get_contents("./ship.doc.txt"));
		}
		public function __toString() {
			if (self::$verbose == TRUE)
				return ('[Ship:' . PHP_EOL .
					'Name = ' . self::Name . PHP_EOL .
					'Size = ' . self::Size . PHP_EOL .
					'Sprite = ' . self::Sprite . PHP_EOL .
					'HP = ' . self::HP . PHP_EOL .
					'EnginePower = ' . self::EnginePower . PHP_EOL .
					'Speed = ' . self::Speed . PHP_EOL .
					'Handling = '. self::Handling . PHP_EOL .
					'Shield = ' . self::Shield . PHP_EOL .
					'Weapon = ' . self::Weapon . PHP_EOL .
					'Bouclier = ' .self::Bouclier . PHP_EOL .
					'PP = '. self::PP . ']' . PHP_EOL);
			return ('[Ship: {self::Name}]');
		}
		/*Constructor and Destructor*/
		public function __construct(array $kwargs) {
				/*Ship Details*/
			if (array_key_exists('name', $kwargs))
				$this->_Name = $kwargs['name'];
			if (array_key_exists('size', $kwargs))
				$this->_Size = $kwargs['size'];
			if (array_key_exists('sprite', $kwargs))
				$this->_Sprite = $kwargs['Sprite'];
			if (array_key_exists('hp', $kwargs))
				$this->_HP = $kwargs['hp'];
			if (array_key_exists('enginepower', $kwargs))
				$this->_EnginePower = $kwargs['enginepower'];
			if (array_key_exists('speed', $kwargs))
				$this->_Speed = $kwargs['speed'];
			if (array_key_exists('handling', $kwargs))
				$this->_Handling = $kwargs['handling'];
			if (array_key_exists('shield', $kwargs))
				$this->_Nam_Shielde = $kwargs['shield'];
			if (array_key_exists('weapon', $kwargs))
				$this->_Weapon = $kwargs['weapon'];
			if (array_key_exists('pp', $kwargs))
				$this->_PP = $kwargs['pp'];
				/*Movement and Positioning*/
			$this->_Position = (array_key_exists('position', $kwargs)) ? $kwargs['position'] : 
				array('x' => rand(15, 135), 'y' =>rand(15, 85));
			$this->_Angle = (array_key_exists('angle', $kwargs)) ? $kwargs['angle'] : 0;
			$this->_Velocity = (array_key_exists('velocity', $kwargs)) ? $kwargs['velocity'] : 0;
				/*Display*/
			if (self::$verbose == TRUE)
				print("Created: " . $this . PHP_EOPL);
			if (self::$interact == TRUE)
				print("A new {$this->_Name} vessile has been summoned into existance." . PHP_EOL);
		}
		public function __destruct() {
			if (self::$verbose == TRUE)
				print("Destructed: " . $this . PHP_EOPL);
		}
		/*Get and Set*/
		public function getArray() {
			return (array ('name' => $this->_Name, 'size' => $this->_Size,
							'sprite' => $this->_Sprite, 'hp' => $this->_HP,
							'enginepower' => $this->_EnginePower, 
							'speed' => $this->_Speed, 'handling' => $this->_Handling,
							'shield' => $this->_Shield, 'weapon' => $this->_Weapon));
		}
		public function getPos() {
			return ($this->_Position);
		}
		public function getVel() {
			return ($this->_Velocity);
		}
		/*Clone*/
		public function __clone() {
			return (new Ship($this->getArray()));
		}
		/*Methods*/
		public function TakeHit($damage) {
			//reduce shield, then reduce hp
			if ($this->_Shield > 0) {
				$damage -= $this->_Shield;
				$this->_Shield = ($damage >= $this->_Shield) ? 0 : $this->_Shield - $damage;
			}
			if ($damage > 0) {
				$this->_HP = ($damage >= $this->_HP) ? 0 : $this->_HP - $damage;
			}
			if (self::$interact == TRUE) {
				if ($this->_HP <= 0)
					print("Ship : {$this->_Name} took a hit, destroying it." . PHP_EOL);
				else
					print("Ship : {$this->_Name} took a hit, reducing it's HP to {$this->_HP}" . PHP_EOL);
			}
			return ($this->_HP);
		}
		public function InitRound() {
			//
		}
		public function SpendPP($kwargs) {
			//
		}
		public function AdjustVelocity() {
			//
		}
	}
?>