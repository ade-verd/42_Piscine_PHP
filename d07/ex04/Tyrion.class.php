<?php
	class Tyrion extends Lannister {
		public function sleepwith($partner) {
			if (!$this->isfamily($partner))
				print( "Let's do this." . PHP_EOL);
			else
				print( "Not even if I'm drunk !" . PHP_EOL);
		}
	}
?>