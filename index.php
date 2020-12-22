<?php
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["user"]) && $_SESSION["user"] === true){
    header("location: panel/index.php");
    exit;
}
// Include config file
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="app" class="container">
  <div class="col-md-15" style="margin-top:4%">
    <!-- <div class="card-header bg-white text-black shadow">
        Learning Online
    </div><br> -->
    <br><br>
    <div class="card mb-3 shadow-lg rounded">
    <div class="card-group" style="width:100%"><br>
    <img class="card-img-top" src="assets/img/Index_BG.png" alt="Card image" style="width:55%; padding:6%;">
      <div class="card-body">
        <br><h9>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</h9>
        <p>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.
        <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.<br></p>
        <br><a href="login.php" type="submit" class="btn btn-success">Login</a>
        <a href="register.php" type="submit" class="btn btn-primary">Register</a>
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
</html>
