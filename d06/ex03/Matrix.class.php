<?php

class Matrix {

	public static $verbose = FALSE;

	private $_matrix = array();
	private $_preset = 0;

	private $_x = array(0, 0, 0, 0);
	private $_y = array(0, 0, 0, 0);
	private $_z = array(0, 0, 0, 0);
	private $_w = array(0, 0, 0, 0);

	const IDENTITY = 1;
	const SCALE = 2;
	const RX = 3;
	const RY = 4;
	const RZ = 5;
	const TRANSLATION = 6;
	const PROJECTION = 7;

	private $_presetArray = array("", "_identity", "_scale", "_rx", "_ry", "_rz", "_translation", "_projection");

	private function _identity() {
		print("Yesss" . PHP_EOL);
		$this->$_x = array(1, 0, 0, 0);
		$this->$_y = array(0, 1, 0, 0);
		$this->$_z = array(0, 0, 1, 0);
		$this->$_w = array(0, 0, 0, 1);
		if (self::$verbose == TRUE)
		{
			print("Matrice IDENTITY instance constructed" . PHP_EOL);
		}
	}

	private function _fill_matrix(Vector $vtcX, Vector $vtcY, Vector $vtcZ, Vector $vtc0) {
		$x = array($vtcX->getX(), $vtcY->getX(), $vtcZ->getX(), $vtc0->getX());
		$y = array($vtcX->getY(), $vtcY->getY(), $vtcZ->getY(), $vtc0->getY());
		$z = array($vtcX->getZ(), $vtcY->getZ(), $vtcZ->getZ(), $vtc0->getZ());
		$w = array($vtcX->getW(), $vtcY->getW(), $vtcZ->getW(), $vtc0->getW());
		$this->_matrix = array($x, $y, $z, $w);
	}

	public function __construct(array $kwargs) {
		if (array_key_exists('preset', $kwargs) && $kwargs['preset'] > 0 && $kwargs['preset'] <= 7)
			$this->_presetArray[$kwargs['preset']]();
//		if (self::$verbose == TRUE)
//			print(self::__toString() . " constructed" . PHP_EOL);
		$i = 0;
		while ($i < 8)
		{
			print($i . ":" . $this->_presetArray[$i] . PHP_EOL);
			$i++;
		}
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			print("Matrice instance destructed" . PHP_EOL);
	}

	public function __toString() {
		$s = "M | vtcX | vtcY | vtcZ | vtxO\n";
		$s = $s."-----------------------------\n";
		$s = $s.sprintf("x | %.2f | %.2f | %.2f | %.2f\n", $this->_x[0], $_x[1], $_x[2], $_x[3]);
		$s = $s.sprintf("y | %.2f | %.2f | %.2f | %.2f\n", $_y[0], $_y[1], $_y[2], $_y[3]);
		$s = $s.sprintf("z | %.2f | %.2f | %.2f | %.2f\n", $_z[0], $_z[1], $_z[2], $_z[3]);
		$s = $s.sprintf("w | %.2f | %.2f | %.2f | %.2f\n", $_w[0], $_w[1], $_w[2], $_w[3]);

		return $s;
	}

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }

	public static function doc() { return file_get_contents("Matrix.doc.txt"); }

}

?>
