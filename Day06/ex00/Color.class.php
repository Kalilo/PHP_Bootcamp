<?php
	class Color {
		/*Variables*/
		public $red = 0;
		public $green = 0;
		public $blue = 0;
		public static $verbose = FALSE;

		/*Standard Basic Methods*/
		public static function doc() {
			print(file_get_contents("./Color.doc.txt"));
		}
		public function __toString() {
				return ("Color( red:\t{$this->red}, green:\t{$this->green}, blue:\t{$this->blue} )");
		}
		/*Constructor and Destructor*/
		public function __construct(array $kwargs) {
			if (array_key_exists('verbose', $kwargs) || array_key_exists('v', $kwargs))
				$this->verbose = TRUE;
			if (array_key_exists('rgb', $kwargs))
			{
				$this->red = ($kwargs['rgb'] & 0b00000000111111110000000000000000) >> 16;
				$this->green = ($kwargs['rgb'] & 0b00000000000000001111111100000000) >> 8;
				$this->blue = ($kwargs['rgb'] & 0b00000000000000000000000011111111);
			}
			if (array_key_exists('red', $kwargs))
				$this->red = $kwargs['red'];
			if (array_key_exists('green', $kwargs))
				$this->green = $kwargs['green'];
			if (array_key_exists('blue', $kwargs))
				$this->blue = $kwargs['blue'];
			$this->_mod();
			if (self::$verbose == TRUE)
				print("Color( red:\t{$this->red}, green:\t{$this->green}, blue:\t{$this->blue} ) constructed." . PHP_EOL);
		}
		public function __destruct() {
			if (self::$verbose == TRUE)
				print("Color( red:\t{$this->red}, green:\t{$this->green}, blue:\t{$this->blue} ) destructed." . PHP_EOL);
				
		}
		/*Methods*/
		private function _mod() {
			$this->red = round($this->red, 0) % 256;
			$this->green = round($this->red, 0) % 256;
			$this->blue = round($this->red, 0) % 256;
		}
		public function add(Color $col) {
			return new Color(array('red' => ($this->red + $col->red), 'green' => ($this->green + $col->green), 'blue' => ($this->blue + $col->blue)));
		}
		public function sub(Color $col) {
			return new Color(array('red' => ($this->red - $col->red), 'green' => ($this->green - $col->green), 'blue' => ($this->blue - $col->blue)));			
		}
		public function mult($value) {
			return new Color(array('red' => ($this->red * $value), 'green' => ($this->green * $value), 'blue' => ($this->blue * $value)));	
		}
		/*Other*/
	}
?>