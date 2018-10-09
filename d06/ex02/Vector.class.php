<?php

require_once 'Color.class.php';

class Vector {

	public static $verbose = FALSE;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	private $_dest;
	private $_orig;
	private $_normalized = FALSE;

	public function __construct(array $kwargs) {
		if (array_key_exists('orig', $kwargs))
			$this->_orig = $kwargs['orig'];
		else
			$this->_orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));
		if (array_key_exists('dest', $kwargs)) {
			$this->_dest = $kwargs['dest'];
			$this->_diff_vertex();
		}
		if (self::$verbose == TRUE)
			print(self::__toString() . " constructed" . PHP_EOL);
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			print(self::__toString() . " destructed" . PHP_EOL);
	}

	public function __toString() {
		$s = sprintf ("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
			$this->getX(), $this->getY(), $this->getZ(), $this->getW());
		return $s;
	}
	
	public function __clone() { return; }

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }
	public function getNormalized() { return $this->_normalized; }

	private function _setNormalized($bool) {
		$this->_normalized = $bool;
		return ;
	}

	public function magnitude() {
		$length = sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2) + pow($this->getW(), 2));
		return $length;
	}

	public function normalize() {
		if ($this->getNormalized != FALSE)
			return clone $this;
		else {
			$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
			$x_norm = $this->getX() / $this->magnitude();
			$y_norm = $this->getY() / $this->magnitude();
			$z_norm = $this->getZ() / $this->magnitude();
			$dest = new Vertex(array('x' => $x_norm, 'y' => $y_norm, 'z' => $z_norm));
			$vector =  new Vector(array('orig' => $orig, 'dest' => $dest));
			$this->_setNormalized(TRUE);
			return $vector;
		}
	}

	private function _diff_vertex() {
		$this->_x = $this->_dest->getX() - $this->_orig->getX();
		$this->_y = $this->_dest->getY() - $this->_orig->getY();
		$this->_z = $this->_dest->getZ() - $this->_orig->getZ();
		$this->_w = $this->_dest->getW() - $this->_orig->getW();
		return;
	}
	
	public static function doc() { return file_get_contents("Vector.doc.txt"); }

}

?>