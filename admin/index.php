<!DOCTYPE html>
<html>
<?php
include "style/pilih_style.php";

session_start();
require_once "../config.php";

// level checker
if($_SESSION['level'] != 'admin'){
  echo '<script language="javascript">alert("Hayo mau ngapain");document.location="../panel/index.php";</script>';
}

?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a class="logo disabled">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Learn</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $_SESSION['fname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <?php
            $username = $_SESSION['username'];
            $query = "SELECT * from upload WHERE username = '$username'";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              ?>
              <li class="user-header">
                <img src="<?php echo "../assets/img/user_img/".$row['nama_file'] ?>" class="img-circle" alt="User Image">
                <?php    } }?>   
                <p>
                  <?php echo $_SESSION["fname"] ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a class="dropdown-item" href="index.php?hal=edit_pengguna&id=<?php echo $_SESSION['id_users']?>">Edit Profile</a>
                <a class="dropdown-item" name="log-out" href="../logout.php">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
    include "menu.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <?php
    include "content.php";
  ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>© 2020 Copyright: <a href="https://ptik.fkip.uns.ac.id/"> Pendidikan TIK UNS / 2019</a>.</b>
    </div><br>
  </footer>
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
include "js/pilih_js.php";
?>
</body>
</html>
