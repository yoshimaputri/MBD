<?php 
	require('configuration.php');
	session_start();
	$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$result = $db->query('SELECT * FROM user WHERE user_name = "'.$_POST['username'].'" AND user_pwd = "'.$_POST['password2'].'"');
	$userid = $result->fetch_assoc();
	$ada = $result->num_rows;
	$tmp = $_FILES["image"]["tmp_name"];
	$file_name = $_FILES["image"]["name"];
	if (move_uploaded_file($tmp, $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
	if($ada){
		$bookid = $db->query('SELECT COUNT(book_id)+1 as total FROM booking');
		$data = $bookid->fetch_assoc();
		$bookid = "b".$data['total'];
		$date = date('Y-m-d');
		$_SESSION['book']=true;
		$db->query("INSERT INTO booking VALUES('{$bookid}','{$userid['user_id']}','{$_POST['postid']}','{$_POST['type']}','{$_POST['size']}','{$date}','1','0','{$target_file}','file_get_contents($tmp)','0')");
		$db->query("UPDATE booking
		JOIN post ON booking.`post_id` = post.`post_id`
		join user on user.user_id = booking.user_id and user.user_name = {$userid['user_name']}
		JOIN size ON booking.`size_id` = size.`size_id`
		JOIN detil_harga ON size.`size_id` = detil_harga.`size_id` 
		JOIN menambah ON booking.`book_id` = menambah.`book_id`
		JOIN item ON menambah.`item_id` = item.`item_id`
		AND post.`post_id` = detil_harga.`post_id`
		SET booking.`book_totalharga` = (booking.`book_quantity` * detil_harga.`price`) + item.`item_price`;");
		header('Location: myprof.php?success');
		exit();
	}
	else{
		$_SESSION['book']=false;
		echo 'Username or Password not register yet.';
		exit();
	}
?>