<?php
Class Vector {
	/*Variables*/
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1;
	public  $verbose = FALSE;
	/*Standard Basic Methods*/
	public static function doc() {
			print(file_get_contents("./Vector.doc.txt"));
	}
	public function __toString() {
			return ("Vector( x:{$this->_x}, y:{$this->_y}, z:{$this->_z}, w:{$this->_x} )");
	}
	/*Constructor and Destructor*/
	public function __construct(array $kwargs) {
		if (array_key_exists('dest', $kwargs)) {
			//
		}
		if (array_key_exists('orig', $kwargs)) {
			//
		}
		if (self::$verbose == TRUE)
			print($this . " construced." . PHP_EOF);
	}
	public function __destruct() {
		//
		if (self::$verbose == TRUE)
			print($this . " destucted." . PHP_EOF);
	}
}
?>