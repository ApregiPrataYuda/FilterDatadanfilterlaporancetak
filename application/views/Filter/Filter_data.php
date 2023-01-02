<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><span class="badge badge-secondary">Filter Data</span></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-info" href="<?= site_url('Dashboard') ?>"><span class="badge badge-secondary"> Home</span></a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="col-md-12 mb-2">
<a href="<?=site_url('Filter/Export')?>" class="btn btn-sm btn-outline-success"><i class="fa fa-file-excel"> Export Excel All Data</i></a>
</div>

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-header text-white" style="background-color:RGB(40, 178, 170);">
      Filter Data 
    </div>
    <div class="card-body">
      <form target = '_blank' action="<?=site_url('Filter/Tampil_data')?>" method="POST">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bulan:</label>
              <div class="col-sm-9">
                <select class="form-control" name="bulan">
                  <!-- <?php $now = new \DateTime('now');
                    $bln1 = $now->format('m');
                    for($m=1; $m<=12; ++$m){
                        if ($bln1 == $m){
                      echo '<option selected value='.$m.'>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>'."\n";
                       }else{
                      echo '<option  value='.$m.'>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>'."\n";
                       }
                          }?> -->
                  <?php foreach ($rowx as $bulan) { ?>
                    <option <?php if (date('m') == $bulan->bln ) { echo 'selected';} ?> value="<?=$bulan->bln?>">
                    <?php if ($bulan->bln == 1) {
                        echo 'Januari';
                    }elseif ($bulan->bln == 2) {
                        echo 'Februari';
                    }elseif ($bulan->bln == 3) {
                        echo 'Maret';
                    }elseif ($bulan->bln == 4) {
                        echo 'April';
                    }elseif ($bulan->bln == 5) {
                        echo 'Mei';
                    }elseif ($bulan->bln == 6) {
                        echo 'Juni';
                    }elseif ($bulan->bln == 7) {
                        echo 'Juli';
                    }elseif ($bulan->bln == 8) {
                        echo 'Agustus';
                    }elseif ($bulan->bln == 9) {
                        echo 'September';
                    }elseif ($bulan->bln == 10) {
                        echo 'Oktober';
                    }elseif ($bulan->bln == 11) {
                        echo 'November';
                    }elseif ($bulan->bln == 12) {
                        echo 'Desember';
                    } ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun:</label>
              <div class="col-sm-9">
                <select class="form-control" name="tahun">
                  <!-- <option value="<?=DATE('Y')?>>-Pilih-</option>
                  <?php $tahun = date('Y');
                  for ($i = 2022; $i < $tahun + 5; $i++) { ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                  <?php } ?> -->
                  <?php foreach ($row as $tahun) { ?>
                    <option <?php if (date('Y') == $tahun->thn ) { echo 'selected';} ?> value="<?=$tahun->thn?>"><?=$tahun->thn?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="ml-auto">
            <button type="submit" class="btn  btn-outline-secondary btn-sm">
              <i class="fa fa-eye"></i> 
              Detail
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-header text-white" style="background-color:RGB(40, 178, 170);">
      cetak Data 
    </div>
    <div class="card-body">
      <form target = '_blank' action="<?=site_url('Filter/Cetak')?>" method="POST">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bulan:</label>
              <div class="col-sm-9">
                <select class="form-control" name="bulan">
                  <!-- <?php $now = new \DateTime('now');
                    $bln1 = $now->format('m');
                    for($m=1; $m<=12; ++$m){
                        if ($bln1 == $m){
                      echo '<option selected value='.$m.'>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>'."\n";
                       }else{
                      echo '<option  value='.$m.'>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>'."\n";
                       }
                          }?> -->
                  <?php foreach ($rowx as $bulan) { ?>
                    <option <?php if (date('m') == $bulan->bln ) { echo 'selected';} ?> value="<?=$bulan->bln?>">
                    <?php if ($bulan->bln == 1) {
                        echo 'Januari';
                    }elseif ($bulan->bln == 2) {
                        echo 'Februari';
                    }elseif ($bulan->bln == 3) {
                        echo 'Maret';
                    }elseif ($bulan->bln == 4) {
                        echo 'April';
                    }elseif ($bulan->bln == 5) {
                        echo 'Mei';
                    }elseif ($bulan->bln == 6) {
                        echo 'Juni';
                    }elseif ($bulan->bln == 7) {
                        echo 'Juli';
                    }elseif ($bulan->bln == 8) {
                        echo 'Agustus';
                    }elseif ($bulan->bln == 9) {
                        echo 'September';
                    }elseif ($bulan->bln == 10) {
                        echo 'Oktober';
                    }elseif ($bulan->bln == 11) {
                        echo 'November';
                    }elseif ($bulan->bln == 12) {
                        echo 'Desember';
                    } ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun:</label>
              <div class="col-sm-9">
                <select class="form-control" name="tahun">
                  <!-- <option value="<?=DATE('Y')?>>-Pilih-</option>
                  <?php $tahun = date('Y');
                  for ($i = 2022; $i < $tahun + 5; $i++) { ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                  <?php } ?> -->
                  <?php foreach ($row as $tahun) { ?>
                    <option <?php if (date('Y') == $tahun->thn ) { echo 'selected';} ?> value="<?=$tahun->thn?>"><?=$tahun->thn?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="ml-auto">
            <button type="submit" class="btn  btn-outline-success btn-sm">
              <i class="fa fa-file"></i> 
              Export Data
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>







