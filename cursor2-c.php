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
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-sm-4" style="margin-top: 25%;">
        <a class="btn btn-danger btn-lg" value="Back" style="color: white;" href="cursor.php">Back</a>
      </div>
      <div class="col-sm-4">
      <br><br><br>
      <label for="name" class="font-weight-bold">Show the User Name that have been booked in Post 
        <?php
          $link = mysqli_connect("localhost", "root", "", "fpmbd");
          if($link == false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
          }

          $value1 = $_POST['thispost'];
          $sql = "CALL cursor2('$value1');";
          print_r($value1);
          $result = $link->query($sql);
          echo "</label>";
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){?>
              <button class="btn btn-success btn-lg" style="font-size: 30px;"><?php echo $row['user_name']?></button>;<?php
            }
          }
        ?>
        
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>

  <script type="text/javascript" src="script.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>