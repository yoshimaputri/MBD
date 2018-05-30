<!DOCTYPE html>
<html>
<?php
		$link = mysqli_connect("localhost", "root", "", "fpmbd");
  		if($link == false){
      		die("ERROR: Could not connect. " . mysqli_connect_error());
  		} ?>
<head>
	<title>Stand Event</title>
	<link rel="icon" type="image/png" href="img/logo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body id="body-index">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="index.php"><img src="img/standev.png" height="35px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item ">
	        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item activestate">
	        <a class="nav-link" href="evelist.php">Event List</a>
	      </li>
	      <li class="nav-item">
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
	          <a class="dropdown-item" href="index-query.php">Index
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

	<h1 style="position: center; margin-left: 40%; margin-top: 1%; margin-bottom: 3%; color: white;">List of Event</h1>
	<div class="container rounded" style="background-color: white; padding: 10px;margin-top: 5%;">
		<div class="container rounded" style="background-color: #2c3e50;padding: 8px; color: white">
			<div class="row">
				<?php
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					$limit = 4;
					$limit_start = ($page - 1) * $limit;
					$sql = "SELECT * FROM post LIMIT ";
					$query = $link->query($sql.$limit_start.",".$limit);
					while ($row = $query->fetch_assoc()) :?>
				<div class="row" style="margin: 5px;">
				<div class="col-md-2">
					<img class="img-thumbnail float-left" src="img/thm.jpg"> </div>
				<div class="col-md-6">
					<h3><?php echo $row['post_title'];?></h3>
					<p class="text-justify"><?php echo $row['post_desc'];?></p> 
					<form action="book.php" method="post">
					<button name="pesan" value="<?php echo $row['post_id'];?>" type="submit" class="btn btn-danger" style="padding:0px 10 0px 10px;">PESAN</button>
					</form>
				</div>

				<div class="col-md-2 panel panel-default">
					<table class="table" style="border-radius: 6px;">
						<thead class="thead-light" style="text-align: center;">
							<tr><th>Jadwal</th></tr>
						</thead>
						<tbody class="bg-warning" style="color: black; font-weight: 600;">
							<tr><td><?php echo $row['post_date'];?></td></tr>
						</tbody>
					</table></div>
				<div class="col-md-2">
					<table class="table">
						<thead class="thead-light" style="text-align: center;">
							<tr><th>Harga</th></tr>
						</thead>
						<tbody class="bg-warning" style="color: black; font-weight: 600;">
							<tr rows="3"><td><?php echo $row['post_place'];?></td></tr>
						</tbody>
					</table>
				</div>
				</div>
				<?php endwhile;?>
			</div>
		</div>
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
		          <li><a class="page-link" href="evelist.php?page=1">First</a></li>
		          <li><a class="page-link" href="evelist.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
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
		          <li class="page-item" <?php echo $link_active; ?>><a class="page-link" href="evelist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
		          <li><a class="page-link" href="evelist.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
		          <li><a class="page-link" href="evelist.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
		        <?php
		        } ?>
		  </ul>
		</nav>
	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>