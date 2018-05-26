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
        <li><a class="active" href="index.php" id="home">Home</a></li>
        <li><a class="" href="evelist.php" id="evlist">Event List</a></li>
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
	<h1 style="position: center; margin-left: 33%; margin-top: 4%; margin-bottom: 3%; color: white; text-shadow: 2px 2px black;" class="font-weight-bold">Register your Account!</h1>
	<div id="register">
  	<form action="register-c.php" method="post" id="regis">
      <div class="form-group">
    	<label class="font-weight-bold" for="fname">First Name</label>
    	<input type="text" class="form-control" id="fname" name="firstname" placeholder="Your name..">

    	<label class="font-weight-bold" for="lname">Last Name</label>
    	<input type="text" class="form-control" id="lname" name="lastname" placeholder="Your last name..">

      <label class="font-weight-bold" for="city">City</label>
      <select class="form-control" id="city" name="city">
        <option value="Surabaya">Surabaya</option>
        <option value="Bandung">Bandung</option>
        <option value="Jakarta">Jakarta</option>
        <option value="Bali">Bali</option>
      </select>
      <br>
      <label class="font-weight-bold" for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Your username..">

      <label class="font-weight-bold" for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Your private email..">

      <label class="font-weight-bold" for="pwd">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Your secret password..">

      <label class="font-weight-bold" for="pwd2">Retype Password</label>
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password..">
  
      <span>
        <input type="checkbox" checked="checked" value="fix">
        <label>Is the data correct ?</label>
      </span>

    	<input type="submit" name="regis" value="Register">
      </div>
  	</form>
	</div>

	<script type="text/javascript" src="script.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>