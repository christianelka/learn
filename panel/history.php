<<<<<<< HEAD
<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
require_once("../auth.php"); 
// Include config file
require_once "../config.php";

?>
=======
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
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
    .content {
      margin-top: 75px;
    }
}
  @media screen and (max-height: 1200px){
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
  }
}
  </style>
=======
    .alert {
      margin-top: 75px;
    }
  }
</style>
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
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
                  <li class="nav-item">
                      <a class="nav-link" href="training.php">Training</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="history.php">History Training <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="progress.php">Progress</a>
                  </li>
              </ul>
              <ul class="navbar-nav">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
<<<<<<< HEAD
                    <?php echo $_SESSION['fname']?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
=======
                    Christian Anelka Manik
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Edit Profile</a>
                    <a class="dropdown-item" href="#">Logout</a>
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
                  </div>
                </li>
              </ul>
          </div>
      </nav>
<<<<<<< HEAD
      <div class="content">
          <div class="container-fluid">
              <div class="row" style="margin-top:7%">
                <?php
                $username = $_SESSION['username'];
                $query = "SELECT hasil.latihan_ke, hasil.tanggal, hasil.nilai, hasil.status, hasil.id_soal, hasil.waktu_mulai, hasil.user_summary, raw_data.level, raw_data.id_soal FROM hasil INNER JOIN history ON hasil.id = history.id_hasil INNER JOIN raw_data ON history.id_soal = raw_data.id_soal WHERE hasil.username = '$username' ORDER BY hasil.latihan_ke DESC";
                $result = $mysqli->query($query);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
                <?php
                $waktu = $row['waktu_mulai'];

                $menit   = floor($waktu / (60));
                $detik = $waktu - $menit * (60);

                if (0 < $waktu AND $waktu <= 240 ) {
                  $kode_waktu = 'A';
                }elseif (241 <= $waktu AND $waktu <= 420) {
                  $kode_waktu = 'B';
                }elseif (421 <= $waktu AND $waktu <= 600) {
                  $kode_waktu = 'C';
                }elseif (601 <= $waktu AND $waktu <= 720) {
                  $kode_waktu = 'D';
                } else {
                  $kode_waktu = 'E';
                }

                if ($row['nilai'] > 85) {
                  $score = 'A';
                  $status = 'Success';
                } elseif (76 <= $row['nilai'] AND $row['nilai'] <= 85) {
                  $score = 'B';
                  $status = 'Success';
                } elseif (66 <= $row['nilai'] AND $row['nilai'] <= 75) {
                  $score = 'C';
                  $status = 'Failed';
                } elseif (56 <= $row['nilai'] AND $row['nilai'] <= 65) {
                  $score = 'D';
                  $status = 'Failed';
                } else {
                  $score = 'E';
                  $status = 'Failed';
                }
                // $status = $row['status'];

                if ($status == "Failed") {
                  ?>
                  <div class="col-lg-12 col-sm-6" >
                    <div class="card">
                        <div class="card-header">
                            <h7 class="title text-danger"><?php echo $row['latihan_ke'];?> | <?php echo $row['tanggal'];?></h7>
                            <u><h7 class="title text-danger" style="float: right;"><?php echo $row['status'];?></h7></u>
                        </div>

                        <div class="card-body">
                            <span class="text-danger">Kode Soal : <?php echo $row['id_soal'];?> (<?php echo $row['level'];?>)</span>
                            <span class="text-danger" style="float: right;">Lama Pengerjaan : <?php echo $menit .  ' menit ' . floor( $detik ) . ' detik' . ' (' . $kode_waktu . ')'; ?></span>
                            <p align="justify"> </p>
                            <div class="alert alert-danger alert-with-icon" data-notify="container">                      
                                <span data-notify="icon" class="fa fa-info-circle"></span>
                                <span data-notify="message"> <p><?php echo $row['user_summary'];?></p></span>

                            </div>
                            <span class="text-danger">Score : <?php echo $row['nilai'];?> / 100 (<?php echo $score; ?>)</span>
                            <a href="progress.php" class="btn-sm btn-danger" style="float: right; text-decoration: none;">See Full Detail</a>
                        </div>
                        </div><br>
                <?php } else { ?>
                  <div class="col-lg-12 col-sm-6" >
                    <div class="card">
                        <div class="card-header">
                            <h7 class="title text-success"><?php echo $row['latihan_ke'];?> | <?php echo $row['tanggal'];?></h7>
                            <u><h7 class="title text-success" style="float: right;"><?php echo $row['status'];?></h7></u>
                        </div>

                        <div class="card-body">
                            <span class="text-success">Kode Soal : <?php echo $row['id_soal'];?> (<?php echo $row['level'];?>)</span>
                            <span class="text-success" style="float: right;">Lama Pengerjaan : <?php echo $menit .  ' menit ' . floor( $detik ) . ' detik' . ' (' . $kode_waktu . ')'; ?></span>
                            <p align="justify"> </p>
                            <div class="alert alert-success alert-with-icon" data-notify="container">                      
                                <span data-notify="icon" class="fa fa-info-circle"></span>
                                <span data-notify="message"> <p><?php echo $row['user_summary'];?></p></span>

                            </div>
                            <span class="text-success">Score : <?php echo $row['nilai'];?> / 100 (<?php echo $score; ?>)</span>
                            <a href="progress.php" class="btn-sm btn-success" style="float: right; text-decoration: none;">See Full Detail</a>
                        </div>
                        </div><br>
                        <?php }?>
                        </div>
               <?php }} else { ?>
                      <div class="col-lg-12 col-sm-6" >
                    <div class="card">
                        <div class="card-header">
                            No Result
                        </div>
              <?php }?>
                  </div>     
                </div>
              </div>
             </div>
          </div>
        </div>
