<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["user"]) && $_SESSION["user"] === true){
    header("location: panel/index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $fname = $email = $nim = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_users, username, password, fname, email, nim FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id_users, $username, $hashed_password, $fname, $email, $nim);
                    if(mysqli_stmt_fetch($stmt)){
                        if(md5($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["user"] = true;
                            $_SESSION["id_users"] = $id_users;
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;
                            $_SESSION["email"]    = $email;
                            $_SESSION["fname"]    = $fname;
                            $_SESSION["nim"]      = $nim;
<<<<<<< HEAD
                            // $_SESSION["user"] = $user;
                            // $_SESSION["NIM"] = $NIM;
=======
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
                            
                            // Redirect user to welcome page
                            header("location: panel/index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
<<<<<<< HEAD
            // mysqli_stmt_close($stmt);
=======
            mysqli_stmt_close($stmt);
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
        }
    }
    
    // Close connection
<<<<<<< HEAD
    // mysqli_close($mysqli);
=======
    mysqli_close($mysqli);
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
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
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span>
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
