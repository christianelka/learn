<?php
date_default_timezone_set('Asia/Jakarta');
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "learn";

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

function data($query){
	global $mysqli;
	$result = mysqli_query($mysqli,$query);
	return $result;
}
?>