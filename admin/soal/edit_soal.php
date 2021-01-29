<div class="content-wrapper" style="min-height: 956px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        EDIT DATA soal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Daftar Soal</a></li>
        <li class="active">Edit Soal</li>
      </ol>
    </section>
<?php
include ("koneksi.php");
$sql="SELECT * FROM raw_data WHERE id_soal='$_GET[id_soal]' ";
$query=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($query);
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Data Soal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="soal/aksi_edit_soal.php" method="POST">
              <div class="box-body">
<!--                 <div class="form-group">
                  <label>ID Soal</label>
                  <input type="text" class="form-control" placeholder="Enter ID Soal" name="id_soal" value="<?php echo $row['id_soal'];?>">
                </div> -->
                <div class="form-group">
                  <label>Isi Soal</label>
                  <input type="text" class="form-control" placeholder="Masukkan Isi Soal" name="isi_soal" value="<?php echo $row['isi_soal'];?>">
                </div> 
                <div class="form-group">
                  <label>Jawaban</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jawaban" name="answer" value="<?php echo $row['answer'];?>">
                </div>                                               
                <div class="form-group">
                  <label>Level Soal</label>
                  <select name="level" class="form-control">
                    <?php
                    if ($row['level']=='Very Easy'){
                     echo "
                     <option value='Very Easy' selected>Very Easy</option>
                     <option value='Easy'>Easy</option>
                     <option value='Medium'>Medium</option>
                     <option value='Hard'>Hard</option>
                     <option value='Expert'>Expert</option>";
                     }else if ($row['level']=='Easy'){
                     echo "
                     <option value='Very Easy'>Very Easy</option>
                     <option value='Easy' selected>Easy</option>
                     <option value='Medium'>Medium</option>
                     <option value='Hard'>Hard</option>
                     <option value='Expert'>Expert</option>";
                     }else if ($row['level']=='Medium'){
                     echo "
                     <option value='Very Easy'>Very Easy</option>
                     <option value='Easy'>Easy</option>
                     <option value='Medium' selected>Medium</option>
                     <option value='Hard'>Hard</option>
                     <option value='Expert'>Expert</option>";
                     }else if ($row['level']=='Hard'){
                     echo "
                     <option value='Very Easy'>Very Easy</option>
                     <option value='Easy'>Easy</option>
                     <option value='Medium'>Medium</option>
                     <option value='Hard' selected>Hard</option>
                     <option value='Expert'>Expert</option>";
                     }
                     else{
                     echo "
                     <option value='Very Easy'>Very Easy</option>
                     <option value='Easy'>Easy</option>
                     <option value='Medium'>Medium</option>
                     <option value='Hard'>Hard</option>
                     <option value='Expert' selected>Expert</option>";
                     }
                     ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Kode Soal</label>
                  <input type="text" class="form-control" placeholder="Masukkan Kode Soal" name="kode_soal" value="<?php echo $row['kode_soal'];?>">
                </div>                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="id_soal" value="<?php echo $row['id_soal'];?>">
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>