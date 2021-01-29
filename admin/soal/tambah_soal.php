<div class="content-wrapper" style="min-height: 956px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TAMBAH DATA SOAL
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Soal</a></li>
        <li class="active">Tambah Soal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form tambah Data Soal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="soal/aksi_tambah_soal.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label>Isi Soal</label>
                  <input type="text" class="form-control" placeholder="Masukkan Isi Soal" name="isi_soal">
                </div> 
                <div class="form-group">
                  <label>Jawaban</label>
                  <input type="text" class="form-control" placeholder="Masukkan Jawaban" name="answer">
                </div>                    
                <div class="form-group">
                  <label>Level Soal</label>
                  <select name="level" class="form-control">
                     <option placeholder="default" >Pilih Level</option>
                     <option value='Very Easy'>Very Easy</option>
                     <option value='Easy'>Easy</option>"
                     <option value='Medium'>Medium</option>
                     <option value='Hard'>Hard</option>"
                     <option value='Expert'>Expert</option>"
                  </select>
                </div>
                <div class="form-group">
                  <label>Kode Soal</label>
                  <input type="text" class="form-control" placeholder="Masukkan Kode Soal" name="kode_soal">
                </div>                      
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
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