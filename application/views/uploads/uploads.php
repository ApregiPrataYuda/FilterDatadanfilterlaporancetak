<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Upload Data</span></h3>
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
          <a href="<?= site_url('uploads/add')?>" class="btn btn-primary btn-sm">Tambah Data</a>
        </div> 
        <!-- /.card-header -->
     <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width:5%">#No</th>
                <th>Nama</th>
                <th>Ket</th>
                <th style="width:5%">Image</th>
                <th style="width:5%">Action</th>
              </tr>
            </thead> 
            <?php $no=1; foreach ($row as $key => $dat) { ?>
               <tr>
                <td><?= $no++?></td>
                <td><?= $dat->name?></td>
                <td><?= $dat->ket?></td>
                <td> <?php if ($dat->image != null) { ?>
                     <img src="<?=base_url('assets/uploads/'.$dat->image)?>" style="width:100px">
                     <?php } ?></td>
                <td>
                    <a href="<?= site_url('uploads/edit/'.$dat->id)?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('uploads/delete/'.$dat->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
               </tr>
              <?php } ?>

           
          
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
