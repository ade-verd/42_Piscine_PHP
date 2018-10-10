<?php
	abstract class Fighter {
		private $_type = "";

		public function get_Type() { return $this->_type; }

		private function _set_Type($type) { $this->_type = $type; }

		public function __construct($type) {
			$this->_set_Type($type);
			return ;
		}

		abstract public function fight($target);
	}
?>