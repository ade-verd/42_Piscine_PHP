<?php
	interface IArea {
		const AREAH = 100;
		const AREAW = 150;

		const POINT1 = array('point' => array(13, 51));
		const POINT2 = array('point' => array(45, 67));
		const POINT3 = array('point' => array(34, 83));
		const WALL1 = array('from' => array(67, 44), 'to' => array(78, 44));
		const WALL2 = array('from' => array(29, 53), 'to' => array(42, 53));
		const WALL4 = array('from' => array(63, 60), 'to' => array(63, 69));
		const WALL3 = array('from' => array(23, 66), 'to' => array(23, 72));
		const WALL5 = array('from' => array(54, 85), 'to' => array(74, 85));
		const WALL6 = array('from' => array(13, 93), 'to' => array(26, 93));

		public function initialize($obstacles, $player1, $player2);
		public function actualize($player1, $player2);

		public function __toString(); 
		public static function doc();
	}
?>