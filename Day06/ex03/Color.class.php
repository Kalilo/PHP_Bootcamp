<?php
 
class Color {

	/* Variables */

    public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	/* Class Specific Methods */

	public function add( Color $colour )
	{
		$newcolour = new Color ( array ('red' => $colour->red + $this->red, 'green' => $colour->green + $this->green, 'blue' => $colour->blue + $this->blue));
		return($newcolour);
	}

	public function sub( Color $colour )
	{
		$newcolour = new Color ( array ('red' => $colour->red - $this->red, 'green' => $colour->green - $this->green, 'blue' => $colour->blue - $this->blue));
		return($newcolour);
	}

	public function mult( $factor )
	{
		return(new Color ( array ('red' => $this->red * $factor, 'green' => $this->red * $factor, 'blue' => $this->red * $factor)));
	}

	private function _legitimize ()
	{
		$this->red =   abs(round($this->red, 0) % 256);
		$this->green = abs(round($this->green, 0) % 256);
		$this->blue =  abs(round($this->blue, 0) % 256);
	}

	/*Basic Class Functions */

    public function doc() 
	{ 
		if (file_exists("Color.doc.txt"))
        	return (file_get_contents("Color.doc.txt"));
		else
			return ("Color.doc.txt is missing. Unable to print class documentation."); 
    }

	function __toString()
	{
		return ("Color( red:  {$this->red}, green:  {$this->green}, blue:  {$this->blue} )");
	}

	function __construct( array $kwargs )
	{
		if (array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs) && array_key_exists('blue', $kwargs))
		{
			$this->red   = $kwargs['red'];
			$this->green = $kwargs['green'];
			$this->blue  = $kwargs['blue'];
		}
		else if (array_key_exists('rgb', $kwargs))
		{
			$this->red   = ($kwargs['rgb'] & 0x00FF0000) >> 16;
			$this->green = ($kwargs['rgb'] & 0x0000FF00) >> 8;
			$this->blue  = ($kwargs['rgb'] & 0x000000FF);
		}
		$this->_legitimize();
		if (self::$verbose == TRUE)
			print("Color( red:  {$this->red}, green:  {$this->green}, blue:  {$this->blue} ) constructed.\n");
	}

	function __destruct()
	{
		if (self::$verbose == TRUE)
			print("Color( red:  {$this->red}, green:  {$this->green}, blue:  {$this->blue} ) destructed.\n");
		unset($red, $green, $blue, $verbose);
	}

} 
?>