<?php 
	require_once('connection.php');
	session_start();
	$result = $connection->query('SELECT * FROM user WHERE user_name = "'.$_POST['username'].'" AND user_pwd = "'.$_POST['password'].'"');
	$ada = $result->num_rows;
	if($ada){
		$_SESSION['login']=true;
		$temp = $result->fetch_array();
		
		$_SESSION['username']=$temp['user_name'];
		$_SESSION['email']=$temp['email'];
		
		setcookie('username', $_SESSION['username'], time()+3600);
		setcookie('email', $_SESSION['email'], time()+3600);
		
		header("Location: gotoevelist.php");
		exit();
	}
	else{
		$_SESSION['login']=false;
		echo 'Username or Password not register yet.';
		exit();
	}
?>