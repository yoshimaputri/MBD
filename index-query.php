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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php"><img src="img/standev.png" height="35px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-ietm">
	        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="trigger.php">Event List</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="myprof.php">My Profile</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Query Menus
	       </a>
	       <div class="dropdown-menu activestate" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="trigger.php">Trigger</a>
	          <a class="dropdown-item" href="function.php">Function</a>
	          <a class="dropdown-item" href="proc.php">Procedure</a>
	          <a class="dropdown-item activestate" href="index-query.php">Index</a>
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
    	$page = (isset($_GET['page']))? $_GET['page'] : 1;
		$limit = 5;
		$limit_start = ($page - 1) * $limit;
		$sql = "SELECT post_date, post_id, uevent_id, post_title, post_place, post_desc FROM post ORDER BY post_date LIMIT ";
  		$result = $link->query($sql.$limit_start.",".$limit);
  	?>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-4">
  					<h1 style="position: center; margin-top: 1%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Index I</h1>
  				</div>
  				<div class="col-md-3"></div>
  				<div class="col-md-3">
  					<form action="index-query1-c.php" method="post">
            			<input type="text" class="form-control" id="low" name="index1" placeholder="Search">
            	</div>
            	<div class="col-md-2">
			       		<input type="submit" class="btn btn-danger" name="submit" value="Query">
        			</form>
        		</div>
  			</div>
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
		  	?></table>
		  </div>
		  	<nav aria-label="Page navigation" style="margin-bottom: 10%;margin-top: 10px;">
		  <ul class="pagination justify-content-center">
		  	<!-- LINK FIRST AND PREV -->
		        <?php
		        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
		        ?>
		          <li class="disabled"><a class="page-link" href="#">First</a></li>
		          <li class="disabled"><a class="page-link" href="#">&laquo;</a></li>
		        <?php
		        }else{ // Jika page bukan page ke 1
		          $link_prev = ($page > 1)? $page - 1 : 1;
		        ?>
		          <li><a class="page-link" href="index-query.php?page=1">First</a></li>
		          <li><a class="page-link" href="index-query.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
		        <?php
		        }?>
		        <!-- LINK NUMBER -->
		        <?php
		        // Buat query untuk menghitung semua jumlah data
		        $sql2 = "SELECT COUNT(*) AS jumlah FROM post";
		        $query2 = $link->query($sql2);
		        $get_jumlah = $query2->fetch_assoc();
		        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
		        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
		        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
		        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
		        
		        for($i = $start_number; $i <= $end_number; $i++){
		          $link_active = ($page == $i)? ' class="active"' : '';
		        ?>
		          <li class="page-item" <?php echo $link_active; ?>><a class="page-link" href="index-query.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		        <?php
		        }?>
		        
		        <!-- LINK NEXT AND LAST -->
		        <?php
		        // Jika page sama dengan jumlah page, maka disable link NEXT nya
		        // Artinya page tersebut adalah page terakhir 
		        if($page == $jumlah_page){ // Jika page terakhir
		        ?>
		          <li class="disabled"><a class="page-link" href="#">&raquo;</a></li>
		          <li class="disabled"><a class="page-link" href="#">Last</a></li>
		        <?php
		        }else{ // Jika Bukan page terakhir
		          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
		        ?>
		          <li><a class="page-link" href="index-query.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
		          <li><a class="page-link" href="index-query.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
		        <?php
		        } ?>
		  </ul>
		</nav>
		<?php
  		$page = (isset($_GET['page']))? $_GET['page'] : 1;
		$limit = 5;
		$limit_start = ($page - 1) * $limit;
		$sql = "SELECT book_status, user_id, post_id, type_id, size_id, book_time, book_quantity, book_totalharga FROM booking ORDER BY book_status LIMIT ";
  		$result = $link->query($sql.$limit_start.",".$limit);
  		?>
  		<div class="row">
  			<div class="col-md-4">
  					<h1 style="position: center; margin-top: 1%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Index II</h1>
  				</div>
  				<div class="col-md-3"></div>
  				<div class="col-md-3">
  					<form action="index-query2-c.php" method="post">
            			<input type="text" class="form-control" id="low" name="index2" placeholder="Search">
            	</div>
            	<div class="col-md-2">
			       		<input type="submit" class="btn btn-danger" name="submit" value="Query">
        			</form>
        		</div>
        </div>
  			<div class="row">
  			<table class="table table-light table-hover table-inverse">
			    <thead>
			     	<tr>
			     		<th>Status</th>
			     		<th>User_ID</th>
			        	<th>Post_ID</th>
			        	<th>Type</th>
			        	<th>Size</th>
			        	<th>Book Time</th>
			        	<th>Quantity</th>
			        	<th>Total Harga</th>
			      	</tr>
			    </thead>
			    <tbody>
			<?php
			    if ($result->num_rows > 0){
			    	while($row = $result->fetch_assoc()){
			    	echo "<tr>";?>
			    		<?php if($row["book_status"]==0) : ?><td><a href="#" class='btn btn-dark btn-sm'>Pending</a></td>
			        	<?php elseif($row["book_status"]==1) : ?><td><a href="#" class='btn btn-success btn-sm'>Paid Off</a></td>
			        	<?php elseif($row["book_status"]==2) : ?><td><a href="#" class='btn btn-danger btn-sm'>Cancel</a></td>
			        	<?php endif;
			        	echo "<td>" . $row["user_id"] . "</td>";
			        	echo "<td>" . $row["post_id"] . "</td>";
			        	echo "<td>" . $row["type_id"] . "</td>";
			        	echo "<td>" . $row["size_id"] . "</td>";
			        	echo "<td>" . $row["book_time"] . "</td>";
			        	echo "<td>" . $row["book_quantity"] . "</td>";
			        	echo "<td>" . $row["book_totalharga"] . "</td>";
			        	
			     echo "</tr>";
			      	}
			    } else{
			    	echo "0 result";
				}

		    	?></tbody><?php
		  	?></table><?php
		  	?></div><?php
		?></div>
			<nav aria-label="Page navigation" style="margin-bottom: 10%;margin-top: 10px;">
		  <ul class="pagination justify-content-center">
		  	<!-- LINK FIRST AND PREV -->
		        <?php
		        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
		        ?>
		          <li class="disabled"><a class="page-link" href="#">First</a></li>
		          <li class="disabled"><a class="page-link" href="#">&laquo;</a></li>
		        <?php
		        }else{ // Jika page bukan page ke 1
		          $link_prev = ($page > 1)? $page - 1 : 1;
		        ?>
		          <li><a class="page-link" href="index-query.php?page=1">First</a></li>
		          <li><a class="page-link" href="index-query.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
		        <?php
		        }?>
		        <!-- LINK NUMBER -->
		        <?php
		        // Buat query untuk menghitung semua jumlah data
		        $sql2 = "SELECT COUNT(*) AS jumlah FROM booking";
		        $query2 = $link->query($sql2);
		        $get_jumlah = $query2->fetch_assoc();
		        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
		        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
		        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
		        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
		        
		        for($i = $start_number; $i <= $end_number; $i++){
		          $link_active = ($page == $i)? ' class="active"' : '';
		        ?>
		          <li class="page-item" <?php echo $link_active; ?>><a class="page-link" href="index-query.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		        <?php
		        }?>
		        
		        <!-- LINK NEXT AND LAST -->
		        <?php
		        // Jika page sama dengan jumlah page, maka disable link NEXT nya
		        // Artinya page tersebut adalah page terakhir 
		        if($page == $jumlah_page){ // Jika page terakhir
		        ?>
		          <li class="disabled"><a class="page-link" href="#">&raquo;</a></li>
		          <li class="disabled"><a class="page-link" href="#">Last</a></li>
		        <?php
		        }else{ // Jika Bukan page terakhir
		          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
		        ?>
		          <li><a class="page-link" href="index-query.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
		          <li><a class="page-link" href="index-query.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
		        <?php
		        } ?>
		  </ul>
		</nav>	
	<?php
  		mysqli_close($link);
	?>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>