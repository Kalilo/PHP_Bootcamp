<?php
Class Vector {
	/*Variables*/
	private $_x;
	private $_y;
	private $_z;
	private $_w;
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
		if (array_key_exists('orig', $kwargs) && array_key_exists('dest', $kwargs)) {
			$orig = $kwargs['orig']::get(array('x', 'y', 'z', 'w'));
			$dest = $kwargs['dest']::get(array('x', 'y', 'z', 'w'));
			$this->_x = $dest['x'] - $orig['x'];
			$this->_y = $dest['y'] - $orig['y'];
			$this->_z = $dest['z'] - $orig['z'];
			$this->_w = ($dest['w'] + $orig['w']) / 2;
		}
		else if (array_key_exists('dest', $kwargs)) {
			$dest = $kwargs['dest']::get(array('x', 'y', 'z', 'w'));
			$this->_x = $dest['x'];
			$this->_y = $dest['y'];
			$this->_z = $dest['z'];
			$this->_w = $dest['w'];
		}
		else
			die('Error creating vector: No dest given.' . PHP_EOL);
		if (self::$verbose == TRUE)
			print($this . " construced." . PHP_EOF);
	}
	public function __destruct() {
		if (self::$verbose == TRUE)
			print($this . " destucted." . PHP_EOF);
	}
	/*Vector Calculations*/
	public function magnitude() {
		$tmp = this->sub(_orig);
		//return (float);
		return (sqrt(pow($tmp::get(array('x')), 2) + pow($tmp::get(array('y')), 2)));
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
