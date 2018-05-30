<!DOCTYPE html>
<html>
<head>
	<title>Stand Event</title>
	<link rel="icon" type="image/png" href="img/logo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
</head>
<body id="body-index">
	<nav class="navbar navbar-expand-sm fixed-top" id="navbar" style="padding: 0;">
		<ul class="navbar-nav">
        <li><a class="" href="index.php" id="home">Home</a></li>
        <li><a class="" href="evelist.php" id="evlist">Event List</a></li>
        <li><a class="" href="myprof.php" id="myprof">My Profile</a></li>
        <li>
        	<a class="nav-link dropdown-toggle active" href="#" id="navbardrop" data-toggle="dropdown">Query Menus</a>
      		<div class="dropdown-menu">
        		<a class="dropdown-item" href="trigger.php">Trigger</a>
        		<a class="dropdown-item" href="function.php">Function</a>
        		<a class="dropdown-item" href="proc.php">Procedure</a>
        		<a class="dropdown-item" href="view.php">View</a>
        		<a class="dropdown-item" href="join.php">Join</a>
        		<a class="dropdown-item" href="cursor.php">Cursor</a>
      		</div>
        </li>
		</ul>
	</nav>
	<div id="session">
	<?php if(isset($_SESSION['username'])) : ?>
		<div style="display: flex; margin-left: 80%; color: white;margin-top: 1%;">
			<p>Welcome! <?php echo $_SESSION['username'] ?></p>
			<a href="logout.php"><img src="img/logout.png"></a>
		</div>
	<?php elseif(isset($_COOKIE['username']) && $_COOKIE['username']!='') : ?>
		<div style="display: flex; margin-left: 80%; color: white;margin-top: 1%;">
			Welcome! <?php echo $_COOKIE['username'] ?>
			<a href="logout.php"><img src="img/logout.png"></a>
		</div>
	<?php else: ?>
		<div style="display: flex; margin-left: 85%; color: white;margin-top: 1%;">
			<a href="index.php"><img src="img/login.png"></a>
		</div>
	<?php endif; ?>
	</div>
	<br>
	<?php
          $link = mysqli_connect("localhost", "root", "", "fpmbd");
          if($link == false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
          }

          $value = $_POST['index1'];
          $sql = "SELECT post_date, post_id, uevent_id, post_title, post_place, post_desc FROM post 
          where post_date like '%$value%' or post_id like '%$value%' or uevent_id like '%$value%' or post_title like '%$value%' or post_place like '%$value%' or post_desc like '%$value%' ORDER BY post_date;";
          
          $result = $link->query($sql);
          
        ?>
  		<div class="container">
  			<h1 style="position: center; margin-top: 1%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Index I</h1>
  			<a href="index-query.php" class="btn btn-danger">Back</a>
  			<div class="row">
  			<table class="table table-light table-hover table-inverse" id="example">
			    <thead>
			     	<tr>
			        	<th>Post_Date</th>
			        	<th>Post_ID</th>
			        	<th>Uevent_ID</th>
			        	<th>Post_Title</th>
			        	<th>Post_Place</th>
			        	<th>Post_Desc</th>
			      	</tr>
			    </thead>
			    <tbody>
			<?php
			    if ($result->num_rows > 0){
			    	while($row = $result->fetch_assoc()){
			    	echo "<tr>";
			        	echo "<td>" . $row["post_date"] . "</td>";
			        	echo "<td>" . $row["post_id"] . "</td>";
			        	echo "<td>" . $row["uevent_id"] . "</td>";
			        	echo "<td>" . $row["post_title"] . "</td>";
			        	echo "<td>" . $row["post_place"] . "</td>";
			        	?><td><a class="btn btn-danger" href="https://www.google.com"> Read More</a></td><?php
			     echo "</tr>";
			      	}
			    } else{
			    	echo "0 result";
				}

		    	?></tbody><?php
		  	?></table><?php
		  	?></div><?php

  		mysqli_close($link);
	?>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>