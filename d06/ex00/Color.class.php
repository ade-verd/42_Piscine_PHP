<?php

require_once 'Color.doc.php';

class Color {

	public $verbose = FALSE;

	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public function __construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs)) {
			// C = 256^2 * R + 256 * G + B;
			$this->_setRed($kwargs['rgb'] / (256 * 256));
			$this->_setGreen(($kwargs['rgb'] / 256) % 256);
			$this->_setBlue($kwargs['rgb'] % 256);
			printf ("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->getRed(), $this->getGreen(), $this->getBlue());
		} else {
			if (array_key_exists('red', $kwargs))
				$this->_setRed($kwargs['red']);
			if (array_key_exists('green', $kwargs))
				$this->_setGreen($kwargs['green']);
			if (array_key_exists('blue', $kwargs))
				$this->_setBlue($kwargs['blue']);
			printf ("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->getRed(), $this->getGreen(), $this->getBlue());
		}
	}

	public function getRed() { return $this->red; }
	public function getGreen() { return $this->green; }
	public function getBlue() { return $this->blue; }

	private function _setRed($newval) { 
		if ($newval >= 0 && $newval <= 255)
			$this->red = $newval;
		return;
	}
	private function _setGreen($newval) { 
		if ($newval >= 0 && $newval <= 255)
			$this->green = $newval;
		return;
	}
	private function _setBlue($newval) { 
		if ($newval >= 0 && $newval <= 255)
			$this->blue = $newval;
		return;
	}
	
	private function doc() { print_doc(); }

}

?>