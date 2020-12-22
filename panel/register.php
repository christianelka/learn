<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (fname, username, email, password) 
            VALUES (:fname, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":fname" => $fname,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
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
</head>
<body>
  <div id="app" class="container">
  <div class="col-md-15" style="margin-top:2%">
    <p>&nbsp<u><a href="index.php">Home</a></u></p>
    <div class="alert alert-primary shadow-sm alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Fill Up With Your Data
    </div>
    <div class="card-group shadow-lg" style="width:100%"><br>
    <img class="card-img-top" src="../assets/img/Index_BG.png" alt="Card image" style="width:55%; height:1%; padding:6%;">
      <div class="card-body">
      <h2>Register</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label for="usr">Username:</label>
          <input type="text" style="height:10%;" class="form-control" id="usr" name="username" required>
        </div>
        <div class="form-group">
          <label for="nama">Full Name:</label>
          <input type="text" style="height:10%;" class="form-control" id="fname" name="fname" required>
        </div>
        <div class="form-group">
          <label for="mail">Your Email:</label>
          <input type="text" style="height:10%;" class="form-control" id="mail" name="mail" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" style="height:10%;" class="form-control" id="pwd" name="password" required>
        </div>
        <div class="form-group">
          <label for="pwd">Confirm Password:</label>
          <input type="password" style="height:10%;" class="form-control" id="pwd" name="password" required>
        </div>
        <input type="submit" class="btn btn-primary">Register</input>
        &nbsp&nbspHave an account?&nbsp&nbsp
        <a href="login.php" type="submit" class="btn btn-danger">Login</a>
      <br><br></form>
      </div>
    </div>
  </div>
</div>
</body>
<!-- <div class="footer"> -->
<footer class="page-footer font-small blue fixed">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://ptik.fkip.uns.ac.id/"> Pendidikan TIK UNS / 2019</a>
  </div>
  <!-- Copyright -->

<!-- </footer> -->
</div>
</html>
