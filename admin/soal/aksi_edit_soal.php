<?php
$id 		=	$_POST['id_soal'];
$isi_soal	=	$_POST['isi_soal'];
$answer		= 	$_POST['answer'];
$level		=	$_POST['level'];
$kode_soal	=	$_POST['kode_soal'];

include("../koneksi.php");

$sql="UPDATE raw_data SET isi_soal='$isi_soal', answer='$answer', level='$level', kode_soal='$kode_soal' WHERE id_soal='$id'";

$query=mysqli_query($mysqli,$sql);
if ($query) {
	header("location:../index.php?hal=soal&pesan=berhasil_edit");
}else{
	header("location:../index.php?hal=soal&pesan=gagal_edit");
	echo mysqli_error();
	echo "$sql";
}


