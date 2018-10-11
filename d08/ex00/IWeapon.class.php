<?php
	interface IVessel {

		public function getName();
		public function getAmmo();
		public function getScope();
		public function getEffect_area();

		function _setAmmo($v);

		function _calculate_effect_area();
		public function shoot();
		
		public function __toString(); 
		public static function doc();
	}
?>