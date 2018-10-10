<?php
	class Lannister {
		protected $_family = array('male' => array("Jaime", "Tyrion"), 'female' => array("Cersei"));

		public function isfamily($partner)
		{
			foreach ($this->_family as $gender => $index) {
				foreach ($index as $name) {
					if ($name == get_class($partner))
						return $gender;
				}
			}
			return FALSE;
		}
	}
?>