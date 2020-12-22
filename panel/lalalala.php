<?php
  ob_start();
  require_once("../auth.php");
  require_once("../config.php");

  function microtime_float()
  {
      list($usec, $sec) = explode(" ", microtime());
      return ((float)$usec + (float)$sec);
  }
  $waktu_mulai = date('Y-m-d H:i:s');
  $query_1 = "SELECT * FROM raw_data";
  $result_1 = mysqli_query($mysqli, $query_1);
  // var_dump($result_1);

  if (mysqli_num_rows($result_1) > 0){
    $num_rows = mysqli_num_rows($result_1);
    if (!isset($_SESSION["id"])){
    // $id=rand(1,$num_rows);
      $_SESSION["id"] = rand(1,$num_rows);
    }
    $id = $_SESSION["id"];
    // echo $id;
    $query_2 = "SELECT isi_soal, level FROM raw_data WHERE id_soal = $id";
    $result_2 = mysqli_query($mysqli, $query_2);
    // var_dump($result_2);
    if ($result_2 = $mysqli -> query($query_2)){
    // // Fetch one and one row
      while ($row = $result_2 -> fetch_row()) {
        $Text=$row[0];
        $level=$row[1];
        // echo $Text;
    }
    mysqli_free_result($result_2);
    }
  // $time_start = microtime_float();
  }

  // unset($_SESSION['id']);
  // if (header("Refresh:0")){
  //   unset($_SESSION['id']);
  // }

?>
<!DOCTYPE html>
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
  .content{
      margin-top: 55px;
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
                    <?php echo $_SESSION['fname'] ?>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                  </div>
                </li>
              </ul>
          </div>
      </nav>
      <!-- Content -->
      <div class="content">
      <div class="col-lg-20" style="margin-top:4%; width: 100%;">
          <div class="card-header bg-white text-primary rounded b">
              Reading Comprehension
          </div>
          <div class="card mb-3 shadow rounded">
                <div class="card-group" style="width:100%">
                  <div class="card-body">
                    <?php echo "<p>" .nl2br($Text). "</p>"; ?>
                    <?php echo "<p>" ."ID TEXT $id". " (" .$level. ")</p>"; ?>
                      <form action="" method="POST">
                        <button name="GOs" class="btn btn-dark" data-toggle="modal" data-target="#myModal">
                        Ganti Soal </button></form>
                      </form>                    
                  </div>
        </div>
        </div>
          <div class="card-header bg-white text-primary rounded b">
              Answer Here
          </div>
          <div class="card mb-3 shadow rounded">
              <div class="card-group" style="width:100%">
              <div class="card-body">
              <div class="form-group">
                <form action="" method="POST">
                  <label for="comments">Comment:</label>
                  <textarea name="comment" class="form-control" rows="5" id="comment" required></textarea>
                  </div>
                  <p><button type="submit" class="btn btn-dark" name="GO">Cek Ringkasan </button>
                </form>
              </div>
          </div>
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
</php>
<?php  

  if(isset($_POST['GOs'])){
    unset($_SESSION['id']);
    header("Refresh:0;url='http://localhost/learn/panel/training.php'");
  }

  if(isset($_POST['GO']))
  {
    $waktu_selesai = date('Y-m-d H:i:s');

    $NIM = $_SESSION['username'];
    var_dump($NIM);
    $texts = htmlentities(mysqli_real_escape_string($mysqli,$_POST['comment']));
    $query = "INSERT INTO hasil(username, user_summary, id_soal, waktu_mulai, waktu_selesai) VALUES ('$NIM', '$texts', '$id', '$waktu_mulai', '$waktu_selesai')";
    mysqli_query($mysqli, $query);
    $command = "python update.py $id $NIM";
    // var_dump($command);
    $output = shell_exec($command);
    var_dump($output);

    $id_hasil = mysqli_query($mysqli, "SELECT MAX(id) FROM hasil");
    $id_hasils = mysqli_fetch_row($id_hasil);
    $id_hasilss  = $id_hasils[0];
    $query = "INSERT INTO history(username, id_hasil, id_soal) VALUES ('$NIM', '$id_hasilss', $id)";
    mysqli_query($mysqli, $query);


    $res = mysqli_query($mysqli, "SELECT MAX(id) FROM hasil");
    $ress = mysqli_fetch_row($res);
    $re = $ress[0];

    unset($_SESSION['id']);
    unset($time_end);
    header("Refresh:2;url='http://localhost/learn/panel/history.php'");
    exit();    
  }
ob_end_flush();
unset($_POST['GO']);
?>