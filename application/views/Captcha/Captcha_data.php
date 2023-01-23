<!-- <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Membuat Captcha di CodeIgniter 3</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        
        <?php 

        if ($this->session->flashdata('pesan_form')):
            echo $this->session->flashdata('pesan_form');
        endif
        
        ?>
        
        <form action="<?=base_url('captcha/check_captcha');?>" method="post">
        
            <?=$captcha?><br/>

            Masukan kode captcha yang sesuai gambar di atas<br/>
            <input type="text" name="captcha">
            <button>Submit</button>

        </form>
    </body>
</html>
 -->



<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Tes chapcha</span></h3>
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
      <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <?php 

        if ($this->session->flashdata('pesan_form')):
            echo $this->session->flashdata('pesan_form');
        endif
        
        ?>
        
        <form action="<?=base_url('captcha/check_captcha');?>" method="post">
        
            <?=$captcha?><br/>

            Masukan kode captcha yang sesuai gambar di atas<br/>
            <input type="text" name="captcha" class="form-control col-md-4">
            <button class="btn btn-secondary btn-sm mt-2">Submit</button>

        </form>
    </div>
    <!-- /.card-body -->
  </div>
</section>

