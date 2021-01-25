<?php
$NIM		=	$_POST['NIM'];
$username 	=	$_POST['username'];
$password	=	md5($_POST['password']);
$fname		=	$_POST['fname'];
$email		=	$_POST['email'];
$level 		=	$_POST['level'];

include("../koneksi.php");

$sql = "INSERT INTO users(NIM, username, password, fname, email, level) VALUES('$NIM', '$username', '$password', '$fname', '$email', '$level')";

$query = mysqli_query($mysqli,$sql);
if ($query) {
	$sql1 = "INSERT INTO upload (username, nama_file) VALUES ('$username', 'default.jpg')";
	$query1 = mysqli_query($mysqli,$sql1); 	
	header("location:../index.php?hal=pengguna&pesan=berhasil_tambah");
}else{
	header("location:../index.php?hal=pengguna&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql";
}


