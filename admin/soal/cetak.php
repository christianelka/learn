<?php
require_once "../../config.php";
$hasil=mysqli_query($mysqli,"SELECT * FROM raw_data");

$content = '
	<style type="text/css">
		table{border-collapse: collapse; width: 100%; border:1px solid #e0e0e0;}
		table th{padding: 10px; background:#f8f8f8;}
		table td{padding: 10px;}
	</style>
';

$content .= '
	<page>

		<div style="padding:10px; background:#2196f3; color:#fff; text-align:center;">
			<span>LAPORAN DAFTAR SOAL</span>
		</div>
		<div style="padding:15px; text-align:center;">
			<span>DAFTAR SOAL</span>
		</div>
		
		<div style="width:100%;">
			<table align="center" border="1px" class="tabel" style="width:100%;" >
				<tr>
				  <th>ID Soal</th>
                  <th>Isi Soal</th>
                  <th>Jawaban</th>
                  <th>Level</th>
                  <th>Kode Soal</th>
				</tr>';
			$no = 0;
			while($row = mysqli_fetch_assoc($hasil) ){ 
			$no++;
				$content .= '
					<tr>
						<td>'.$row["id_soal"].'</td>
						<td>'.mb_strimwidth($row['isi_soal'], 0, 20, "...").'</td>
						<td>'.mb_strimwidth($row['answer'], 0, 20, "...").'</td>
						<td>'.$row["level"] .'</td>
						<td>'.$row["kode_soal"] .'</td>
					</tr>
				';
			}

$content .= '
			</table>
		</div>

	</page>
';

require_once '../../html2pdf/html2pdf.class.php';
$pdf = new HTML2PDF('p','A4','en');
$pdf->WriteHTML($content);
$pdf->Output('DataPengguna.pdf', 'D');
// $pdf->Output('DataDokter.pdf');
?>
