<?php
	class Targaryen {
		public function resistsFire() { return False;}

		public function getBurned() {
			if ($this->resistsFire() == True)
				return "ermerges naked but unharmed";
			else
				return "burns alive";
		}
	}
?>