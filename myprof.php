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
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="evelist.php">Event List</a>
	      </li>
	      <li class="nav-item activestate">
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
			<style type="text/css">
				#no-log{
					visibility: hidden;
				}
			</style>
		<?php else: ?>
			<li class="nav-item">
				<a href="index.php" class="btn btn-danger">Login</a>
			</li>
			<style type="text/css">
				#myprofile,#mp,#Edit,#Delete{
					visibility: hidden;
				}
			</style>
		<?php endif; ?>
	   </li>
    </ul>
  </div>
</nav>
	<h1 id="no-log" style="position: center; margin-left: 35%; margin-top: 14%; margin-bottom: 3%; color: white;">Please Login Before!</h1>
	<h1 id="mp" style="position: center; margin-left: 40%; margin-top: 1%; color: white;">Profile Account</h1>
	<span>
	<form id="Edit" action="update.php" style="margin-left: 40%; margin-right: 40%; font-size: 15px;">
		<input type="submit" value="Edit">
	</form>
	<form id="Delete" action="delete.php" style="margin-left: 40%; margin-right: 40%; font-size: 15px;">
		<input type="submit" value="Delete">
	</form>
	</span>
	<br>
	<div id="myprofile">
  		<?php
  			require('configuration.php');
			session_start();
			$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
			$result = $db->query('SELECT * FROM users WHERE username = "'.$_SESSION['username'].'" or username = "'.$_COOKIE['username'].'"');

			$res = $db->query('SELECT * FROM booking WHERE username = "'.$_SESSION['username'].'" or username = "'.$_COOKIE['username'].'"'); ?>
			<table style="font-size: 30px; padding: 2%; margin-left: 12%; color: white; margin-right: 15%;">
			<?php
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>Username";
				echo "<td> " . $row['username'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>First Name";
				echo "<td> " . $row['fname'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Last Name";
				echo "<td> " . $row['lname'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>City";
				echo "<td> " . $row['city'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Email";
				echo "<td> " . $row['email'] . "</td>";
				echo "</tr>";
			}
			?>
			</table>
			<br><br>
			<table style="font-size: 30px; color: white; padding: 2%; margin: 5%;">
				<p style="font-size: 30px; color: white; margin-left: 5%;">Your Booking :</p>
			<?php
				echo "<tr>";
				echo "<td>Event</td>";
				echo "<td>Stand Size</td>";
				echo "<td>Product Type</td>";
				echo "<td>Product Photos</td>";
				echo "</tr>";
			while($row2 = mysqli_fetch_array($res)){
				
				echo "<tr>";
				echo "<td>" . $row2['event'] . "</td>";
				echo "<td>" . $row2['size'] . "</td>";
				echo "<td>" . $row2['type'] . "</td>";
				echo "<td><img src='" . $row2['imgpath'] . "' style='width: 30%;'><a href='download.php?download'>Download images</a></td>";
				echo "</tr>";
			}
			?>
			</table>
			<br><br><br>
			<?php
  		?>
	</div>

	<script type="text/javascript" src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>