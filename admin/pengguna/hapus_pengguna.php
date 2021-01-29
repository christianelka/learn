<?php
include("../koneksi.php");
$sql="DELETE FROM users WHERE id_users='$_GET[id]'";
$query=mysqli_query($mysqli,$sql);
if ($query) {
	header("location:../index.php?hal=pengguna&pesan=berhasil_hapus");
}else{
	header("location:../index.php?hal=pengguna&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>