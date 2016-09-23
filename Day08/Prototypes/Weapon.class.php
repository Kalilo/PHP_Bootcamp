<?php
	abstract class Weapon 
	{

		/* Variables */
		private $_name = NULL;
		private $_charge = 0;
		private $_srange = 0;
		private $_mrange = 0;
		private $_lrange = 0;
		private $_firingdirs = array ();
		private $_desc = NULL;

		public static $verbose = FALSE;

		/* Class Specific Methods */

		abstract public function fire($kwargs);
	
		/*Get and Set*/
		public function setCharge($charge) {
			$this->_charge = CHARGE;
			$this->_charge += $charge;
		}

		/* Basic Class Methods */

		public static function doc() 
		{
			if (file_exists("Weapon.doc.txt"))
        		print (file_get_contents("Weapon.doc.txt"));
			else
				print ("Weapon.doc.txt is missing. Unable to print class documentation."); 
		}

		public function __toString() 
		{
			if (self::$verbose == TRUE)
				return ('[Weapon:' . PHP_EOL .
					'Weapon Name = ' . self::_name . PHP_EOL .
					'Charge = ' . self::_charge . PHP_EOL .
					'Short Range = ' . self::_srange . PHP_EOL .
					'Medium Range = ' . self::_mrange . PHP_EOL .
					'Long Range = ' . self::_lrange . PHP_EOL .
					'Firing Directions = '. self::_firingdirs . PHP_EOL .
					'Description = ' . self::_desc . PHP_EOL);
			return ('[Weapon: {self::_name}]');
		}

		public function __construct(array $kwargs) 
		{
			if (self::$verbose == TRUE)
				print("Created: " . $this . PHP_EOPL);
		}

		public function __destruct() {
			if (self::$verbose == TRUE)
				print("Destructed: " . $this . PHP_EOPL);
		}

		
		public function getArray() {
			return (
			array (
			'name' => $this->_name, 
			'charge' => $this->_charge, 
			'srange' => $this->_srange,
			'mrange' => $this->_mrange, 
			'lrange' => $this->_lrange, 
			'firingdirs' => $this->_firingdir,
			'desc' => $this->_desc
			));
		}
		
		public function __clone() {
			return (new Weapon($this->getArray()));
		}

	}
?>