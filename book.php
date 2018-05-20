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
        <li><a class="" href="evelist.php" id="evlist">Event List</a></li>
        <li><a class="active" href="book.php" id="book">Booking</a></li>
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
		<h1 style="position: center; margin-left: 30%; margin-top: 10%; margin-bottom: 3%; color: white;">Please Login Before Booking!</h1>
		<style type="text/css">
			#booking-page,#b{
				visibility: hidden;
			}
		</style>
	<?php endif; ?>
	</div>
	<h1 id="b" style="position: center; margin-left: 38%; margin-top: 1%; margin-bottom: 3%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Booking the Stand!</h1>
	<div id="booking-page">
  		<form action="book-c.php" method="post" id="booking" enctype="multipart/form-data">
  			<div class="form-group">
  			<label class="font-weight-bold" for="username">Username</label>
      		<input class="form-control" type="text" id="username" name="username" placeholder="Your username..">
      		<br>
	    	<label class="font-weight-bold" for="event">Event</label>
      		<select class="form-control" id="event" name="event">
        	<option value="food_truck_festival">Food Truck Festival</option>
        	<option value="campus_fair">Campus Fair</option>
      		</select>
      		<br>
      		<label class="font-weight-bold" for="size">Stand Size</label>
      		<select class="form-control" id="size" name="size">
        	<option value="small">Small</option>
        	<option value="medium">Medium</option>
        	<option value="large">Large</option>
      		</select>
      		<br>
      		<label class="font-weight-bold" for="type">Product Type</label>
      		<select class="form-control" id="type" name="type">
        	<option value="food_and_drink">Food & Drink</option>
        	<option value="accesories">Accesories</option>
        	<option value="clothes">Clothes</option>
        	<option value="fresh_material">Fresh Material</option>
        	<option value="technology">Technology</option>
        	<option value="daily_equipment">Daily Equipment</option>
      		</select>
      		<br>
      		<label class="font-weight-bold" for="pwd">Retype Password</label>
      		<input class="form-control" type="password" id="passwor2" name="password2" placeholder="Your secret password..">
      		<br>
      		<label class="font-weight-bold" for="image">Your Product Photos</label><br>
      		<input class="form-control" type="file" id="image" name="image" accept="image/*">
      		<br>
      		<span>
        		<input class="form-control" type="checkbox" checked="checked" value="fix">
        		<label>Is the data correct ?</label>
      		</span>

    		<input type="submit" name="book" value="Booking">
    		</div>
  		</form>
	</div>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>