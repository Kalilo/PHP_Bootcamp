<?php
 	
	 require_once 'Color.class.php';

class Vertex {

	/* Variables */

    private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color = NULL;
	public static $verbose = FALSE;

	/* Class Specific Methods */

	public function request( array $req_args)
	{
		$ret = array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1, 'color' => NULL);
		foreach ($req_args as $req)
		{
			if ($req == 'x')
				$ret['x'] = $this->_x;
			if ($req == 'y')
				$ret['y'] = $this->_y;
			if ($req == 'z')
				$ret['z'] = $this->_z;
			if ($req == 'w')
				$ret['w'] = $this->_w;
			if ($req == 'color')
				$ret['color'] = $this->_color;
		}
		return ($ret);
	}

	public function get( $arg )
	{
		$tmp = NULL;
		if ($arg = 'x')
			$tmp = $this->x;
		else if ($arg = 'y')
			$tmp = $this->y;
		else if ($arg = 'z')
			$tmp = $this->z;
		else if ($arg = 'w')
			$tmp = $this->w;
		else if ($arg = 'color')
			return ($tmp);
	}

	public function modify( array $kwargs )
	{
		if (array_key_exists('x', $kwargs))
			$this->_x = $kwargs['x'];
		if (array_key_exists('y', $kwargs))
			$this->_y   = $kwargs['y'];
		if (array_key_exists('z', $kwargs))
			$this->_z   = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w   = $kwargs['w'];
		if (array_key_exists('color', $kwargs) && is_int($kwargs['color']) === TRUE)
			$this->_color = new Color (array ('rgb' => $kwargs['color']));
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		if (self::$verbose == TRUE)
			print($this . PHP_EOF);
	}

	/* Basic Class Functions */

    public function doc() 
	{ 
		if (file_exists("Vertex.doc.txt"))
        	return (file_get_contents("Vertex.doc.txt"));
		else
			return ("Vertex.doc.txt is missing. Unable to print class documentation."); 
    }

	function __toString()
	{
		if (self::$verbose == TRUE)
			return ("Vertex( x: {$this->_x}, y:{$this->_y}, z: {$this->_z}, w: {$this->_w} , {$this->_color})");
		return ("Vertex( x: {$this->_x}, y:{$this->_y}, z: {$this->_z}, w: {$this->_w} )");
	}

	function __construct( array $kwargs )
	{
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
		{
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
		}
		if (array_key_exists('w', $kwargs))
			$this->_w   = $kwargs['w'];
		if (array_key_exists('color', $kwargs) && is_int($kwargs['color']) === TRUE)
			$this->_color = new Color (array ('rgb' => $kwargs['color']));
		else if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color (array ('rgb' => 0x00FFFFFF));
		if (self::$verbose == TRUE)
			print("$this constructed." . PHP_EOL);
	}

	function __destruct()
	{
		if (self::$verbose == TRUE)
			print("$this destructed." . PHP_EOL);
		unset($_r, $_g, $_b, $_w, $_color, $verbose);
	}
	/*Get methods*/
	public function getX () {
		$t = $this->_x;
		return ($t);
	}
	public function getY () {
		$t = $this->_y;
		return ($t);
	}
	public function getZ () {
		$t = $this->_Z;
		return ($t);
	}
	public function getW () {
		$t = $this->_w;
		return ($t);
	}
	public function getColor () {
		$t = $this->_color;
		return ($t);
	}
} 		
?>