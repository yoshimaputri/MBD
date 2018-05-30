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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="evelist.php">Event List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myprof.php">My Profile</a>
          </li>
          <li class="nav-item dropdown activestate">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Query Menus
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="trigger.php">Trigger</a>
              <a class="dropdown-item" href="function.php">Function</a>
              <a class="dropdown-item" href="proc.php">Procedure</a>
              <a class="dropdown-item" href="index-query.php">Index
              <a class="dropdown-item activestate" href="view.php">View</a>
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