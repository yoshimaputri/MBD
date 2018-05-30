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
        <li class="activestate">
          <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
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
    <?php else: ?>
      <li class="nav-item">
        <a href="index.php" class="btn btn-danger">Login</a>
      </li>
    <?php endif; ?>
     </li>
    </ul>
  </div>
</nav>
	<h1 id="b" style="position: center; margin-left: 38%; margin-top: 1%; margin-bottom: 3%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Booking the Stand!</h1>
	<div id="booking-page">
  		<form action="book-c.php" method="post" id="booking" enctype="multipart/form-data">
  			<div class="form-group">
  			<label class="font-weight-bold" for="username">Username</label>
      		<input class="form-control" type="text" id="username" name="username" placeholder="Your username..">
          <input type="hidden" id="postid" name="postid" value="<?php echo $_POST['pesan']?>">
      		<br>
      		<label class="font-weight-bold" for="size">Stand Size</label>
      		<select class="form-control" id="size" name="size">
        	<option value="S">Small</option>
        	<option value="M">Medium</option>
        	<option value="L">Large</option>
      		</select>
      		<br>
      		<label class="font-weight-bold" for="type">Product Type</label>
      		<select class="form-control" id="type" name="type">
        	<option value="t02">Food & Drink</option>
        	<option value="t04">Merchandise</option>
        	<option value="t01">Clothes</option>
        	<option value="t03">Education</option>
        	<option value="t05">Property & Marketing</option>
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