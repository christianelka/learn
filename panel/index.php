<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!(isset($_SESSION['user']) && $_SESSION['user'] != '')){
    header ("Location: ../login.php");
}
 
// Include config file
require_once "../config.php";

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
<<<<<<< HEAD
    .alert, .content {
      margin-top: 75px;
    }
    #container {
    height: 400px;
    width: 400px;
    }
    .card-img-top {
      width: 100%;
    }
=======
    container{
      margin-top: 75px;
    }
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
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
<<<<<<< HEAD
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo $_SESSION["fname"] ?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Edit Profile</a>
=======
                <li class="nav-item dropdown ml-auto">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo $_SESSION["fname"] ?>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION["id_users"]; ?>">Edit Profile</a>
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                  </div>
                </li>
              </ul>
          </div>
      </nav>
      <!-- Content -->
<<<<<<< HEAD
      <div class="content">
        <div class="col-md-25" style="margin-top:5%">
            <div class="alert alert-primary alert-dismissible fade show shadow-sm">
              <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
              <strong>Hi <?php echo $_SESSION["fname"] ?>! </strong> Welcome Back.
            </div>
            <div class="card-header bg-primary text-white rounded">
                Profile's Data
            </div>
            <div class="card mb-3 shadow rounded">
                  <div class="card-group" style="width:100%"><br>
            <?php
            $username = $_SESSION['username'];
            $query = "SELECT * from upload WHERE username = '$username'";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              ?>    
            <tr>
              <td>
                <img class="card-img-top" src="<?php echo "../assets/img/user_img/".$row['nama_file'] ?>" alt="Card image" style="width:30%; padding:2%;">
              </td>   
            </tr>
             <?php    } }?>   
                  
                    <div class="card-body">
                      <table class="table">
                      <tbody class="table-bordered">
                        <tr name="NIM">
                          <td>NIM</td>
                          <td><?php echo $_SESSION["nim"] ?></td>
                        </tr>
                        <tr name="Full Name">
                          <td>Full Name</td>
                          <td><?php echo $_SESSION["fname"] ?></td>
                        </tr>
                        <tr name="Username">
                          <td>Username</td>
                          <td><?php echo $_SESSION["username"] ?></td>
                        </tr>
                        <tr name="Email">
                          <td>Email</td>
                          <td><?php echo $_SESSION["email"] ?></td>
                        </tr>
                      </tbody>
                      </table>
                      <a href="profile.php" class="btn btn-primary">See Profile</a>
                    </div>
          </div>
          </div>
        </div>
        <div class="col-md-25">
            <table class="table">
              <thead class="thead bg-primary text-white rounded">
                <tr>
                  <th>Status \ Level</th>
                  <th>Easy</th>
                  <th>Medium</th>
                  <th>Hard</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-success">
                  <td>Success</td>
                  <td>
                      <?php
                      $username = $_SESSION['username'];
                      $query = "SELECT hasil.id, hasil.status, raw_data.level, count(*) AS jumlah from hasil INNER JOIN raw_data ON hasil.id_soal = raw_data.id_soal WHERE hasil.username = '$username' AND STATUS = 'Success' AND LEVEL = 'Easy'";   
                      $result = $mysqli->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>    
                      <?php echo $row['jumlah'] ?>
                       <?php    } }?>                  
                  </td>
                  <td>
                      <?php
                      $username = $_SESSION['username'];
                      $query = "SELECT hasil.id, hasil.status, raw_data.level, count(*) AS jumlah from hasil INNER JOIN raw_data ON hasil.id_soal = raw_data.id_soal WHERE hasil.username = '$username' AND STATUS = 'Success' AND LEVEL = 'Medium'";   
                      $result = $mysqli->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>    
                      <?php echo $row['jumlah'] ?>
                       <?php    } }?>                      
                  </td>
                  <td>
                      <?php
                      $username = $_SESSION['username'];
                      $query = "SELECT hasil.id, hasil.status, raw_data.level, count(*) AS jumlah from hasil INNER JOIN raw_data ON hasil.id_soal = raw_data.id_soal WHERE hasil.username = '$username' AND STATUS = 'Success' AND LEVEL = 'Hard'";   
                      $result = $mysqli->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>    
                      <?php echo $row['jumlah'] ?>
                       <?php    } }?>,                      
                  </td>
                </tr>
                <tr class="table-danger">
                  <td>Failed</td>
                  <td>
                      <?php
                      $username = $_SESSION['username'];
                      $query = "SELECT hasil.id, hasil.status, raw_data.level, count(*) AS jumlah from hasil INNER JOIN raw_data ON hasil.id_soal = raw_data.id_soal WHERE hasil.username = '$username' AND STATUS = 'Failed' AND LEVEL = 'Easy'";   
                      $result = $mysqli->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>    
                      <?php echo $row['jumlah'] ?>
                       <?php    } }?>                    
                  </td>
                  <td>
                      <?php
                      $username = $_SESSION['username'];
                      $query = "SELECT hasil.id, hasil.status, raw_data.level, count(*) AS jumlah from hasil INNER JOIN raw_data ON hasil.id_soal = raw_data.id_soal WHERE hasil.username = '$username' AND STATUS = 'Failed' AND LEVEL = 'Medium'";   
                      $result = $mysqli->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>    
                      <?php echo $row['jumlah'] ?>
                       <?php    } }?>                    
                  </td>
                  <td>
                      <?php
                      $username = $_SESSION['username'];
                      $query = "SELECT hasil.id, hasil.status, raw_data.level, count(*) AS jumlah from hasil INNER JOIN raw_data ON hasil.id_soal = raw_data.id_soal WHERE hasil.username = '$username' AND STATUS = 'Failed' AND LEVEL = 'Hard'";   
                      $result = $mysqli->query($query);
                      if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        ?>    
                      <?php echo $row['jumlah'] ?>
                       <?php    } }?>                    
                  </td>
                </tr>
               <tr class="table-secondary">
                  <td>Not Yet</td>
                  <td>22</td>
                  <td>14</td>
                  <td>12</td>
                </tr>                
              </tbody>
            </table>
        </div>        
    </div>
