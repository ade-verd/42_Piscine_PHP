<?php

	require_once 'Color.class.php';
	Color::$verbose = True;

#	print( Color::doc() );
	$red     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
	$green   = new Color( array( 'rgb' => 255 << 8 ) );
	$blue    = new Color( array( 'red' => 0   , 'green' => 0   , 'blue' => 0xff ) );
?>