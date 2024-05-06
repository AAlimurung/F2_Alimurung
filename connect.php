<head>
	<meta charset = "UTF-8">
	<title>CONQuest: Event Planner</title>
	<link rel="icon" type="images/x-icon" href="images/icon.png">
	<link rel="stylesheet" href="css/common-styles.css" type="text/css">
</head>

<?php
	$connection = new mysqli('localhost', 'root', '', 'dbalimurungf2');
	if(!$connection){
		die(mysqli_error($connection));
	}

	session_start();
?>