<?php

class Matrix {

	public static $verbose = FALSE;

	private $_matrix = array();

	const IDENTITY = 1;
	const SCALE = 2;
	const RX = 3;
	const RY = 4;
	const RZ = 5;
	const TRANSLATION = 6;
	const PROJECTION = 7;

	private function _fill_matrix(Vector $vtcX, Vector $vtcY, Vector $vtcZ, Vector $vtc0) {
		$x = array($vtcX->getX(), $vtcY->getX(), $vtcZ->getX(), $vtc0->getX());
		$y = array($vtcX->getY(), $vtcY->getY(), $vtcZ->getY(), $vtc0->getY());
		$z = array($vtcX->getZ(), $vtcY->getZ(), $vtcZ->getZ(), $vtc0->getZ());
		$w = array($vtcX->getW(), $vtcY->getW(), $vtcZ->getW(), $vtc0->getW());
		$this->_matrix = array($x, $y, $z, $w);
	}

	public function __construct(array $kwargs) {
		if (array_key_exists('preset', $kwargs))
			$kwargs['preset'];
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
		
		$s = "M | vtcX | vtcY | vtcZ | vtxO\n";
		$s = $s."-----------------------------\n";
		$s = $s.sprintf("x | %.2f | %.2f | %.2f | %.2f\n", );

		return $s;
	}
	
	public function getX() { return $this->_x; }

	public static function doc() { return file_get_contents("Matrix.doc.txt"); }

}

?>