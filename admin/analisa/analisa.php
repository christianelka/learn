
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Analisa Hasil Latihan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Analisa Hasil Latihan</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
<!--               <a href="index.php?hal=tambah_pengguna">
              <input type="button" value="Tambah" class="btn btn-primary" name="">
              </a> -->
              <a href="analisa/cetak.php">
              <input type="button" value="Cetak PDF" class="btn btn-warning " name="">
              </a>
              <a href="analisa/export.php">
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
                  <th>Username</th>
                  <th>Latihan Ke</th>         
                  <th>ID Soal</th>
                  <th>Level</th>
                  <th>Tanggal</th>
                  <th>Next Level</th>
                </tr>
                </thead>
                <tbody>
<?php
if(!ISSET($_POST['cari'])){

$sql = "SELECT * FROM hasil, raw_data WHERE hasil.id_soal = raw_data.id_soal ";
$query = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_array($query)){

?>
            <tr>
              <td><?php echo $row['username']?></td>              
              <td><?php echo $row['latihan_ke']?></td>
              <td><?php echo $row['id_soal']?></td>
              <td><?php echo $row['level']?></td>
              <td><?php echo $row['tanggal']?></td>
              <td>Next Level?</td>
            </tr>

<?php } } ?>

<?php if (ISSET($_POST['cari'])){
 $cari = $_POST['kata'];
 $query2 = "SELECT * FROM hasil, raw_data WHERE hasil.id_soal = raw_data.id_soal AND username LIKE '%$cari%'";
 
 $sql = mysqli_query($mysqli, $query2);
 while ($r = mysqli_fetch_array($sql)){
  ?>
            <tr>
              <td><?php echo $r['username']?></td>              
              <td><?php echo $r['latihan_ke']?></td>
              <td><?php echo $r['id_soal']?></td>
              <td><?php echo $r['level']?></td>
              <td><?php echo $r['tanggal']?></td>
              <td>Next Level?</td>
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