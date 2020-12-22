<?php 

require_once("config.php");

// Define variables and initialize with empty values
$data = $username = $password = $name = $email = "";
$data_err = $password_err = "";

if(isset($_POST['login'])){

    // Check if username is empty
    if(empty(trim($_POST["data"]))){
        $data_err = "Please enter username.";
    } else{
        $data = trim($_POST["data"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  

    // Prepare a select statement
    $sql = "SELECT * FROM users WHERE username=:data OR email=:data";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":data" => $data
        // ":email" => $data
    );

    $stmt->execute($params);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // Password is correct, so start a new session
            session_start();

            // Store data in session variables
            $_SESSION["user"] = $user;
            $_SESSION["username"] = $username;
            $_SESSION["email"]    = $email;
            $_SESSION["name"]     = $name;
            // Redirect user to home page
            header("Location: panel/index.php");
        } else{
            // Display an error message if password is not valid
            $password_err = "The password you entered was not valid.";
        }
    } else{
        // Display an error message if username doesn't exist
        $data_err = "No account found with that username.";
    }
}
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
  <div class="col-md-15" style="margin-top:2%">
    <p>&nbsp<u><a href="index.php">Home</a></u></p>
    <div class="alert alert-primary shadow-sm alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Login With Your Account!
    </div>
    <div class="card-group shadow-lg" style="width:100%"><br>
    <img class="card-img-top" src="assets/img/Index_BG.png" alt="Card image" style="width:55%; padding:6%;">
      <div class="card-body">
      <br><h2>Login</h2>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group <?php echo (!empty($data_err)) ? 'has-error' : ''; ?>">
              <label>Username</label>
              <input type="text" name="data" class="form-control" value="<?php echo $data; ?>">
              <span class="help-block"><?php echo $data_err; ?></span>
          </div>    
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label>Password</label>
              <input type="password" name="password" class="form-control">
              <span class="help-block"><?php echo $password_err; ?></span>
          </div>
        <input type="submit" class="btn btn-danger" name="login" value="Login"></input>
        <a href="register.php" type="submit" class="btn btn-primary">Register</a>
      </form>
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
