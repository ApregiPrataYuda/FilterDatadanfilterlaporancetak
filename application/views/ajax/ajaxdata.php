<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Tes code Ajax</span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span class="badge badge-secondary"> Home</span></a></li> -->
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<?php $this->load->view('pesan'); ?>

<div class="col-md-4 mb-2">
</div>
<section class="content">
  <div class="card">
    <div class="card-body">
      <div class="card">
        <div class="card-header">
          <a href="<?= site_url('file/add')?>" class="btn btn-primary btn-sm">Tambah file</a>
        </div> 
        <!-- /.card-header -->
     <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width:5%">#No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th style="width:30%">status</th>
                <th style="width:5%">Action</th>
              </tr>
            </thead> 
            <?php 
            $no=1;
            foreach ($row as $data) { ?>
               <tr>
                <td><?= $no++?></td>
                <td><?= $data->kode_kat?></td>
                <td><?= $data->name_kat?></td>
                <td>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status_kat" <?= cek_akses($data->status_kat)?> data-status="<?= $data->status_kat?>" 
                data-id="<?= $data->id?>" >
                <label class="form-check-label">
                <span class="badge badge-pill badge-danger"><?= $data->status_kat == 1 ? 'Aktif' : 'nonAktif'?> </span>
                </label>
                </div>
                </td>
                <td>
                    <a href="" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                </td>
               </tr>
           <?php }?>


           
          
          </table>
        </div> 
        <!-- /.card-body -->
     </div>
    </div> 
    <!-- /.card-body -->
    <div class="card-footer">
      <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div> 
    <!-- /.card-footer-->
   </div>
  <!-- /.card -->
 </section> 


 <script>
    $('.form-check-input').on('click', function() {
        const statuskat = $(this).data('status');
        const statusid = $(this).data('id');
        $.ajax({
            url: "<?= base_url('Ajax/ubahStatus')?>",
            type: "post",
            data: {
                statuskat:statuskat,
                statusid:statusid
            },
            success : function() {
          document.location.href = "<?= base_url('Ajax/index/')?>";
       }
        })
    });
 </script>

