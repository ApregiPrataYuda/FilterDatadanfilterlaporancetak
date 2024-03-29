
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=site_url() ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=site_url() ?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=site_url() ?>assets/backend/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>logins</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php $this->load->view('pesan')?>
        <?php 
        if ($this->session->flashdata('pesan_form')):
            echo $this->session->flashdata('pesan_form');
        endif
        ?>

      <form action="<?= site_url('Auth/process')?>" method="post">
      <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?=form_error('username')?></span></small>
        <div class="input-group mb-3 <?=form_error('username') ? 'has-error' : null?>">
          <input type="text" class="form-control" name="username" value="<?= set_value('username')?>" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <small class="text-danger" style="font-style: italic "><span class="badge badge-danger"><?=form_error('password')?></span></small>
        <div class="input-group mb-3 <?=form_error('password') ? 'has-error' : null?>">
          <input type="password" class="form-control" name="password" value="<?= set_value('password')?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>

       
        <?=$captcha?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="captcha" placeholder="Masukan Captcha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-code"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?= site_url('Auth/Register')?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=site_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=site_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=site_url() ?>assets/backend/dist/js/adminlte.min.js"></script>
</body>
</html>
