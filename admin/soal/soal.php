
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Soal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Daftar Soal</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <a href="index.php?hal=tambah_soal">
              <input type="button" value="Tambah" class="btn btn-primary" name="">
              </a>
              <a href="soal/cetak.php">
              <input type="button" value="Cetak PDF" class="btn btn-warning " name="">
              </a>
              <a href="soal/export.php">
              <input type="button" value="Cetak Excel" class="btn btn-success " name="">
              </a>

              <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4' style="float: right;">
                  <form method="POST">
                  <div class='input-group'>
                    <input type='text' class='form-control' name='kata' placeholder='Cari Sesuatu' />
                    <span class="input-group-btn">
                      <input type='submit' class='btn btn-info' name="cari" value="Cari">
                    </span>

                  </div>
                </form>

              </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table align="center" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Soal</th>         
                  <th>Isi Soal</th>
                  <th>Jawaban</th>
                  <th>Level</th>
                  <th>Kode Soal</th>
                  <td align="center" ><b>Aksi</b></td>
                </tr>
                </thead>
                <tbody>
<?php
if(!ISSET($_POST['cari'])){

$sql = "SELECT * FROM raw_data";
$query = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($query)){

?>
            <tr>
              <td><?php echo $row['id_soal']?></td>
              <td><?php echo mb_strimwidth($row['isi_soal'], 0, 200, "...")?></td>
              <td><?php echo mb_strimwidth($row['answer'], 0, 200, "...")?></td>
              <td><?php echo $row['level']?></td>
              <td><?php echo $row['kode_soal']?></td>
              <td align="center" width="20%;">
                    <a href="index.php?hal=edit_soal&id_soal=<?php echo $row['id_soal']?>">
                      <button type="button" class="btn btn-warning" name=""> 
                        <i class="fa fa-pencil"></i> Edit
                      </button>
                      </a>
                    <a onclick="return confirm('Anda Yakin...?')" href="soal/hapus_soal.php?id_soal=<?php echo $row['id_soal']?>">
                      <button type="button" class="btn btn-danger" name=""> 
                        <i class="fa fa-trash"></i> Hapus
                      </button>
                    </a>
              </td>
            </tr>

<?php } } ?>

<?php if (ISSET($_POST['cari'])){
 $cari = $_POST['kata'];
 $query2 = "SELECT * FROM raw_data WHERE isi_soal LIKE '%$cari%'";
 
 $sql = mysqli_query($mysqli, $query2);
 while ($r = mysqli_fetch_array($sql)){
  ?>
            <tr>
              <td><?php echo $r['id_soal']?></td>
              <td><?php echo mb_strimwidth($r['isi_soal'], 0, 200, "...")?></td>
              <td><?php echo mb_strimwidth($r['answer'], 0, 200, "...")?></td>
              <td><?php echo $r['level']?></td>
              <td><?php echo $r['kode_soal']?></td>
              <td align="center" width="50%;">
                    <a href="index.php?hal=edit_soal&id_soal=<?php echo $r['id_soal']?>">
                      <button type="button" class="btn btn-warning" name=""> 
                        <i class="fa fa-pencil"></i> Edit
                      </button>
                      </a>
                    <a onclick="return confirm('Anda Yakin...?')" href="soal/hapus_soal.php?id_soal=<?php echo $r['id_soal']?>">
                      <button type="button" class="btn btn-danger" name=""> 
                        <i class="fa fa-trash"></i> Hapus
                      </button>
                    </a>
              </td>
            </tr>  
 <?php }} ?>

                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>