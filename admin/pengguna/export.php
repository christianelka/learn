<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>

<h3>Data User</h3>
		
<table border="1" cellpadding="5">
	<tr>
	  <th>No</th>
      <th>NIM</th>                  
      <th>Username</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Level</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "../../config.php";
	
	// Buat query untuk menampilkan semua data siswa
	$sql = mysqli_query($mysqli, "SELECT * FROM user");
	
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$data['NIM']."</td>";
		echo "<td>".$data['username']."</td>";
		echo "<td>".$data['fname']."</td>";		
		echo "<td>".$data['email']."</td>";
		echo "<td>".$data['level']."</td>";
		echo "</tr>";

	}
	?>
</table>
