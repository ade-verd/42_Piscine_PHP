<?php
	interface ILap {
		//Array vessels activated

		public function newlap($player);
		function _reload_pp($player);
		function _all_activated($player); //bool
		function _run();

		public function __toString(); 
		public static function doc();
	}
?>