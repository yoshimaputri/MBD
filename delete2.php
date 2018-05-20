<?php 
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
	if ($_POST['yes']) {
		header('Location: delete-c.php?delete=next');
	}
	else{
		header('Location: myprof.php?delete=failed');
	}
?>
