<?php
	class NightsWatch {
		private $_fighters = array();

		public function recruit($fighter) {
			$methods = get_class_methods($fighter);

			foreach ($methods as $method) {
				if (stristr($method, "fight"))
					$this->_fighters[] = $fighter;
			}
		}

		public function fight() {
			foreach ($this->_fighters as $fighter)
				$fighter->fight();
		}
	}
?>