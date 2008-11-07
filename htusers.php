<?php
	require 'config.php';
	
	$file = file(ACESS_FILE);
	$users = array();
	
	while ( $file as $row => $line ) {
		$t = split(":", $line);	
		
		$users[] = array($t[0], $t[1]);
	}
?>