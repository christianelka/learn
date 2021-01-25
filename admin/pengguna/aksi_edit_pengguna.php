<?php
$id 		=	$_POST['id'];
$NIM		=	$_POST['NIM'];
$username 	=	$_POST['username'];
$fname		=	$_POST['fname'];
$email		=	$_POST['email'];
$level 		=	$_POST['level'];

include("../koneksi.php");

$sql="UPDATE users SET NIM='$NIM', username='$username', fname='$fname', email='$email', level='$level' WHERE id_users='$id'";

$query=mysqli_query($mysqli,$sql);
if ($query) {
	header("location:../index.php?hal=pengguna&pesan=berhasil_edit");
}else{
	header("location:../index.php?hal=pengguna&pesan=gagal_edit");
	echo mysqli_error();
	echo "$sql";
}


