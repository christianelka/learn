<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
require_once("../auth.php"); 
// Include config file
require_once "../config.php";

$db = mysqli_connect("localhost", "root", "", "learn")or die(mysqli_error());
if(isset($_POST['update'])){  
  $username = $_SESSION['username'];
    // filter data yang diinputkan
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nim   = filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_STRING);

    // menyiapkan query
    $query = "UPDATE users SET fname='$fname', email='$email', nim='$nim' WHERE username='$username'";
    mysqli_query($db, $query);
  header("Refresh: 0;url='../logout.php'");
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  @media screen and (max-width: 1200px) {
    .alert,.card-header {
      margin-top: 75px;
    }
  }
</style>
</head>
<body>

  <div id="app" class="container">
      <nav class="navbar navbar-expand-md navbar-light shadow bg-white fixed-top">
          <a class="navbar-brand" href="index.php">Learning Online</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="training.php">Training</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="history.php">History Training</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="progress.php">Progress</a>
                  </li>
              </ul>
              <ul class="navbar-nav">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Christian Anelka Manik
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                  </div>
                </li>
              </ul>
          </div>
      </nav>
      <div class="col-lg-25" style="margin-top:7%;">
          </div>
          <div class="card-header bg-primary text-white rounded">
              Edit Profile's Data
          </div>
          <!-- <div class="card mb-6 shadow rounded"> -->
          <?php
          $username = $_SESSION['username'];
          $query = "SELECT * from users WHERE username = '$username'";
          if ($result = $db->query($query)) {
            while ($row = mysqli_fetch_array($result)) {
            ?>            
          <form action="" method="POST">            
          <div style="margin-top: 0.5%; margin-left: 0.5%; margin-right: 0.5%;"> 
          <div class="row">
            <div class="col-md-6">
                <div class="form-group required has-success">
                  <label class="control-label" for="username">Username</label>
                  <input type="text" id="username" class="form-control" name="username" value="<?php echo $row['username'];?>" maxlength="100" disabled>

                <div class="help-block"></div>
               </div>        
            </div>
            <div class="col-md-6">
                <div class="form-group required">
                  <label class="control-label" for="nim">NIM</label>
                  <input type="text" id="nim" class="form-control" name="nim" value="<?php echo $row['NIM'];?>" maxlength="100" aria-required="true">

                <div class="help-block"></div>
                </div>        
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
                <div class="form-group required">
                  <label class="control-label" for="email">Email</label>
                  <input type="email" id="email" class="form-control" name="email" value="<?php echo $row['email'];?>" maxlength="100" aria-required="true">

                <div class="help-block"></div>
                </div>        
            </div>
            <div class="col-md-6">
                <div class="form-group required">
                  <label class="control-label" for="fname">Full Name</label>
                  <input type="text" id="fname" class="form-control" name="fname" value="<?php echo $row['fname'];?>" maxlength="100" aria-required="true">

                <div class="help-block"></div>
                </div>        
            </div>            
            </div>
            <input type="submit" class="btn btn-success btn-block" name="update" value="Update" />

            <br><center><div class="row">
              <div class="col-md">
                  <div class="form-group required">
                    <label class="control-label" for="update_other">Update Photo or Change Password?</label>
                    <td><br>
                    <a href="upload.php" type="submit" class="btn btn-outline-primary">Update Photo</a></td>
                    <a href="change_password.php" type="submit" class="btn btn-outline-warning">Change Password</a></td>
                  <div class="help-block"></div>
                  </div>        
                </div>              
            </div></center>
     <?php
        }
      }?>      
      </form>
</div>
</body>
<footer class="page-footer font-small blue fixed">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://ptik.fkip.uns.ac.id/"> Pendidikan TIK UNS / 2019</a>
  </div>
  <!-- Copyright -->

</footer>
</html>
