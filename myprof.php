<!DOCTYPE html>
<html>
<head>
	<title>Stand Event</title>
	<link rel="icon" type="image/png" href="img/logo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body id="body-index">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php"><img src="img/standev.png" height="35px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="evelist.php">Event List</a>
	      </li>
	      <li class="nav-item activestate">
	        <a class="nav-link" href="myprof.php">My Profile</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Query Menus
	       </a>
	       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="trigger.php">Trigger</a>
	          <a class="dropdown-item" href="function.php">Function</a>
	          <a class="dropdown-item" href="proc.php">Procedure</a>
	          <a class="dropdown-item" href="index-query.php">Index</a>
	          <a class="dropdown-item" href="view.php">View</a>
	          <a class="dropdown-item" href="join.php">Join</a>
	          <a class="dropdown-item" href="cursor.php">Cursor</a>         
	       </div>
	      </li>
      <li class="nav-item">
	    <?php if(isset($_SESSION['username'])) : ?>
			<div style="display: flex; margin-left: 80%; color: white;margin-top: 1%;">
				<p>Welcome! <?php echo $_SESSION['username'] ?></p>
				<a href="logout.php"><img src="img/logout.png" height="35px"></a>
			</div>
		<?php elseif(isset($_COOKIE['username']) && $_COOKIE['username']!='') : ?>
			<li class="nav-item"> Welcome! <?php echo $_COOKIE['username'] ?>
				<a href="logout.php" class="btn btn-danger">Logout</a>
			</li>
			<style type="text/css">
				#no-log{
					visibility: hidden;
				}
			</style>
		<?php else: ?>
			<li class="nav-item">
				<a href="index.php" class="btn btn-danger">Login</a>
			</li>
			<style type="text/css">
				#myprofile,#mp,#Edit,#Delete{
					visibility: hidden;
				}
			</style>
		<?php endif; ?>
	   </li>
    </ul>
  </div>
</nav>
	<h1 id="no-log" style="position: center; margin-left: 35%; margin-top: 1%; margin-bottom: 3%; color: white;">Please Login Before!</h1>
	<h1 id="mp" style="position: center; margin-left: 40%; margin-top: 1%; color: white;"><b>Profile Account</b></h1>
	<br>
	<div class="container">
  		<?php
  			require('configuration.php');
			session_start();
			$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
			$result = $db->query('SELECT * FROM user WHERE user_name = "'.$_SESSION['username'].'" or user_name = "'.$_COOKIE['username'].'"');

			$res = $db->query('SELECT book_id,book_time,post_id,type_id,size_id,book_quantity,book_totalharga, book_imgpath FROM booking, USER WHERE booking.`user_id` = user.`user_id` AND (user_name = "'.$_SESSION['username'].'" or user_name = "'.$_COOKIE['username'].'")'); 
			$co = $_COOKIE['username'];
			$se = $_SESSION['username'];
			?>
			<div class="col-md-6 mx-auto">
			<table class="table table-light table-hover" id="example" style="border-radius: 10px;border-color: red;">
			    <tbody>
			<?php
			while($row = mysqli_fetch_array($result)){
				//echo $co; echo $se;
				echo "<tr>";
				echo "<td class='bg-danger' style='color: white;font-weight: 500;'>User ID";
				echo "<td> " . $row['user_id'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class='bg-danger' style='color: white;font-weight: 500;'>Username";
				echo "<td> " . $row['user_name'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class='bg-danger' style='color: white;font-weight: 500;'>Full Name";
				echo "<td> " . $row['user_fullname'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class='bg-danger' style='color: white;font-weight: 500;'>City";
				echo "<td> " . $row['user_city'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class='bg-danger' style='color: white;font-weight: 500;'>Telp";
				echo "<td> " . $row['user_telp'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td class='bg-danger' style='color: white;font-weight: 500;'>Email";
				echo "<td> " . $row['user_email'] . "</td>";
				echo "</tr>";
			}
			?></tbody>
			</table>
			</div>
			<br><br>
			<div class="col-md-12 mx-auto">
			<table class="table table-light table-hover table-inverse" id="example">
			    <thead class="bg-danger">
			     	<tr>
			        	<th>Book ID</th>
			        	<th>Book Time</th>
			        	<th>Post ID</th>
			        	<th>Type ID</th>
			        	<th>Size</th>
			        	<th>Quantity</th>
			        	<th>Total Harga</th>
			        	<th>Product Photos</th>
			      	</tr>
			    </thead>
			    <tbody>
				<p style="font-size: 30px; color: white; margin-left: 5%;">Your Booking :</p>
			<?php
			while($row2 = mysqli_fetch_array($res)){
				echo "<tr>";
				echo "<td>" . $row2['book_id'] . "</td>";
				echo "<td>" . $row2['book_time'] . "</td>";
				echo "<td>" . $row2['post_id'] . "</td>";
				echo "<td>" . $row2['type_id'] . "</td>";
				echo "<td>" . $row2['size_id'] . "</td>";
				echo "<td>" . $row2['book_quantity'] . "</td>";
				echo "<td>" . $row2['book_totalharga'] . "</td>";
				echo "<td> <img src='" . $row2['book_imgpath'] . "' style='width: 30%;'><a href='download.php?download'>Download images</a></td>";
				echo "</tr>";
			}
			?></tbody>
			</table>
			</div>
			<br><br><br>
			<?php
  		?>
	</div>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>