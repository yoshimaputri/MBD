<?php 
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
	if($_POST['password'] == $_POST['password2']){
		$ada = $db->query("SELECT 1 FROM users WHERE email = '".$_POST['email']."'")->num_rows;
		if(!$ada){
			$db->query("INSERT INTO users (fname,lname,city,username,email,password) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['city']."','".$_POST['username']."','".$_POST['email']."',MD5('".$_POST['password']."'))");
			//echo '<script language="javascript">alert("Successfully Register!");</script>';
			header('Location: index.php?register=success');
			exit;
		}
		else{
			header('Location: register.php?err=Your email is already used.');
		}
	}
	else{
		header('Location: register.php?retype_password=incorrect');
	}
?> 