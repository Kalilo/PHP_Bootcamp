<?php
 
class Vertex {

	/* Variables */

    private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1;
	private $_color = 0;
	public static $verbose = FALSE;

	/* Class Specific Methods */

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
		if (array_key_exists('color', $kwargs))
			$this->_color = new Color (array ('rgb' => $kwargs['color']));
		else
			$this->_color = new Color (array('rgb' => 0xFFFFFF));
		if (self::$verbose == TRUE)
			print($this . PHP_EOF);
	}

	/*Basic Class Functions */

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
			return ("Vertex( x: {$this->_x}, y:{$this->_y}, z: {$this->_z}, w: {$this->_w} ), {$this->_color})");
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
		if (array_key_exists('color', $kwargs))
			$this->_color = new Color (array ('rgb' => $kwargs['color']));
		if (self::$verbose == TRUE)
			print($this . " constructed." . PHP_EOL);
	}

	function __destruct()
	{
		if (self::$verbose == TRUE)
			print($this . " destructed." . PHP_EOL);
		unset($red, $green, $blue, $verbose);
	}

} 
?>