</body>
<!-- <footer class="footer font-small blue fixed"> -->

  <!-- Copyright -->
<!--   <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://ptik.fkip.uns.ac.id/"> Pendidikan TIK UNS / 2019</a>
  </div> -->
  <!-- Copyright -->

<!-- </footer> -->
=======
      <!-- Content -->
      <div class="col-md-25" style="margin-top:7%">
          <!-- <div class="alert alert-primary alert-dismissible fade show shadow-sm"> -->
            <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
            <!-- <strong>Hi Christian Anelka Manik!</strong> Welcome Back.
          </div> -->
          <div class="card-header bg-white text-black rounded">
              Profile's History
          </div>
          <div class="card mb-3 shadow rounded">
                <div class="card-group" style="width:100%"><br>
                  <div class="card-body">
                    <table class="table">
                    <tbody class="table-bordered">
                      <tr name="title">
                        <td>#</td>
                        <td>Username</td>
                        <td>Level</td>
                        <td>Total Quest</td>
                        <td class="table-info">Done Quest</td>
                        <td class="table-success">Success</td>
                        <td class="table-danger">Fail</td>
                        <td class="table-secondary">Undone Quest</td>
                        <td align="center">Action</td>
                      </tr>
                      <tr name="isi">
                        <td>1</td>
                        <td>Anelka</td>
                        <td>Easy</td>
                        <td>30</td>
                        <td class="table-info">10</td>
                        <td class="table-success">8</td>
                        <td class="table-danger">2</td>
                        <td class="table-secondary">20</td>
                        <td align="center"><a href="#" class="btn btn-outline-info btn-sm">See Full Details</a></td>
                      </tr>
                      <tr name="isi">
                        <td>2</td>
                        <td>Anelka</td>
                        <td>Medium</td>
                        <td>20</td>
                        <td class="table-info">20</td>
                        <td class="table-success">15</td>
                        <td class="table-danger">5</td>
                        <td class="table-secondary">0</td>
                        <td align="center"><a href="#" class="btn btn-outline-info btn-sm">See Full Details</a></td>
                      </tr>
                      <tr name="isi">
                        <td>3</td>
                        <td>Anelka</td>
                        <td>Hard</td>
                        <td>25</td>
                        <td class="table-info">12</td>
                        <td class="table-success">7</td>
                        <td class="table-danger">5</td>
                        <td class="table-secondary">13</td>
                        <td align="center"><a href="#" class="btn btn-outline-info btn-sm">See Full Details</a></td>
                      </tr>
                    </tbody>
                    </table>
                  </div>
        </div>
        </div>
      </div>
  </div>
</body>
<div class="footer">
<footer class="page-footer font-small blue fixed">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://ptik.fkip.uns.ac.id/"> Pendidikan TIK UNS / 2019</a>
  </div>
  <!-- Copyright -->

</footer>
</div>
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
</html>
