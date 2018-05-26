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
		<h1 style="position: center; margin-left: 30%; margin-top: 10%; margin-bottom: 3%; color: white;">Please Login Before Query!</h1>
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
        <h1 style="position: center; margin-left: 17%; margin-top: 4%; margin-bottom: 3%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Procedure 1</h1>
        <br><br>
        <form action="proc1-c.php" method="post" id="proc">
          <div class="form-group">
            <label for="name" class="font-weight-bold">PPN (%)</label><br>
            <input type="text" class="form-control" id="ppn" name="ppn" placeholder="Percentage of PPN">
            <label for="name" class="font-weight-bold">Under Price</label><br>
            <input type="text" class="form-control" id="low" name="low" placeholder="Maximal Price that has PPN">
            <br>
            <input type="submit" name="submit" value="Submit">
          </div>
        </form>
      </div>
      <div class="col-sm-6">
        <h1 style="position: center; margin-left: 17%; margin-top: 4%; margin-bottom: 3%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Procedure 2</h1>
        <br><br>
        <form action="proc2-c.php" method="post" id="proc">
          <div class="form-group">
            <label for="name" class="font-weight-bold">Discount (%)</label><br>
            <input type="text" class="form-control" id="disc" name="disc" placeholder="Percentage of Discount">
            <label for="name" class="font-weight-bold">Over Price</label><br>
            <input type="text" class="form-control" id="high" name="high" placeholder="Minimum Price that has Discount">
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