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
        <li><a class="" href="book.php" id="book">Booking</a></li>
        <li><a class="active" href="myprof.php" id="myprof">My Profile</a></li>
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
		<h1 style="position: center; margin-left: 35%; margin-top: 14%; margin-bottom: 3%; color: white;">Please Login Before!</h1>
		<style type="text/css">
			#myprofile,#mp{
				visibility: hidden;
			}
		</style>
	<?php endif; ?>
	</div>
	<h1 id="mp" style="position: center; margin-left: 40%; margin-top: 1%; color: white;">Profile Account</h1>
	<span>
	<form action="update.php" style="margin-left: 40%; margin-right: 40%; font-size: 15px;">
		<input type="submit" value="Edit">
	</form>
	<form action="delete.php" style="margin-left: 40%; margin-right: 40%; font-size: 15px;">
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