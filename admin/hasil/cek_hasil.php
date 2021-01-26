
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Hasil Latihan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Hasil Latihan</a></li>
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
              <?php 
              $username   = $_GET['username'];
              ?>
              <a href="hasil/cetak_hasil.php?username=<?php echo $username?>">
              <input type="button" value="Cetak" class="btn btn-success " name="">
              </a>

              <div class='col-xs-12 col-sm-12 col-md-4 col-lg-4' style="float: right;">

                  <div class='input-group'>
                    <input class='form-control' type='text' name='search' placeholder='Cari Sesuatu' />
                    <span class="input-group-btn">
                      <button type='submit' class='btn btn-info'>
                        <span class='fa fa-search'></span>
                      </button>
                    </span>

                  </div>

              </div>

            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table align="center" id="example1" class="table table-bordered table-striped">
                <thead>
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
                </thead>
                <tbody>
<?php
include "koneksi.php";
$hasil=mysqli_query($mysqli,"SELECT * FROM hasil WHERE username='$_GET[username]'");
$no=0;
while($row=mysqli_fetch_array($hasil)){
?>
                <tr>
                  <td><?php echo $row['latihan_ke']?></td>
                  <td><?php echo $row['username']?></td>
                  <td><?php echo $row['id_soal']?></td>
                  <td><?php echo mb_strimwidth($row['soal'], 0, 200, "...")?></td>
                  <td><?php echo mb_strimwidth($row['user_summary'], 0, 200, "...")?></td>
                  <td><?php echo mb_strimwidth($row['bot_summary'], 0, 200, "...")?></td>
                  <td><?php echo $row['nilai']?></td>
                  <td><?php echo $row['status']?></td>
                  <td><?php echo $row['tanggal']?></td>
                  <td><?php echo $row['waktu_mulai']?></td>
                  <td><?php echo $row['waktu_selesai']?></td>
                  
<!--                   <td><a href="index.php?hal=edit_pengguna&id=<?php echo $row['id_users']?>"><button type="button" class="btn btn-warning" name=""> <i class="fa fa-pencil"></i> Edit</button></a>
                    <a onclick="return confirm('Anda Yakin...?')" href="pengguna/hapus_pengguna.php?id=<?php echo $row['id_users']?>">
                    <button type="button" class="btn btn-danger" name=""> <i class="fa fa-trash"></i> Hapus</button></a>
                  </td> -->
                </tr>
<?php } ?>
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