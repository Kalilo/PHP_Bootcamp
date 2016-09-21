<?php
 	
	 require_once 'Matrix.class.php';

class Matrix {

	/* Constants */

	const IDENTITY   = 1;
	const SCALE      = 2;
	const RX         = 3;
	const RY         = 4;
	const RZ         = 5;
	const PROJECTION = 6;

	/* Variables */

    private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color = NULL;
	public static $verbose = FALSE;

	/* Class Specific Methods */

	//Matrix mult( Matrix $rhs )
	//Vertex transformVertex( Vertex $vtx )

	private function _mult( Matrix $rhs )
	{

	}

	private function _transformVertex( Vertex $vtx )
	{

	}

	public function request( array $args)
	{
		$return;
		if (array_key_exists('x', $args))
			$return['x'] = $this->_x;
		if (array_key_exists('y', $args))
			$return['y'] = $this->_y;
		if (array_key_exists('z', $args))
			$return['z'] = $this->_z;
		if (array_key_exists('w', $args))
			$return['w'] = $this->_w;
		if (array_key_exists('color', $args))
			$return['color'] = $this->_color;
		return ($return);
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
		if (file_exists("Matrix.doc.txt"))
        	return (file_get_contents("Matrix.doc.txt"));
		else
			return ("Matrix.doc.txt is missing. Unable to print class documentation."); 
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

} 		
?>