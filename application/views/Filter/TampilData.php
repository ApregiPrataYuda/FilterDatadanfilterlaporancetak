<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Tampil Data</span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span class="badge badge-secondary"> Home</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<div class="col-md-4 mb-2">
<!-- <a href="<?=site_url('Filter/Export')?>" class="btn btn-sm btn-outline-success"><i class="fa fa-file-excel"> Export Excel</i></a> -->
</div>
<section class="content">
  <div class="card">
    <div class="card-body">
      <div class="card">
        <div class="card-header">
          <p>Filter Data </p>
        </div> 
        <!-- /.card-header -->
     <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th style="width:5%">#No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Keterangan</th>
              </tr>
            </thead> 
            <?php $no=1;
                  foreach ($rows->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?= $data->tanggal?></td>
                        <td><?= $data->name?></td>
                        <td><?= $data->keterangan?></td>
                       
                    </tr>
             <?php }   ?>
          
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
