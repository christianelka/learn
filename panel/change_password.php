<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
require_once("../auth.php"); 
// Include config file
require_once "../config.php";

if(isset($_POST['Submit'])){
 $oldpass=md5($_POST['password']);
 $username = $_SESSION['username'];
 $newpassword=md5($_POST['npwd']);
 $sql=mysqli_query($mysqli,"SELECT password FROM users where password='$oldpass' && username='$username'");
 $num=mysqli_fetch_array($sql);
if($num>0){
 $mysqli=mysqli_query($mysqli,"update users set password='$newpassword' where username='$username'");
$_SESSION['msg1']="Password Changed Successfully !!";
header("location: ../logout.php");
} else{
$_SESSION['msg1']="Old Password not match !!";
}
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
    .alert, .container {
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
<script type="text/javascript">
    function valid()
    {
    if(document.chngpwd.opwd.value=="")
    {
    alert("Old Password Filed is Empty !!");
    document.chngpwd.opwd.focus();
    return false;
    }
    else if(document.chngpwd.npwd.value=="")
    {
    alert("New Password Filed is Empty !!");
    document.chngpwd.npwd.focus();
    return false;
    }
    else if(document.chngpwd.cpwd.value=="")
    {
    alert("Confirm Password Filed is Empty !!");
    document.chngpwd.cpwd.focus();
    return false;
    }
    else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
    {
    alert("Password and Confirm Password Field do not match  !!");
    document.chngpwd.cpwd.focus();
    return false;
    }
    return true;
    }
</script>
</head>

<body>


    <!-- Page Content -->
    <div class="container">

        <div class="row" style="margin-top:7%">
            <div class="col-lg-12 text-center">
                <h1>Change your Password</h1>
             <form name="chngpwd" action="" method="post" onSubmit="return valid();">
              <table align="center">
			  <tr height="50">
			  <td>Old Password :</td>
			  <td><input type="password" name="password" id="password" class="form-control"></td>
			  </tr>
		  <tr height="50">
			  <td>New Passowrd :</td>
			  <td><input type="password" name="npwd" id="npwd" class="form-control"></td>
			  </tr>
		  <tr height="50">
			  <td>Confirm Password :</td>
			  <td><input type="password" name="cpwd" id="cpwd" class="form-control"></td>
			  </tr>
			  <tr>
			  <td><a href="profile.php">Back to Profile Page</a></td>
			  <td><input type="submit" class="btn btn-info" name="Submit" value="Change Passowrd" /></td>
			  </tr>
                <tr>
              <td></td>
              <td></td>
              </tr>
			  </table>
			  </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
<footer class="page-footer font-small blue fixed">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://ptik.fkip.uns.ac.id/"> Pendidikan TIK UNS / 2019</a>
  </div>
  <!-- Copyright -->

</footer>
</html>
