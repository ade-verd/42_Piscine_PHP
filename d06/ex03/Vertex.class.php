<?php

require_once 'Color.class.php';

class Vertex {

	public static $verbose = False;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color;

	public function __construct(array $kwargs) {
		if (array_key_exists('x', $kwargs))
			$this->setX($kwargs['x']);
		if (array_key_exists('y', $kwargs))
			$this->setY($kwargs['y']);
		if (array_key_exists('z', $kwargs))
			$this->setZ($kwargs['z']);
		if (array_key_exists('w', $kwargs))
			$this->setW($kwargs['w']);
		if (array_key_exists('color', $kwargs))
			$this->setColor($kwargs['color']);
		else
			$this->setColor(new Color(array('red' => 255, 'green' => 255, 'blue' => 255)));
		if (self::$verbose == TRUE)
			print(self::__toString() . " constructed" . PHP_EOL);
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			print(self::__toString() . " destructed" . PHP_EOL);
	}

	public function __toString() {
		$color_verb = "";
		if (self::$verbose == TRUE)
			$color_verb = ", ".$this->getColor();
		$s = sprintf ("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f%s )",
			$this->getX(), $this->getY(), $this->getZ(), $this->getW(), $color_verb);
		return $s;
	}

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }
	public function getColor() { return $this->_color; }

	public function setX($newval) {
		$this->_x = $newval;
		return;
	}

	public function setY($newval) {
		$this->_y = $newval;
		return;
	}
	
	public function setZ($newval) {
		$this->_z = $newval;
		return;
	}
	
	public function setW($newval) {
		$this->_w = $newval;
		return;
	}
	
	public function setColor($newval) {
		$this->_color = $newval;
		return;
	}
	
	public static function doc() { return file_get_contents("Vertex.doc.txt"); }

}

?>