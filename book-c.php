<?php 
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$result = $db->query('SELECT * FROM user WHERE user_name = "'.$_POST['username'].'" AND user_pwd = "'.$_POST['password2'].'"');
	$ada = $result->num_rows;
	$tmp = $_FILES["image"]["tmp_name"];
	$file_name = $_FILES["image"]["name"];
	if (move_uploaded_file($tmp, $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
	if($ada){
		//$typename = $db->query('SELECT * FROM ')
		$_SESSION['book']=true;
		$db->query("INSERT INTO booking (book_id,user_id,post_id,type_id,size_id,book_quantity,book_status,book_totalharga) VALUES('b32','u01','p01','{$_POST['type']}','{$_POST['size']}','1','1','0')");
		header('Location: myprof.php?booking=success');
		exit();
	}
	else{
		$_SESSION['book']=false;
		echo 'Username or Password not register yet.';
		exit();
	}
?>