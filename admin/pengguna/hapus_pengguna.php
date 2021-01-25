<?php
include("../koneksi.php");
$sql="delete from users where id_users='$_GET[id]'";
$query=mysqli_query($mysqli,$sql);
if ($query) {
	header("location:../index.php?hal=pengguna&pesan=berhasil_hapus");
}else{
	header("location:../index.php?hal=pengguna&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>