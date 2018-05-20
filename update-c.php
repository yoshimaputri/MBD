<?php 
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
	
	$result = $db->query('UPDATE users SET '.$_POST['edit'].' = "'.$_POST['data'].'" WHERE username = "'.$_POST['username'].'"');
	// echo ('UPDATE users SET "'.$_POST['edit'].'" = "'.$_POST['data'].'" WHERE username = "'.$_POST['username'].'"');
	if ($result) {
		header('Location: myprof.php?edit=success');
	}
	
?>