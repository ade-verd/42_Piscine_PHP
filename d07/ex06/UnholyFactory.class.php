<?php
	class UnholyFactory {
		private static $_fighters_absorbed = array();

		private function _add_fighter_type($fighter)
		{
			$classname = get_class($fighter);
			$type = $fighter->get_Type();
			if (isset($this->_fighters_absorbed) && in_array($type, $this->_fighters_absorbed) == TRUE)
				return FALSE;
			else {
				$this->_fighters_absorbed[$classname] = $type; 
				return TRUE;
			}
		}
		
		private function _get_classname($str) {
			foreach ($this->_fighters_absorbed as $classname => $type) {
				if ($type == $str)
					return $classname;
			}
			return FALSE;
		}

		public function absorb($fighter)
		{
			if (get_parent_class($fighter) != "Fighter")
				print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
			elseif ($this->_add_fighter_type($fighter))
				print("(Factory absorbed a fighter of type " . $fighter->get_Type() . ")" . PHP_EOL);
			else
				print("(Factory already absorbed a fighter of type " . $fighter->get_Type() . ")" . PHP_EOL);
		}

		public function fabricate($what)
		{
			if (in_array($what, $this->_fighters_absorbed) == FALSE) 
				print("(Factory hasn't absorbed any fighter of type " . $what . ")" . PHP_EOL);
			else {
				print("(Factory fabricates a fighter of type " . $what . ")" . PHP_EOL);
				if ($classname = $this->_get_classname($what))
					return new $classname();
				else
					print ("Error while fabricating newclass called '" . $classname . "'" . PHP_EOL);
			}
		}
	}
?>