<?php
	class Jaime extends Lannister {
		public function sleepwith($partner) {
			if (($gender = $this->isfamily($partner)) == "male")
				print( "Not even if I'm drunk !" . PHP_EOL);
			elseif (($gender = $this->isfamily($partner)) == "female")
				print( "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
			else
				print( "Let's do this." . PHP_EOL);
		}
	}
?>