<?php
include("../koneksi.php");
$sql="DELETE FROM raw_data WHERE id_soal='$_GET[id_soal]'";
$query=mysqli_query($mysqli,$sql);
if ($query) {
	header("location:../index.php?hal=soal&pesan=berhasil_hapus");
}else{
	header("location:../index.php?hal=soal&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>