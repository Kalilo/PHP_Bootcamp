<?php
Class Vector {
	/*Variables*/
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0;
	private $_color;
	public static $verbose = FALSE;
	/*Standard Basic Methods*/
	public static function doc() {
			print(file_get_contents("./Vector.doc.txt"));
	}
	public function __toString() {
		if (self::$verbose == TRUE)
			return ("Vector( x:{$this->_x}, y:{$this->_y}, z:{$this->_z}, w:{$this->_w}, {$this->_color})");
		return ("Vector( x:{$this->_x}, y:{$this->_y}, z:{$this->_z}, w:{$this->_w} )");
	}
	public function request( array $req_args)
	{
		$ret = array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1, 'color' => NULL);
		foreach ($req_args as $req)
		{
			if ($req == 'x')
				$ret['x'] = $this->_x;
			else if ($req == 'y')
				$ret['y'] = $this->_y;
			else if ($req == 'z')
				$ret['z'] = $this->_z;
			/*else if ($req == 'w')
				$ret['w'] = $this->_w;to be added at a later stage*/
			else if ($req == 'color')
				$ret['color'] = $this->_color;
		}
		return ($ret);
	}
	/*Constructor and Destructor*/
	public function __construct(array $kwargs) {
		if (array_key_exists('orig', $kwargs) && array_key_exists('dest', $kwargs)) {
			$orig = $kwargs['orig']->request(array('x', 'y', 'z', 'w', 'color'));
			$dest = $kwargs['dest']->request(array('x', 'y', 'z', 'w', 'color'));
			//var_dump($orig);var_dump($kwargs['orig']);
			//var_dump($dest);
			$this->_x = $dest['x'] - $orig['x'];
			$this->_y = $dest['y'] - $orig['y'];
			$this->_z = $dest['z'] - $orig['z'];
			/*$this->_w = $dest['w'] - $orig['w'];to be added at a later stage*/
			$this->_color = $dest['color'];
		}
		else if (array_key_exists('dest', $kwargs)) {
			$dest = $kwargs['dest']->request(array('x', 'y', 'z', 'w'));
			$this->_x = $dest['x'];
			$this->_y = $dest['y'];
			$this->_z = $dest['z'];
			/*$this->_w = $dest['w'];to be added at a later stage*/
			$this->_color = $dest['color'];
		}
		else
			print('Error creating vector: No dest given.' . PHP_EOL);
		if (self::$verbose == TRUE)
			print($this . " construced." . PHP_EOL);
	}
	public function __destruct() {
		if (self::$verbose == TRUE)
			print($this . " destucted." . PHP_EOL);
	}
	/*Vector Calculations*/
	public function magnitude() {
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));/*returns a float*/
	}
	public function normalize() {
		$tmp = $this->request(array ('x', 'y', 'z'));
		$length = sqrt(($tmp['x'] * $tmp['x']) + ($tmp['y'] * $tmp['y']) + ($tmp['z'] * $tmp['z']));
		$tmp['x'] *= (1 / $length);
		$tmp['y'] *= (1 / $length);
		$tmp['z'] *= (1 / $length);
		$t = new Vertex(array ('x' => $tmp['x'], 'y' => $tmp['y'], 'z' => $tmp['z']));
		return new Vector(array ('dest' => $t));/*returns a vector*/
	}
	public function add( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$tmp['x'] += $this->_x;
		$tmp['y'] += $this->_y;
		$tmp['z'] += $this->_z;
		/*$tmp['w'] += $this->_w;to be added at a later stage*/
		$t = new Vertex(array ('x' => $tmp['x'], 'y' => $tmp['y'], 'z' => $tmp['z']));
		return new Vector(array ('dest' => $t));/*returns a vector*/
	}
	public function sub( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$tmp['x'] = $this->_x - $tmp['x'];
		$tmp['y'] = $this->_y - $tmp['y'];
		$tmp['z'] = $this->_z - $tmp['z'];
		/*$tmp['w'] = $this->_w - $tmp['w']; to be added at a later stage*/
		$t = new Vertex(array ('x' => $tmp['x'], 'y' => $tmp['y'], 'z' => $tmp['z']));
		return new Vector(array ('dest' => $t));/*returns a vector*/
	}
	public function opposite() {
		$tmp = $this->request(array ('x', 'y', 'z', 'w'));
		$tmp['x'] *= -1;
		$tmp['y'] *= -1;
		$tmp['z'] *= -1;
		$t = new Vertex(array ('x' => $tmp['x'], 'y' => $tmp['y'], 'z' => $tmp['z']));
		return new Vector(array ('dest' => $t));/*returns a vector*/
	}
	public function scalarProduct( $k ) {
		$tmp = $this->request(array ('x', 'y', 'z', 'w'));
		$tmp['x'] *= $k;
		$tmp['y'] *= $k;
		$tmp['z'] *= $k;
		$t = new Vertex(array ('x' => $tmp['x'], 'y' => $tmp['y'], 'z' => $tmp['z']));
		return new Vector(array ('dest' => $t));/*returns a vector*/
	}
	public function dotProduct( Vector $rhs ) {
		//return (v1->x * v2->x + v1->y * v2->y + v1->z * v2->z);
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$tmp['x'] *= $this->_x;
		$tmp['y'] *= $this->_y;
		$tmp['z'] *= $this->_z;
		return ($tmp['x'] + $tmp['y'] + $tmp['z']);/*returns a float*/
	}
	public function cos( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$len2 = sqrt(($tmp['x'] * $tmp['x']) + ($tmp['y'] * $tmp['y']) + ($tmp['z'] * $tmp['z']));
		$len1 = sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
		$dot = $rhs->dotProduct($this);
		return ($dot) / ($len1 * $len2); /*returns a float*/
	}
	public function crossProduct( Vector $rhs ) {
		$tmp = $rhs->request(array ('x', 'y', 'z'));
		$old_x = $this->_x;
		$old_y = $this->_y;
		$x = ($tmp['y'] * $this->_z - $tmp['z'] * $old_y) * -1;
		$y = ($tmp['z'] * $old_x - $tmp['x'] * $this->_z) * -1;
		$z = ($tmp['x'] * $old_y - $tmp['y'] * $old_x) * -1;
		$t = new Vertex(array ('x' => $x, 'y' => $y, 'z' => $z));
		return new Vector(array ('dest' => $t));/*returns a vector*/
	}
}
?>
