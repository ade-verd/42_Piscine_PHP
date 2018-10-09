<?php

require_once 'Color.doc.php';

class Color {

	public $verbose = FALSE;

	private $_red = 0;
	private $_green = 0;
	private $_blue = 0;

	public function __construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs)) {
			if (array_key_exists('red', $kwargs['rgb']))
				$this->_red = $kwargs['rgb']['red'];
			if (array_key_exists('green', $kwargs['rgb']))
				$this->_green = $kwargs['rgb']['green'];
			if (array_key_exists('blue', $kwargs['rgb']))
				$this->_blue = $kwargs['rgb']['blue'];
		} else {
			if (array_key_exists('red', $kwargs))
				$this->_red = $kwargs['red'];
			if (array_key_exists('green', $kwargs))
				$this->_green = $kwargs['green'];
			if (array_key_exists('blue', $kwargs))
				$this->_blue = $kwargs['blue'];
		}
	}

	public function getRed() { return $this->_red; }
	public function getGreen() { return $this->_Green; }
	public function getBlue() { return $this->_Blue; }

	public function doc() { print_doc(); }

}

?>