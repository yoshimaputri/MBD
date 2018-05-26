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
      <div class="col-sm-4" style="margin-top: 35%;">
        <a class="btn btn-danger btn-lg" value="Back" style="color: white;" href="view.php">Back</a>
      </div>
      <div class="col-sm-4">
      <br><br><br>
      <label for="name" class="font-weight-bold">Show Post Event in month-
        <?php
          $link = mysqli_connect("localhost", "root", "", "fpmbd");
          if($link == false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
          }

          $value1 = $_POST['bln'];
          $value2 = $_POST['pl'];
          $sql = "CREATE OR REPLACE VIEW postevent AS SELECT post_title FROM post WHERE EXTRACT(MONTH FROM post_date) = $value1 AND post_place LIKE '%$value2%';";
          echo $value1 . " at " . $value2;
          $result = $link->query($sql);
          echo "</label>";
          $sql2 = "SELECT post_title from postevent;";
          $res2 = $link->query($sql2);
          if ($res2->num_rows > 0){
            while($row = $res2->fetch_assoc()){?>
              <button class="btn btn-success btn-lg" style="font-size: 30px; margin: 5px;"><?php echo $row['post_title']?></button>;<br><?php
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