<?php

require_once 'Color.class.php';

class Vector {

	public static $verbose = FALSE;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	private $_normalized = FALSE;

	public function __construct(array $kwargs) {
		if (array_key_exists('orig', $kwargs))
			$orig = $kwargs['orig']
		else
			$orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0));
		if (array_key_exists('dest', $kwargs)) {
			$dest = $kwargs['dest'];
		}
		$this->_diff_vertex($dest, $orig);
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
			$x = $this->getX() / $this->magnitude();
			$y = $this->getY() / $this->magnitude();
			$z = $this->getZ() / $this->magnitude();
			$dest = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
			$vector =  new Vector(array('orig' => $orig, 'dest' => $dest));
			$this->_setNormalized(TRUE);
			return $vector;
		}
	}

	public function add(Vector $vect2)
	{
		$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$x = $this->getX() + $vect2->getX();
		$y = $this->getY() + $vect2->getY();
		$z = $this->getZ() + $vect2->getZ();
		$dest = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		$vector =  new Vector(array('orig' => $orig, 'dest' => $dest));
		return $vector;
	}

	public function sub(Vector $vect2)
	{
		$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$x = $this->getX() - $vect2->getX();
		$y = $this->getY() - $vect2->getY();
		$z = $this->getZ() - $vect2->getZ();
		$dest = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		$vector =  new Vector(array('orig' => $orig, 'dest' => $dest));
		return $vector;
	}

	public function opposite() {
		$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$dest = new Vertex(array('x' => $this->getX(), 'y' => $this->getY(), 'z' => $this->getZ()));
		$vector =  new Vector(array('orig' => $dest, 'dest' => $orig));
		return $vector;
	}

	public function scalarProduct($k)
	{
		$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$x = $this->getX() * $k;
		$y = $this->getY() * $k;
		$z = $this->getZ() * $k;
		$dest = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		$vector =  new Vector(array('orig' => $orig, 'dest' => $dest));
		return $vector;
	}

	public function dotProduct(Vector $vect2)
	{
		$x = $this->getX() * $vect2->getX();
		$y = $this->getY() * $vect2->getY();
		$z = $this->getZ() * $vect2->getZ();
		return $x + $y + $z;
	}

	public function cos(Vector $vect2)
	{
		$numerator = $this->dotProduct($vect2);
		$denominator = $this->magnitude() * $vect2->magnitude();
		return $numerator / $denominator;
	}

	public function crossProduct(Vector $vect2)
	{
		$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
		$x = ($this->getY() * $vect2->getZ()) - ($this->getZ() * $vect2->getY());
		$y = ($this->getZ() * $vect2->getX()) - ($this->getX() * $vect2->getZ());
		$z = ($this->getX() * $vect2->getY()) - ($this->getY() * $vect2->getX());
		$dest = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z));
		$vector =  new Vector(array('orig' => $orig, 'dest' => $dest));
		return $vector;
	}

	private function _diff_vertex(Vertex $dest, Vertex $orig) {
		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
		$this->_w = $dest->getW() - $orig->getW();
		return;
	}

	public static function doc() { return file_get_contents("Vector.doc.txt"); }

}

?>
