<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>

<h3>Data Hasil</h3>
		
<table border="1" cellpadding="5">
	<tr>
	  <th>Latihan Ke</th>         
      <th>Username</th>
      <th>ID Soal</th>
      <th>Soal</th>
      <th>Jawaban User</th>
      <th>Kunci Jawaban</th>
      <th>Nilai</th>
      <th>Status</th>
      <th>Tanggal</th>
      <th>Waktu Mulai</th>
      <th>Waktu Selesai</th>
	</tr>
	<?php
	// Load file koneksi.php
	$username  = $_GET['username'];
	include "../../config.php";
	$sql=mysqli_query($mysqli,"SELECT * FROM hasil WHERE username='$_GET[username]'");
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$data['latihan_ke']."</td>";
		echo "<td>".$data['username']."</td>";
		echo "<td>".$data['id_soal']."</td>";
		echo "<td>".mb_strimwidth($data['soal'], 0, 200, "...")."</td>";
		echo "<td>".mb_strimwidth($data['user_summary'], 0, 200, "...")."</td>";
		echo "<td>".mb_strimwidth($data['bot_summary'], 0, 200, "...")."</td>";				
		echo "<td>".$data['nilai']."</td>";
		echo "<td>".$data['status']."</td>";
		echo "<td>".$data['tanggal']."</td>";
		echo "<td>".$data['waktu_mulai']."</td>";
		echo "<td>".$data['waktu_selesai']."</td>";
		echo "</tr>";

	}
	?>
</table>
