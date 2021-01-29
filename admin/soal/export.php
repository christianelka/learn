<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>

<h3>Data Soal</h3>
		
<table border="1" cellpadding="5">
	<tr>
	  <th>ID Soal</th>         
      <th>Isi Soal</th>
      <th>Jawaban</th>
      <th>Level</th>
      <th>Kode Soal</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "../../config.php";
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($mysqli, "SELECT * FROM raw_data");
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$data['id_soal']."</td>";
		echo "<td>".mb_strimwidth($data['isi_soal'], 0, 200, "...")."</td>";
		echo "<td>".mb_strimwidth($data['answer'], 0, 200, "...")."</td>";
		echo "<td>".$data['level']."</td>";
		echo "<td>".$data['kode_soal']."</td>";
		echo "</tr>";

	}
	?>
</table>
