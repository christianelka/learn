<<<<<<< HEAD
<?php

// Check if the user is already logged in, if yes then redirect him to welcome page
require_once("../auth.php"); 
// Include config file
require_once "../config.php";

if(isset($_POST['submit'])){
      $username = $_SESSION['username'];
      $ekstensi_diperbolehkan = array('png','jpg');
      $nama = $_FILES['file']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];  
 
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){      
          move_uploaded_file($file_tmp, '../assets/img/user_img/'.$nama);
              // $sql = "INSERT INTO upload (id_file, username, nama_file) VALUES (NULL, :username, :nama_file)";
          $sql = "UPDATE upload SET nama_file='$nama' WHERE username='$username'";
              $stmt = $db->prepare($sql);

              // bind parameter ke query
              $params = array(
                  $username => $username,
                  $nama_file => $nama
              );

              // eksekusi query untuk menyimpan ke database
              $saved = $stmt->execute($params);

              if($saved) header("Location: upload.php");
    }
  }
}
?>
<!DOCTYPE php>
<php lang="en">
<head>
  <title>Learn Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  @media screen and (max-width: 1200px) {
    .alert{
      margin-top: 75px;
    }
  }
  .footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
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
                  <li class="nav-item">
                      <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="training.php">Training<span class="sr-only">(current)</span></a>
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
  <div id="app" class="container">
  <div class="col-md-15" style="margin-top:7%">
    <div class="alert alert-primary shadow-sm alert-dismissible fade show">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
    Fill Up With Your Data
    </div>
    <div class="card-group shadow-lg" style="width:100%"><br>
      <div class="card-body">
                <?php
          $username = $_SESSION['username'];
          $query = "SELECT * from upload WHERE username = '$username'";
          $result = mysqli_query($mysqli,$query);   
          if ($result = $mysqli->query($query)) {
            while ($row = mysqli_fetch_array($result)) {
            ?>    
      <tr>
        <td>
          <img class="card-img-top" src="<?php echo "../assets/img/user_img/".$row['nama_file'] ?>" alt="Card image" style="width:30%; ">
        </td>   
      </tr>
           <?php    } }?>   
      <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="age">Change Your Photo</label>
            <input type="file" name="file" class="form-control-file" required>
            <a href="profile.php">Back to Profile Page</a>
            <input type="submit" name="submit" class="btn btn-info">
          </div>
      </form>
    </div>
  </div>
</div>
</div>
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
=======
<?php

// Check if the user is already logged in, if yes then redirect him to welcome page
require_once("../auth.php"); 
// Include config file
require_once "../config.php";

if(isset($_POST['submit'])){
      $username = $_SESSION['username'];
      $ekstensi_diperbolehkan = array('png','jpg');
      $nama = $_FILES['file']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran = $_FILES['file']['size'];
      $file_tmp = $_FILES['file']['tmp_name'];  
 
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){      
          move_uploaded_file($file_tmp, '../assets/img/user_img/'.$nama);
              // $sql = "INSERT INTO upload (id_file, username, nama_file) VALUES (NULL, :username, :nama_file)";
          $sql = "UPDATE upload SET nama_file='$nama' WHERE username='$username'";
              $stmt = $db->prepare($sql);

              // bind parameter ke query
              $params = array(
                  $username => $username,
                  $nama_file => $nama
              );

              // eksekusi query untuk menyimpan ke database
              $saved = $stmt->execute($params);

              if($saved) header("Location: upload.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Online</title>
  <meta charset="utf-8">
  <meta age="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  @media screen and (max-width: 1200px) {
    container{
      margin-top: 75px;
    }
  }
  .highcharts-figure, .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  #container {
    height: 400px;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }
  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }
  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }
  .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
  }
  .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }
  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
  </style>
</head>
<body>
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
                  <a class="nav-link" href="#">Progress</a>
              </li>
          </ul>
          <ul class="navbar-nav">
            <!-- Dropdown -->
            <li class="nav-item dropdown ml-auto">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <?php echo $_SESSION["fname"] ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="../logout.php">Logout</a>
              </div>
            </li>
          </ul>
      </div>
    </nav>
  <div id="app" class="container">
  <div class="col-md-15" style="margin-top:7%">
    <div class="alert alert-primary shadow-sm alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Fill Up With Your Data
    </div>
    <div class="card-group shadow-lg" style="width:100%"><br>
      <div class="card-body">
                <?php
          $username = $_SESSION['username'];
          $query = "SELECT * from upload WHERE username = '$username'";
          $result = mysqli_query($mysqli,$query);   
          if ($result = $mysqli->query($query)) {
            while ($row = mysqli_fetch_array($result)) {
            ?>    
      <tr>
        <td>
          <img class="card-img-top" src="<?php echo "../assets/img/user_img/".$row['nama_file'] ?>" alt="Card image" style="width:30%; ">
        </td>   
      </tr>
           <?php    } }?>   
      <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="age">Change Your Photo</label>
            <input type="file" name="file" class="form-control-file" required>
          </div>
            <input type="submit" name="submit" class="btn btn-info">
      </form>
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
