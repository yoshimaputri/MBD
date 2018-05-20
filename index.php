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
	<img src="img/standev.png" id="logo">
	<div id="navbar">
		<ul>
  			<li><a class="active" href="index.php" id="home">Home</a></li>
        	<li><a class="" href="evelist.php" id="evlist">Event List</a></li>
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
	<h1 style="position: center; margin-left: 13%; margin-top: 1%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Please LOGIN first!</h1>
	<div id="login">
  		<form action="login-c.php" method="post" id="log">
  		<div class="form-group">
    	<label for="name" class="font-weight-bold">Username</label>
    	<input type="text" class="form-control" id="username" name="username" placeholder="Your username..">
    	<label for="pwd" class="font-weight-bold">Password</label>
    	<input type="password" class="form-control" id="password" name="password" placeholder="Your secret password..">
    	<br>
    	<input type="submit" name="login" value="Login">
    	</div>
  		</form>
  		<span style="color: white; margin-left: 5%;">
		Not a Member?<a style="text-decoration: none; margin-left: 1%;" id="reghere" href="register.php">Register Here</a>
		</span>
	</div>
	

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>