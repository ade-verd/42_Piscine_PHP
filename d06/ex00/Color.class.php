<?php

class Color {

	public static $verbose = False;

	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public function __construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs)) {
			// C = 256^2 * R + 256 * G + B;
			$this->_setRed($kwargs['rgb'] / (256 * 256));
			$this->_setGreen(($kwargs['rgb'] / 256) % 256);
			$this->_setBlue($kwargs['rgb'] % 256);
		} else {
			if (array_key_exists('red', $kwargs))
				$this->_setRed($kwargs['red']);
			if (array_key_exists('green', $kwargs))
				$this->_setGreen($kwargs['green']);
			if (array_key_exists('blue', $kwargs))
				$this->_setBlue($kwargs['blue']);
		}
		if (self::$verbose == TRUE)
			print(self::__toString() . " constructed." . PHP_EOL);
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			print(self::__toString() . " destructed." . PHP_EOL);
	}

	public function __toString() {
		$s = sprintf ("Color( red: %3d, green: %3d, blue: %3d )", $this->getRed(), $this->getGreen(), $this->getBlue());
		return $s;
	}

	public function add($class) {
		$array = array();
		$array['red'] = $this->getRed() + $class->getRed();
		$array['green'] = $this->getGreen() + $class->getGreen();
		$array['blue'] = $this->getBlue() + $class->getBlue();
		return new Color($array);
	}

	public function getRed() { return $this->red; }
	public function getGreen() { return $this->green; }
	public function getBlue() { return $this->blue; }

	private function _setRed($newval) {
		$newval = intval($newval); 
		if ($newval >= 0 && $newval <= 255)
			$this->red = $newval;
		return;
	}
	private function _setGreen($newval) { 
		$newval = intval($newval); 
		if ($newval >= 0 && $newval <= 255)
			$this->green = $newval;
		return;
	}
	private function _setBlue($newval) { 
		$newval = intval($newval); 
		if ($newval >= 0 && $newval <= 255)
			$this->blue = $newval;
		return;
	}
	
	public static function doc() { return file_get_contents("Color.doc.txt"); }

}

?>