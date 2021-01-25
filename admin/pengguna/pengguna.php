
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengguna</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <a href="index.php?hal=tambah_pengguna">
              <input type="button" value="Tambah" class="btn btn-primary" name="">
              </a>
              <a href="pengguna/cetak.php">
              <input type="button" value="Cetak" class="btn btn-success " name="">
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table align="center" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>                  
                  <th>Username</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Level</th>
                  <td align="center" ><b>Aksi</b></td>
                </tr>
                </thead>
                <tbody>
<?php
include "koneksi.php";
$hasil=mysqli_query($mysqli,"select * from users");
$no=0;
while($row=mysqli_fetch_array($hasil)){
?>
                <tr>
                  <td><?php echo $no; $no++;?></td>
                  <td><?php echo $row['NIM']?></td>
                  <td><?php echo $row['username']?></td>
                  <td><?php echo $row['fname']?></td>
                  <td><?php echo $row['email']?></td>
                  <td><?php echo $row['level']?></td>
                  
                  <td align="center" width="30%;">
                    <a href="index.php?hal=edit_pengguna&id=<?php echo $row['id_users']?>">
                      <button type="button" class="btn btn-warning" name=""> 
                        <i class="fa fa-pencil"></i> Edit
                      </button>
                      </a>
                    <a onclick="return confirm('Anda Yakin...?')" href="pengguna/hapus_pengguna.php?id=<?php echo $row['id_users']?>">
                      <button type="button" class="btn btn-danger" name=""> 
                        <i class="fa fa-trash"></i> Hapus
                      </button>
                    </a>
                    <a href="index.php?hal=cek_hasil&username=<?php echo $row['username'] ?>">
                      <button type="button" class="btn btn-info" name="">
                        <i class="fa fa-book"></i> Cek Hasil
                      </button>
                    </a>
                  </td>
                </tr>
<?php } ?>
                </tfoot>
              </table>
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