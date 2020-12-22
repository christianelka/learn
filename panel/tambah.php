<<<<<<< HEAD
<?php

// Sumber : https://github.com/petanikode/php-login-register
date_default_timezone_set('Asia/Jakarta');
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "summary";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("ERROR: Could not connect. " . $e->getMessage());
}

$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
    $income = filter_input(INPUT_POST, 'income', FILTER_SANITIZE_STRING);
    $credit_rate = filter_input(INPUT_POST, 'credit_rate', FILTER_SANITIZE_STRING);
    $student = filter_input(INPUT_POST, 'student', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO income (age, income, student, credit_rate) 
            VALUES (:age, :income, :student, :credit_rate)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":age" => $age,
        ":income" => $income,
        ":credit_rate" => $credit_rate,
        ":student" => $student
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    if($saved) header("Location: tambah.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Online</title>
  <meta charset="utf-8">
  <meta age="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  @media screen and (max-width: 1200px) {
    container{
      margin-top: 75px;
    }
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
  <div class="col-md-15" style="margin-top:2%">
    <div class="alert alert-primary shadow-sm alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Fill Up With Your Data
    </div>
    <div class="card-group shadow-lg" style="width:100%"><br>
      <div class="card-body">
      <h2>Add</h2>
      <form action="" method="POST">
          <div class="form-group">
            <label for="age">Input Your Age</label>
            <input type="number" name="age" class="form-control" placeholder="Input Your Age" required>
            <label for="income">Income:</label>
            <select class="form-control" id="income" name="income" required>
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
            </select>
            <label for="student">Student:</label>
            <select class="form-control" id="student" name="student" required>
                <option>Yes</option>
                <option>No</option>
            </select>
            <label for="credit_rate">Credit Rate:</label>
            <select class="form-control" id="credit_rate" name="credit_rate" required>
                <option>Fair</option>
                <option>Excellent</option>
            </select>
          </div>
            <input type="submit" name="submit" class="btn btn-info">
=======
<?php

// Sumber : https://github.com/petanikode/php-login-register
date_default_timezone_set('Asia/Jakarta');
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "summary";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("ERROR: Could not connect. " . $e->getMessage());
}

$mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
    $income = filter_input(INPUT_POST, 'income', FILTER_SANITIZE_STRING);
    $credit_rate = filter_input(INPUT_POST, 'credit_rate', FILTER_SANITIZE_STRING);
    $student = filter_input(INPUT_POST, 'student', FILTER_SANITIZE_STRING);


    // menyiapkan query
    $sql = "INSERT INTO income (age, income, student, credit_rate) 
            VALUES (:age, :income, :student, :credit_rate)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":age" => $age,
        ":income" => $income,
        ":credit_rate" => $credit_rate,
        ":student" => $student
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    if($saved) header("Location: tambah.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Online</title>
  <meta charset="utf-8">
  <meta age="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  @media screen and (max-width: 1200px) {
    container{
      margin-top: 75px;
    }
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
  <div class="col-md-15" style="margin-top:2%">
    <div class="alert alert-primary shadow-sm alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    Fill Up With Your Data
    </div>
    <div class="card-group shadow-lg" style="width:100%"><br>
      <div class="card-body">
      <h2>Add</h2>
      <form action="" method="POST">
          <div class="form-group">
            <label for="age">Input Your Age</label>
            <input type="number" name="age" class="form-control" placeholder="Input Your Age" required>
            <label for="income">Income:</label>
            <select class="form-control" id="income" name="income" required>
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
            </select>
            <label for="student">Student:</label>
            <select class="form-control" id="student" name="student" required>
                <option>Yes</option>
                <option>No</option>
            </select>
            <label for="credit_rate">Credit Rate:</label>
            <select class="form-control" id="credit_rate" name="credit_rate" required>
                <option>Fair</option>
                <option>Excellent</option>
            </select>
          </div>
            <input type="submit" name="submit" class="btn btn-info">
>>>>>>> d989c76403594ef72c3d19e9f119451a3039b9ae
      </form>