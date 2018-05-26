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
		<h1 style="position: center; margin-left: 30%; margin-top: 10%; margin-bottom: 3%; color: white;">Please Login Before Booking!</h1>
		<style type="text/css">
			#booking-page,#b{
				visibility: hidden;
			}
		</style>
	<?php endif; ?>
	</div>
	<br><br>
	<div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1 style="position: center; margin-left: 17%; margin-top: 4%; margin-bottom: 3%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">View 1</h1>
        <br><br>
        <form action="view-c.php" method="post" id="view">
          <div class="form-group">
            <label for="name" class="font-weight-bold">Month's Post</label><br>
            <select class="form-control" name="bln">
            	<option value="1">January</option>
            	<option value="2">February</option>
            	<option value="3">March</option>
            	<option value="4">April</option>
            	<option value="5">May</option>
            	<option value="6">June</option>
            	<option value="7">July</option>
            	<option value="8">August</option>
            	<option value="9">September</option>
            	<option value="10">October</option>
            	<option value="11">November</option>
            	<option value="12">December</option>
            </select><br>
            <label for="name" class="font-weight-bold">Place</label><br>
            <input type="text" class="form-control" id="pl" name="pl" placeholder="Place that be held the event">
            <br>
            <input type="submit" name="submit" value="Submit">
          </div>
        </form>
      </div>
      <div class="col-sm-6">
        <h1 style="position: center; margin-left: 17%; margin-top: 4%; margin-bottom: 3%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">View 2</h1>
        <br><br>
        <form action="view2-c.php" method="post" id="view">
          <div class="form-group">
            <label for="name" class="font-weight-bold">Month's Booking</label><br>
            <select class="form-control" name="bln1">
            	<option value="1">January</option>
            	<option value="2">February</option>
            	<option value="3">March</option>
            	<option value="4">April</option>
            	<option value="5">May</option>
            	<option value="6">June</option>
            	<option value="7">July</option>
            	<option value="8">August</option>
            	<option value="9">September</option>
            	<option value="10">October</option>
            	<option value="11">November</option>
            	<option value="12">December</option>
            </select><br>
            <label for="name" class="font-weight-bold">Over Total Price</label><br>
            <input type="text" class="form-control" id="high" name="high" placeholder="Minimum Total Price which wanna view">
            <br>
            <input type="submit" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>