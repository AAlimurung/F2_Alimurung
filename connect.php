<?php
	$connection = new mysqli('localhost', 'root', '', 'dbalimurungf2');
	if(!$connection){
		die(mysqli_error($connection));
	}

	session_start();
?>