=======
      <div class="col-md-25" style="margin-top:7%">
          <div class="alert alert-primary alert-dismissible fade show shadow-sm">
            <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
            <strong>Hi <?php echo $_SESSION["fname"] ?>! </strong> Welcome Back.
          </div>
          <div class="card-header bg-primary text-white rounded">
              Profile's Data
          </div>
          <div class="card mb-3 shadow rounded">
                <div class="card-group" style="width:100%"><br>
          <?php
          $username = $_SESSION['username'];
          $query = "SELECT * from upload WHERE username = '$username'";
          $result = mysqli_query($mysqli,$query);   
          if ($result = $mysqli->query($query)) {
            while ($row = mysqli_fetch_array($result)) {
            ?>    
      <tr>
        <td>
          <img class="card-img-top" src="<?php echo "../assets/img/user_img/".$row['nama_file'] ?>" alt="Card image" style="width:30%; padding:2%;">
        </td>   
      </tr>
           <?php    } }?>   
                
                  <div class="card-body">
                    <table class="table">
                    <tbody class="table-bordered">
                      <tr name="NIM">
                        <td>NIM</td>
                        <td><?php echo $_SESSION["nim"] ?></td>
                      </tr>
                      <tr name="Full Name">
                        <td>Full Name</td>
                        <td><?php echo $_SESSION["fname"] ?></td>
                      </tr>
                      <tr name="Username">
                        <td>Username</td>
                        <td><?php echo $_SESSION["username"] ?></td>
                      </tr>
                      <tr name="Email">
                        <td>Email</td>
                        <td><?php echo $_SESSION["email"] ?></td>
                      </tr>
                    </tbody>
                    </table>
                    <a href="profile.php" class="btn btn-primary">See Profile</a>
                  </div>
        </div>
        </div>
          <div class="card-header bg-primary text-white rounded">
              Profile's Progress
          </div>
          <div class="card mb-3 shadow rounded">
              <div class="card-group" style="width:100%"><br>
              <div class="card-body">
                  <script src="https://code.highcharts.com/highcharts.js"></script>
                  <script src="https://code.highcharts.com/modules/exporting.js"></script>
                  <script src="https://code.highcharts.com/modules/export-data.js"></script>
                  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                  <figure class="highcharts-figure">
                  <div id="container"></div>
                  <p class="highcharts-description">
                  Chart showing stacked horizontal bars. This type of visualization is
                  great for comparing data that accumulates up to a sum.
                  </p>
                  </figure>
                  <script id="rendered-js">
                  Highcharts.chart('container', {
                    chart: {
                      type: 'bar'
                    },
                    title: {
                      text: "Christian Anelka's Progress Bar"
                    },
                    legend: {
                        enabled: false
                    },
                    xAxis: {
                      categories: ['Easy', 'Medium', 'Hard']
                    },
                    yAxis: {
                      min: 0,
                      title: {
                        text: 'Total Quest'
                      }
                    },
                    legend: {
                      reversed: true
                    },
                    plotOptions: {
                      series: {
                        stacking: 'normal'
                      }
                    },
                    series: [{
                      name: 'Undone',
                      data: [15, 12, 10],
                      color: 'gray'
                    }, {
                      name: 'Failed',
                      data: [4, 1, 9],
                      color: '#dc3545'
                    }, {
                      name: 'Success',
                      data: [6, 7, 11],
                      color: '#28a745'
                    }]
                  });
                      </script>
              </div>
          </div>
        </div>
      </div>
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
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
