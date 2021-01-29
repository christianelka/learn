<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>

<h3>Data Analisa</h3>
		
<table border="1" cellpadding="5">
	<tr>
	  <th>Username</th>
      <th>Latihan Ke</th>         
      <th>ID Soal</th>
      <th>Level</th>
      <th>Tanggal</th>
      <th>Next Level</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "../../config.php";
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($mysqli, "SELECT * FROM hasil, raw_data WHERE hasil.id_soal = raw_data.id_soal");
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$data['username']."</td>";
		echo "<td>".$data['latihan_ke']."</td>";
		echo "<td>".$data['id_soal']."</td>";		
		echo "<td>".$data['level']."</td>";
		echo "<td>".$data['tanggal']."</td>";
		echo "<td>Next Level?</td>";
		echo "</tr>";

	}
	?>
</table>
