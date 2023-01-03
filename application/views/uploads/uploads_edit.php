<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Upload Data edit</span></h3>
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
      <h3 class="card-title">edit Data</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <?php echo form_open_multipart('uploads/process_edit');?>
       
        <div class="form-group col-md-5 class=" form-group <?= form_error('name') ? 'has-error' : null ?>">
          <label for="name"><span class="badge badge-primary"> Nama</span> </label>
          <input type="hidden" name="id" value="<?= $row->id?>">
          <input type="text" class="form-control" name="name" value="<?= $row->name?>" id="name" placeholder="Nama uploads">
          <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('name') ?></span></small>
        </div>

        <div class="form-group col-md-5 class=" form-group <?= form_error('image') ? 'has-error' : null ?>">
          <label for="image"><span class="badge badge-primary"> image</span> </label>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
              <?php 
                   if ($row->image != null) { ?>
                       <div class="col-md-5">
                       <img id="imgPreview" src="<?=site_url('assets/uploads/'.$row->image)?>" class="img-fluid img-thumbnail"></td>
                       </div>
                   <?php 
                   }
               ?>
          <input type="file" class="form-control" name="image" id="image"  accept="image/png, image/jpeg, image/jpg, image/gif">
          <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('image') ?></span></small>
        </div>


        <div class="form-group col-md-5 class=" form-group <?= form_error('name') ? 'has-error' : null ?>">
          <label for="ket"><span class="badge badge-primary"> ket</span> </label>
          <input type="text" class="form-control" name="ket" value="<?= $row->ket?>" id="ket" placeholder="ket uploads">
          <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?= form_error('ket') ?></span></small>
        </div>

        <div class="row ml-auto mb-3 mr-5">
          <button type="submit" name="edit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
          <button type="Reset" class="btn btn-warning mr-2"><i class="fa fa-undo"></i> Reset</button>
        </div>
        <?php form_close()?>
    </div>
    <!-- /.card-body -->
  </div>
</section>


<script>
            $(document).ready(() => {
                $("#image").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>