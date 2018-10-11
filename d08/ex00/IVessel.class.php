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

		function _setPP();
		function _setSpeed();
		function _setHealth();
		function _setShield();

		function _ratio_speed_size();
		function _calculate_damage();
		function _apply_damage();
		
		public static function doc();
	}
?>