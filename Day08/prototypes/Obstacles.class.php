<?php
	class Obstacles {
		/*Variables*/
		private $_Name = NULL;
		private $_Size = array('x' => 1, 'y' => 1);
		private $_Position = array('x' => 0, 'y' => 0);
		public static $interact = FALSE;
		public static $verbose = FALSE;
		/*Basic Standard*/
		public static function doc() {
			print(file_get_contents("./obstacles.doc.txt"));
		}
		public function __toString() {
			if (self::$verbose == TRUE)
				return ("[{$this->_Name} :" .
					" size : ({$this->_Size['x']};{$this->_Size['y']}) ;" .
					" Position: ({$this->_Position['x']};{$this->_Position['y']})]" . PHP_EOL);
			return ("{$this->_Name}");
		}
		/*Constructor And Destructor*/
		public function __construct($kwargs) {
			if (array_key_exists('name', $kwargs))
				$this->_Name = $kwargs['name'];
			if (array_key_exists('position', $kwargs))
				$this->_Position = $kwargs['position'];
			if (array_key_exists('size'))
				$this->_Size = $kwargs['size'];
			if (self::$verbose == TRUE)
				print("Constructed: " . $this . PHP_EOL);
			if (self::$interact == TRUE)
				print("{$this->_Name} appeared. Be amazed at it's capability." . PHP_EOL);
		}
		public function __destruct() {
			if (self::$interact == TRUE)
				print("{$this->_Name} Vaporized. " . 
				"A reminder of how brittle the universe's fabric is." . PHP_EOL);
			if (self::$verbose == TRUE)
				print("Destructed: " . $this . PHP_EOL);
		}
		/*Get*/
		public function getSize() {
			$t = $this->_Size;
			return ($t);
		}
		public function getPos() {
			$t = $this->_Position;
			return ($t);
		}
		public function getCoords() {
			for ($k = 0; $k < $this->_Size['x']; $k++) {
				for ($l = 0; $l < $this->_Size['y']; $l++) {
					$arr[] = array('x' => ($this->_Position['x'] + $k),
						'y' => ($this->_Position['y'] + $l));
				}
			}
			return ($arr);
		}
		/*Methods*/
	}
?>