<div class="content-wrapper" style="min-height: 956px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TAMBAH DATA pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengguna</a></li>
        <li class="active">Tambah Pengguna</li>
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
              <h3 class="box-title">Form tambah data pengguna</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="pengguna/aksi_tambah_pengguna.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label>NIM</label>
                  <input type="text" class="form-control" name="NIM" placeholder="Masukkan NIM">
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                </div> 
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="********">
                </div> 
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="fname" placeholder="Masukkan Full Name">
                </div>                      
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                  <label>Level Pengguna</label>
                  <select name="level" class="form-control">
                     <option placeholder="default" >Pilih Level</option>
                     <option value='admin'>Admin</option>
                     <option value='user'>User</option>"
                  </select>
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