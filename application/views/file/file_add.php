

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">file Data add</span></h3>
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
    <?php echo form_open_multipart('file/add');?>
       
        <div class="form-group col-md-5 <?= form_error('name') ? 'has-error' : null ?>">
          <label for="name"><span> Nama</span> </label>
          <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>" id="name" placeholder="Nama uploads">
          <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('name') ?></span></small>
        </div>

       
           
        <div class="form-group col-md-5  <?= form_error('name') ? 'has-error' : null ?>">
          <label for="ket"><span> ket</span> </label>
          <input type="text" class="form-control" name="ket" value="<?= set_value('ket') ?>" id="ket" placeholder="ket uploads">
          <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('ket') ?></span></small>
        </div>

        <label class="ml-1" for="ket"><span> File</span> </label><br>
         <div class="custom-file ml-1 mb-2 col-md-4  <?= form_error('file') ? 'has-error' : null ?>">
              <input type="file" class="custom-file-input" name="file" id="customFile" accept="application/pdf"/>
              <label class="custom-file-label" for="customFile">Pilih file</label>
              <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('file') ?></span></small>
          </div>
        <script>
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        </script>

        <div class="row ml-auto mb-3 mr-5">
          <button type="submit" name="add" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
          <button type="Reset" class="btn btn-warning mr-2"><i class="fa fa-undo"></i> Reset</button>
        </div>


        
        <?php form_close()?>
    </div>
    <!-- /.card-body -->
  </div>
</section>

