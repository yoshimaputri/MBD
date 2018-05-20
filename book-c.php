<?php 
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$result = $db->query('SELECT * FROM users WHERE username = "'.$_POST['username'].'" AND password = MD5("'.$_POST['password2'].'")');
	$ada = $result->num_rows;
	$tmp = $_FILES["image"]["tmp_name"];
	$file_name = $_FILES["image"]["name"];
	if (move_uploaded_file($tmp, $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
	if($ada){
		$_SESSION['book']=true;
		$db->query("INSERT INTO booking (username,event,size,type,imgpath,image) VALUES('{$_POST['username']}','{$_POST['event']}','{$_POST['size']}','{$_POST['type']}','{$target_file}','file_get_contents($tmp)')");
		header('Location: myprof.php?booking=success');
		exit();
	}
	else{
		$_SESSION['book']=false;
		echo 'Username or Password not register yet.';
		exit();
	}
?>