<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $nim = $password = $confirm_password  = $email = $fname =  "";
$username_err = $nim_err = $password_err = $confirm_password_err = $email_err = $fname_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_users FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

        // Validate username
    if(empty(trim($_POST["nim"]))){
        $nim_err = "Please enter a nim.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_users FROM users WHERE nim = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_nim);
            
            // Set parameters
            $param_nim = trim($_POST["nim"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $nim_err = "This name is already used.";
                } else{
                    $nim = trim($_POST["nim"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a Email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_users FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already used.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate username
    if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter a fname.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_users FROM users WHERE fname = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_fname);
            
            // Set parameters
            $param_fname = trim($_POST["fname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $fname_err = "This name is already used.";
                } else{
                    $fname = trim($_POST["fname"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($fname_err) && empty($nim_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email, fname, nim) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_email, $param_fname, $param_nim);
            
            // Set parameters
            $param_username = $username;
            $param_password = md5($password); // Creates a password hash
            $param_email    = $email;
            $param_fname    = $fname;
            $param_nim      = $nim;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $sql1 = "INSERT INTO upload (username, nama_file) VALUES (:username, 'default.jpg')";
                $stmt = $db->prepare($sql1);
                $params = array(
                  ":username" => $username
              );
                $saved = $stmt->execute($params);
                if($saved) header("Location: login.php");
                // Redirect to login page
                // header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($mysqli);
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
    Fill Up With Your Data
    </div>
    <div class="card-group shadow-lg" style="width:100%"><br>
    <img class="card-img-top" src="assets/img/Index_BG.png" alt="Card image" style="width:55%; height:1%; padding:6%;">
      <div class="card-body">
      <h2>Register</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
          <label for="usr">Username:</label>
          <input type="text" style="height:10%;" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($nim_err)) ? 'has-error' : ''; ?>">
          <label for="nim">NIM:</label>
          <input type="text" style="height:10%;" class="form-control" id="nim" name="nim" value="<?php echo $nim; ?>">
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
          <label for="name">Full Name:</label>
          <input type="text" style="height:10%;" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>">
          <span class="help-block"><?php echo $fname_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
          <label for="mail">Your Email:</label>
          <input type="email" style="height:10%;" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
          <span class="help-block"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label for="pwd">Password:</label>
          <input type="password" style="height:10%;" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
          <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
          <label for="pwd">Confirm Password:</label>
          <input type="password" style="height:10%;" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password; ?>">
          <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <input type="submit" class="btn btn-primary" name="register" value="Sign Up"></input>
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
