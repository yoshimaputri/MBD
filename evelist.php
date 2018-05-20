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
	<div id="navbar">
		<ul>
        <li><a class="" href="index.php" id="home">Home</a></li>
        <li><a class="active" href="evelist.php" id="evlist">Event List</a></li>
        <li><a class="" href="book.php" id="book">Booking</a></li>
        <li><a class="" href="myprof.php" id="myprof">My Profile</a></li>
		</ul>
	</div>
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
	<div id="evelist" style="margin-left: 20%; margin-top: 3%;margin-bottom: 5%;">
    	<a href="book.php"><img src="img/ev1.png" id="ev"></a>
    	<br><br><br><br>
    	<a href="book.php"><img src="img/ev2.png" id="ev"></a>
	</div>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>