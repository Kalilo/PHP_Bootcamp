<?php

require_once  "Weapon.class.php";

	abstract class Weapon 
	{

		/* Constants */
		const NAME       = "Nautical Lance";
		const CHARGE     = 0;
		const SRANGE     = 30;
		const MRANGE     = 60;
		const LRANGE     = 90;
		const FIRINGDIRS = "Forward";
		const DESC       = "A high powered beam of energy blasts a circular whole in 
		anything unfortunate enough to be in front of this powerful but narrow shot. 
		Can only hit a single enemy in a straight line from the fore of the ship.";

		/* Variables */
		private $_name       = NAME;
		private $_charge     = CHARGE;
		private $_srange     = SRANGE;
		private $_mrange     = MRANGE;
		private $_lrange     = LRANGE;
		private $_firingdirs = FIRINGDIRS;
		private $_desc       = DESC;

		public static $verbose = FALSE;

		/* Class Specific Methods */

		public function fire( $kwargs )
		{
			if(array_key_exists('char', $kwargs))
			{
				if(array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs))
				{
					if (array_key_exists('map', $kwargs))
					{
						if (array_key_exists('angle', $kwargs))
						{
							$yindex = 0;
							$xindex = 0;
							$enemyx = NULL;
							$enemyy = NULL;
							$dist   = NULL;
							$damage = 0;
							while ($kwargs['map'][$yindex])
							{
								while ($kwargs['map'][$yindex][$xindex])
								{
									if ($kwargs['angle'] == 'n' && $yindex < $kwargs['y'])
										if ($kwargs['map'][$yindex][$xindex] != $kwargs['char'] || $kwargs['map'][$yindex][$xindex] != '.')
											if ($yindex > $enemyy)
											{
												$enemyx = $xindex;
												$enemyy = $yindex;
											}
									if ($kwargs['angle'] == 'e' && $xindex < $kwargs['x'])
										if ($kwargs['map'][$yindex][$xindex] != $kwargs['char'] || $kwargs['map'][$yindex][$xindex] != '.')
											if ($xindex > $enemyx)
											{
												$enemyx = $xindex;
												$enemyy = $yindex;
											}
									if ($kwargs['angle'] == 's' && $yindex > $kwargs['y'])
										if ($kwargs['map'][$yindex][$xindex] != $kwargs['char'] || $kwargs['map'][$yindex][$xindex] != '.')
											if ($yindex < $enemyy)
											{
												$enemyx = $xindex;
												$enemyy = $yindex;
											}
									if ($kwargs['angle'] == 'w' && $xindex > $kwargs['x'])
										if ($kwargs['map'][$yindex][$xindex] != $kwargs['char'] || $kwargs['map'][$yindex][$xindex] != '.')
											if ($xindex > $enemyx)
											{
												$enemyx = $xindex;
												$enemyy = $yindex;
											}
									$xindex++;
								}
								$yindex++;							
							}
							if ($enemyx == NULL || $enemyy == NULL)
							{
								print("Commander! The $this attempted to fire but the enemy was out of of our firing arc!");
								return ($damage);
							}
							$dist = ($kwargs['x'] - $enemyx)/($kwargs['y'] - $enemyy);
							if ($dist > LRANGE)
							{
								while ($_charge > 0)
								{
									$roll += (rand() % 6) + 1;
									if ($roll > 5)
									{
										print("Commander! The $this is firing at the enemy! It rolled a $roll and HIT!");
										$damage += $roll;
									}
									else
										print("Commander! The $this is firing at the enemy! It rolled a $roll and MISSED!");
								}
								return ($damage);
							}
							if ($dist > MRANGE)
							{
								while ($_charge > 0)
								{
									$roll += (rand() % 6) + 1;
									if ($roll > 4)
									{
										print("Commander! The $this is firing at the enemy! It rolled a $roll and HIT!");
										$damage += $roll;
									}
									else
										print("Commander! The $this is firing at the enemy! It rolled a $roll and MISSED!");
								}
								return ($damage);
							}
							if ($dist > SRANGE)
							{
								while ($_charge > 0)
								{
									$roll += (rand() % 6) + 1;
									if ($roll > 3)
									{
										print("Commander! The $this is firing at the enemy! It rolled a $roll and HIT!");
										$damage += $roll;
									}
									else
										print("Commander! The $this is firing at the enemy! It rolled a $roll and MISSED!");
								}
								return ($damage);
							}
						}
						else
							print("Commander! The $this attempted to fire but we don't even know which way we're facing! (ANGLE KEYWORD UNDEFINED)");
					}
					else
						print("Commander! The $this attempted to fire but we don't even know where we are! (MAP KEYWORD UNDEFINED)");
				}
				else
					print("Commander! The $this attempted to fire but the targetting reticule is missing! (X/Y KEYWORDS UNDEFINED)");
			}
			else
				print("Commander! The $this attempted to fire but the targetting systems are jammed! (CHAR KEYWORD UNDEFINED)");
		}

		/* Basic Class Methods */

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
			return ('[{self::_name}]');
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

		public function __clone() {
			return (new Weapon($this->getArray()));
		}

	}
?>