<?php
	interface IVessel {

		public function getName();
		public function getSize();
		public function getSprite();
		public function getPP();
		public function getHealth_max();
		public function getHealth();
		public function getShield();
		public function getSpeed();
		public function getMovability();
		public function getWeapons();

		function _setPP($v);
		function _setSpeed($v);
		function _setHealth($v);
		function _setShield($v);

		function _ratio_speed_size();
		function _calculate_damage();
		function _apply_damage();
		
		public function __toString(); 
		public static function doc();
	}
?>