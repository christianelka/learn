<?php
$id 		=	$_POST['id_soal'];
$isi_soal	=	$_POST['isi_soal'];
$answer		= 	$_POST['answer'];
$level		=	$_POST['level'];
$kode_soal	=	$_POST['kode_soal'];

include("../koneksi.php");

$sql = "INSERT INTO raw_data(isi_soal, answer, level, kode_soal) VALUES('$isi_soal', '$answer', '$level', '$kode_soal')";

$query = mysqli_query($mysqli,$sql);
if ($query) {
	header("location:../index.php?hal=soal&pesan=berhasil_tambah");
}else{
	header("location:../index.php?hal=soal&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql";
}


