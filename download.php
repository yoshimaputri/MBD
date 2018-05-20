<?php
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

	if (isset($_GET['download'])) {
		$id = $_GET['download'];

		$res = $db->query('SELECT imgpath FROM booking WHERE username = "'.$_SESSION['username'].'" or username = "'.$_COOKIE['username'].'"');

		list($content) = mysqli_fetch_array($res);
	// echo ('SELECT image FROM booking WHERE username = "'.$_POST['username']'" or username  = "'.$_SESSION['username']'"');
	$filepath = $content;

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
	header('Content-Length: ' . filesize($filepath));
	readfile($filepath);
}
?>