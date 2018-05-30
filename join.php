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
	      <li class="nav-item">
	        <a class="nav-link" href="myprof.php">My Profile</a>
	      </li>
	      <li class="nav-item dropdown activestate">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Query Menus
	       </a>
	       <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="trigger.php">Trigger</a>
	          <a class="dropdown-item" href="function.php">Function</a>
	          <a class="dropdown-item" href="proc.php">Procedure</a>
	          <a class="dropdown-item" href="index-query.php">Index
	          <a class="dropdown-item" href="view.php">View</a>
	          <a class="dropdown-item activestate" href="join.php">Join</a>
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
		<?php else: ?>
			<li class="nav-item">
				<a href="index.php" class="btn btn-danger">Login</a>
			</li>
		<?php endif; ?>
	   </li>
    </ul>
  </div>
</nav>
	<br>

	<?php
		$link = mysqli_connect("localhost", "root", "", "fpmbd");
  		if($link == false){
      		die("ERROR: Could not connect. " . mysqli_connect_error());
  		}
  		?><br><?php
    
  		$sql = "SELECT u.uevent_name, p.post_title FROM user_event u JOIN post p ON p.uevent_id = u.uevent_id AND EXTRACT(MONTH FROM p.post_date) = 4 ORDER BY u.uevent_name";
  		$result = $link->query($sql);
  	?>
  		<div class="container">
  			<div class="row">
  			<div class="col-sm-5">
  			<h1 style="position: center; margin-left: 35%; margin-top: 1%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Join I</h1><br>
  			<p style="color: white;">Show the User Event and his/her Event Post in April.</p>
  			<table class="table table-light table-hover table-inverse">
			    <thead>
			     	<tr>
			        	<th>User Event</th>
			        	<th>Event Post</th>
			      	</tr>
			    </thead>
			    <tbody>
			<?php
			    if ($result->num_rows > 0){
			    	while($row = $result->fetch_assoc()){
			    	echo "<tr>";
			        	echo "<td>" . $row["uevent_name"] . "</td>";
			        	echo "<td>" . $row["post_title"] . "</td>";
			     echo "</tr>";
			      	}
			    } else{
			    	echo "0 result";
				}

		    	?></tbody><?php
		  	?></table><?php
		  	?></div><?php

  		$sql = "SELECT u.`user_name`, COUNT(b.book_id) FROM USER u JOIN booking b ON b.user_id = u.user_id AND EXTRACT(MONTH FROM b.book_time) = 5 GROUP BY u.user_name";
  		$result = $link->query($sql);
  	?>
  			<div class="col-sm-2"></div>
  			<div class="col-sm-5">
  			<h1 style="position: center; margin-left: 35%; margin-top: 1%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Join II</h1><br>
  			<p style="color: white;">Show the User and his/her total Booking transaction in May.</p>
  			<table class="table table-light table-hover table-inverse">
			    <thead>
			     	<tr>
			     		<th>User</th>
			     		<th>Total Booking</th>
			      	</tr>
			    </thead>
			    <tbody>
			<?php
			    if ($result->num_rows > 0){
			    	while($row = $result->fetch_assoc()){
			    	echo "<tr>";
			        	echo "<td>" . $row["user_name"] . "</td>";
			        	echo "<td>" . $row["COUNT(b.book_id)"] . "</td>";
			     echo "</tr>";
			      	}
			    } else{
			    	echo "0 result";
				}

		    	?></tbody><?php
		  	?></table><?php
		  	?></div><?php
		  	?></div><?php
		?></div><?php

  		mysqli_close($link);
	?>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>