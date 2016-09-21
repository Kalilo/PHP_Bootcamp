<?php
Class Vector {
	/*Variables*/
	private $_dest;
	private $_orig;
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
			$this->_dest = $kwargs['dest'];
		}
		if (array_key_exists('orig', $kwargs)) {
			$this->_orig = $kwargs['orig'];
		}
		if (self::$verbose == TRUE)
			print($this . " construced." . PHP_EOF);
	}
	public function __destruct() {
		if (self::$verbose == TRUE)
			print($this . " destucted." . PHP_EOF);
	}
	/*Vector Calculations*/
	public function magnitude() {
		//return (float);
	}
	public function normalize() {
		//return (Vector);
	}
	public function add( Vector $rhs ) {
		//return (Vector);
	}
	public function sub( Vector $rhs ) {
		//return (Vector);
	}
	public function opposite() {
		//return (Vector);
	}
	public function scalarProduct( $k ) {
		//return (Vector);
	}
	public dotProduct( Vector $rhs ) {
		//return (float);
	}
	public cos( Vector $rhs ) {
		//return (flaot);
	}
	public function crossProduct( Vector $rhs ) {
		//return (Vector);
	}
}
?>
