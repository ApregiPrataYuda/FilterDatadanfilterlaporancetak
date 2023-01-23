
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Add</span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span class="badge badge-secondary"> Home</span></a></li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content col-md-12">

  <!-- general form elements disabled -->
  <div class="card card-info">
    <div class="card-header" style="background-color:RGB(40, 178, 170);">
      <h3 class="card-title">Tambah file</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <?php echo form_open_multipart('kirim_email/send');?>
       
        
     <div class="form-group">
            <label>Nama Lengkap</label>
            <input class="form-control" type="text" name="nama">
          </div>
          <div class="form-group">
            <label>nik</label>
            <input class="form-control" type="text" name="nik">
          </div>
          <div class="form-group">
            <label>Komentar</label>
            <textarea class="form-control" name="catatan" rows="4"></textarea>
          </div>

          <div class="form-group">
            <label>Alamat Email Saya</label>
            <input class="form-control" type="text" name="email">
          </div>


          <!-- <div class="form-group">
            <label>File</label>
            <input class="form-control" type="text" name="CC">
          </div> -->

        <div class="row ml-auto mb-3 mr-5">
        <button type="submit" class="btn btn-primary">Email Tujuan</button>
        </div>
        <?php form_close()?>
        
    </div>
    <!-- /.card-body -->
  </div>
</section>

