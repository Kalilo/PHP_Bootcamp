<?php

Class Matrix 
{
	/*Constants*/
	const IDENTITY = 1;
	const TRANSLATION = 2;
	const SCALE = 3;
	const RX = 4;
	const RY = 5;
	const RZ = 6;
	const PROJECTION = 7;
	/*Public Variables*/
	public static $verbose = FALSE;
	public $preset = array(array(1, 0, 0, 0), array(0, 1, 0, 0), array(0, 0, 1, 0), array(0, 0, 0, 1));
	/*Constructor and Destructor*/
	public function __construct(array $kwargs) {
		if ($kwargs['preset'] == self::IDENTITY)
			$tmp = "IDENTITY";
		else if ($kwargs['preset'] == self::TRANSLATION) {
			$tmp = "TRANSLATION";
			$this->preset[0][3] = $kwargs['vtc']->getX();
			$this->preset[1][3] = $kwargs['vtc']->getY();
			$this->preset[2][3] = $kwargs['vtc']->getZ();
		}
		else if ($kwargs['preset'] == self::SCALE) {
			$tmp = "SCALE";
			$this->preset[0][0] = $kwargs['scale'];
			$this->preset[1][1] = $kwargs['scale'];
			$this->preset[2][2] = $kwargs['scale'];
		}
		else if ($kwargs['preset'] == self::RX) {
			$tmp = "OX ROTATION";
			$this->preset[2][1] = sin($kwargs['angle']);
			$this->preset[2][2] = cos($kwargs['angle']);
			$this->preset[1][1] = cos($kwargs['angle']);
			$this->preset[1][2] = -sin($kwargs['angle']);
		}
		else if ($kwargs['preset'] == self::RY) {
			$tmp = "OY ROTATION";
			$this->preset[2][0] = -sin($kwargs['angle']);
			$this->preset[0][0] = cos($kwargs['angle']);
			$this->preset[0][2] = sin($kwargs['angle']);
			$this->preset[2][2] = cos($kwargs['angle']);
		}
		else if ($kwargs['preset'] == self::RZ) {
			$tmp = "OZ ROTATION";
			$this->preset[0][0] = cos($kwargs['angle']);
			$this->preset[0][1] = -sin($kwargs['angle']);
			$this->preset[1][0] = sin($kwargs['angle']);
			$this->preset[1][1] = cos($kwargs['angle']);
		}
		else if ($kwargs['preset'] == self::PROJECTION) {
			$tmp = "PROJECTION";
			$near = $kwargs['near'];
			$far = $kwargs['far'];
			$scale = tan(deg2rad($kwargs['fov']) / 2);
			$scale2 = $scale;
			$neg_scale = -$scale2;
			$r = $scale * $kwargs['ratio'];
			$l = -$r;
			$this->preset[0][0] = 2 *  $near / ($r - $l);
			$this->preset[1][1] = 2 * $near / ($scale2 - $neg_scale);
			$this->preset[0][2] = ($r + $l) / ($r - $l);			
			$this->preset[1][2] = ($scale2 + $neg_scale) / ($scale2 - $neg_scale);
			$this->preset[2][2] = -($far + $near) / ($far - $near);
			$this->preset[3][2] = -1;
			$this->preset[2][3] = -2 * $far * $near / ($far - $near);
			$this->preset[3][3] = 0;
		}
		if (self::$verbose == TRUE)
			echo "Matrix ".$tmp." instance construced" . PHP_EOL;
	}
	public function __destruct() {
		if (self::$verbose == TRUE) {
			echo "Matrix instance destructed" . PHP_EOL;
			return ;
		}
	}
	/*To String*/
	private function _format_num($nb) {
		return number_format($nb, 2);
	}
	public function __toString() {
		return ("M | vtcX | vtcY | vtcZ | vtx0" . PHP_EOL
			   ."-----------------------------" . PHP_EOL
			   ."x | ".$this->_format_num($this->preset[0][0])." | ".
			   $this->_format_num($this->preset[0][1])." | ".
			   $this->_format_num($this->preset[0][2])." | ".
			   $this->_format_num($this->preset[0][3]). PHP_EOL
			   ."y | ".$this->_format_num($this->preset[1][0])." | ".
			   $this->_format_num($this->preset[1][1])." | ".
			   $this->_format_num($this->preset[1][2])." | ".
			   $this->_format_num($this->preset[1][3]). PHP_EOL
			   ."z | ".$this->_format_num($this->preset[2][0])." | ".
			   $this->_format_num($this->preset[2][1])." | ".
			   $this->_format_num($this->preset[2][2])." | ".
			   $this->_format_num($this->preset[2][3]). PHP_EOL
			   ."w | ".$this->_format_num($this->preset[3][0]).
			   " | ".$this->_format_num($this->preset[3][1])." | ".
			   $this->_format_num($this->preset[3][2])." | ".
			   $this->_format_num($this->preset[3][3]));
	}
	/*Standard*/
	public function transformVertex(Vertex $vtx) {
		$matrix_vtx = array($vtx->getX(), $vtx->getY(), $vtx->getZ());
		$matrix = array(0, 0, 0);
		$k = -1;
		while (++$k < 3) {
			$k = -1;
			while (++$k < 3) {
				$matrix[$k] = $matrix[$k] + $this->preset[$k][$k] * $matrix_vtx[$k];
			}
			$matrix[$k] = $matrix[$k] + $this->preset[$k][$k];
		}
		$new_vtx = new Vertex(array('x' => $matrix[0], 'y' => $matrix[1], 'z' => $matrix[2]));
		return ($new_vtx);
	}
	public function mult(Matrix $rhs) {
		$matrix = clone $rhs;
		$matrix->preset = array(array(0, 0, 0, 0), array(0, 0, 0, 0), array(0, 0, 0, 0), array(0, 0, 0, 0));
		$k = -1;
		while (++$k < 4) {
			$l = -1;
			while (++$l < 4) {
				$m = -1;
				while (++$m < 4)
					$matrix->preset[$k][$l] = $matrix->preset[$k][$l] + $this->preset[$k][$m] * $rhs->preset[$m][$l];
			}
		}
		return ($matrix);
	}
	/*Get*/
	public function getPreset() {
		return print_r($this->_preset);
	}
	/*Doc*/
	public static function doc() {
		return (file_get_contents("Matrix.doc.txt"));
	}
}
?>