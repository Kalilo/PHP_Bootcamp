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
	public function request( array $kwargs)
	{
		$return;
		if (array_key_exists('x', $kwargs))
			$return['x'] = $this->_x;
		if (array_key_exists('y', $kwargs))
			$return['y'] = $this->_y;
		if (array_key_exists('z', $kwargs))
			$return['z'] = $this->_z;
		if (array_key_exists('w', $kwargs))
			$return['w'] = $this->_w;
		if (array_key_exists('color', $kwargs))
			$return['color'] = $this->_color;
		return ($return);
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
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2)));/*returns a float*/
	}
	public function normalize() {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$length = sqrt(($tmp['x'] * $tmp['x']) + ($tmp['y'] * $tmp['y']) + ($tmp['z'] * $tmp['z']));
		$tmp['x'] *= (1 / $length);
		$tmp['y'] *= (1 / $length);
		$tmp['z'] *= (1 / $length);
		return new Vector($tmp);/*returns a vector*/
	}
	public function add( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$tmp['x'] += $this->_x;
		$tmp['y'] += $this->_y;
		$tmp['z'] += $this->_z;
		$tmp['w'] = ($tmp['w'] + $this->_w) / 2;
		return new Vector($tmp);/*returns a vector*/
	}
	public function sub( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$tmp['x'] = $this->_x - $tmp['x'];
		$tmp['y'] = $this->_y - $tmp['y'];
		$tmp['z'] = $this->_z - $tmp['z'];
		$tmp['w'] = ($tmp['w'] + $this->_w) / 2;
		return new Vector($tmp);/*returns a vector*/
	}
	public function opposite() {
		$tmp = $this->request(array ('x', 'y', 'z', 'w'));
		$tmp['x'] *= -1;
		$tmp['y'] *= -1;
		$tmp['z'] *= -1;
		return new Vector($tmp);/*returns a vector*/
	}
	public function scalarProduct( $k ) {
		$tmp = $this->request(array ('x', 'y', 'z', 'w'));
		$tmp['x'] *= $k;
		$tmp['y'] *= $k;
		$tmp['z'] *= $k;
		return new Vector($tmp);/*returns a vector*/
	}
	public function dotProduct( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$tmp['x'] *= $this->_x;
		$tmp['y'] *= $this->_y;
		$tmp['z'] *= $this->_z;
		$tmp['w'] = ($tmp['w'] + $this->_w) / 2;
		return new Vector($tmp);/*returns a vector*/
	}
	public function cos( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$len2 = sqrt(($tmp['x'] * $tmp['x']) + ($tmp['y'] * $tmp['y']) + ($tmp['z'] * $tmp['z']));
		$len1 = sqrt(($this->x * $this->x) + ($this->y * $this->y) + ($this->z * $this->z));
		$dot = $rhs->dotProduct($rhs);
		return ($dot) / ($len1 * $len2); /*returns a float*/
	}
	public function crossProduct( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));/*may have coded the wrong way around.*/
		$x = $tmp['x'];
		$y = $tmp['y'];
		$tmp['x'] = $this->y * $tmp['z'] - $this->z * $y;
		$tmp['y'] = $this->z * $x - $this->x * $tmp['z'];
		$tmp['y'] = $this->x * $x - $this->y * $y;
		return new Vector($tmp);/*returns a vector*/
	}
}
?>
