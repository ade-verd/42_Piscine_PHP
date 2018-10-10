<?php
	class House {
		public function introduce() {
			print("House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : ");
			print('"' . $this->getHouseMotto() . '"' . PHP_EOL);
		}

		function __get($att) {
			print("Attempt to access '".$att."' attribute, this script should die".PHP_EOL);
			return ("Error");
		}

		function __set($att, $value) {
			print("Attempt to set '".$att."' attribute to '".$value."', this script should die".PHP_EOL);
		}
	}
?>