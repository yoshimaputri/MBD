<?php 
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
	$result = $db->query('DELETE FROM users WHERE username = "'.$_POST['username'].'";');
	header('Location: logout.php?delete=success');
	exit();
?>
