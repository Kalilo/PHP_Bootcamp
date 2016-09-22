<?php
	class Ships {
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
		/*Variables*/
		public static $verbose = FALSE;
		/*Standard Basic Methods*/
		public static function doc() {
			print(file_get_contents("./Ship.doc.txt"));
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
					'PP = '. self::PP . ']' . PHP_EOL);
			return ('[Ship: {self::Name}]');
		}
		/*Constructor and Destructor*/
		public function __construct(array $kwargs) {
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
			if (self::$verbose == TRUE)
				print("Created: " . $this . PHP_EOPL);
		}
		public function __destruct() {
			if (self::$verbose == TRUE)
				print("Destructed: " . $this . PHP_EOPL);
		}
		/*Get and Set*/
		public function getArray() {
			return (array ('name' => $this->_Name, 'size' => $this->_Size, 'sprite' => $this->_Sprite,
							'hp' => $this->_HP, 'enginepower' => $this->_EnginePower, 
							'speed' => $this->_Speed, 'handling' => $this->_Handling,
							'shield' => $this->_Shield, 'weapon' => $this->_Weapon));
		}
		/*Clone*/
		public function __clone() {
			return (new Ship($this->getArray()));
		}
		/*Methods*/
	}
?>