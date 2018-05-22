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
	<nav class="navbar navbar-expand-sm fixed-top" id="navbar" style="padding: 0;">
		<ul class="navbar-nav">
        <li><a class="" href="index.php" id="home">Home</a></li>
        <li><a class="active" href="evelist.php" id="evlist">Event List</a></li>
        <li><a class="" href="book.php" id="book">Booking</a></li>
        <li><a class="" href="myprof.php" id="myprof">My Profile</a></li>
        <li>
        	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Query Menus</a>
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
	<h1 style="position: center; margin-left: 40%; margin-top: 1%; margin-bottom: 3%; color: white;">List of Event</h1>
		<div class="container rounded" style="background-color: white; padding: 10px;margin-top: 10%;">
		<div class="container rounded" style="background-color: #2c3e50;padding: 8px; color: white;">
		<div class="row">
				<div class="col-md-2">
					<img class="img-thumbnail float-left" src="img/thm.jpg">
				</div>
				<div class="col-md-6">
					<h3>CAMP FAIR 2012</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
				<div class="col-md-2 panel panel-default">
					<table class="table" style="border-radius: 6px;">
						<thead class="thead-light">
							<tr>
								<th>Jadwal</th>
							</tr>
						</thead>
						<tbody class="bg-warning">
							<tr>
								<td>Gedung Aiola Surabaya</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-2">
					<table class="table">
						<thead class="thead-light rounded">
							<tr>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody class="bg-warning">
							<tr rows="3">
								<td>150K - 300K</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>