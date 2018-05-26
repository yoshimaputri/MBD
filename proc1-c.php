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
      <div class="col-sm-4" style="margin-top: 0%;">
        <a class="btn btn-danger btn-lg" value="Back" style="color: white;" href="proc.php">Back</a>
      </div>
      <div class="col-sm-4">
      <br><br><br>
      <label for="name" class="font-weight-bold">Update Total Price of Booking under 
        <?php
          $link = mysqli_connect("localhost", "root", "", "fpmbd");
          if($link == false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
          }
          $value1 = $_POST['ppn'];
          $value2 = $_POST['low'];
          $sql = "select book_id, book_totalharga from booking;";
          echo $value2 . " with PPN " . $value1 . "%";
          $result = $link->query($sql);
          echo "</label>";

          $sql1 = "CALL updateppn($value1,$value2);";
          $res = $link->query($sql1);
          $sql2 = "select book_totalharga from booking;";
          $res2 = $link->query($sql2);
          ?>
          <div class="row">
                <table class="table table-light table-hover table-inverse">
                  <thead>
                    <tr>
                      <th>Book ID</th>
                      <th>Total Price Before PPN</th>
                      <th>Total Price After PPN</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php
          if ($result->num_rows > 0 and $res2->num_rows > 0){
            while($row = $result->fetch_assoc() and $row1 = $res2->fetch_assoc()){?>
                    <tr>
                      <td><?php echo $row['book_id']?></td>
                      <td><?php echo $row['book_totalharga']?></td>
                      <td><?php echo $row1['book_totalharga']?></td>
                    </tr>
              <?php
            }
          }?>
          </tbody>
                </table>
              </div>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>

  <script type="text/javascript" src="script.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>