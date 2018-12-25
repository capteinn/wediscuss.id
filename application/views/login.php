<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>public/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>public/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <img src="<?php echo base_url('') ?>public/images/logo.svg">
              </div>
              <h4 class="text-center">Hello! let's get started</h4>
              <h6 class="font-weight-light text-center">Sign in to continue.</h6>
                <?php echo form_open('login/signUp', array('class'=>'pt-3')) ?>
                <div class="small">
                  <?php 
                    if ($this->session->flashdata('error')) {
                      echo '<div class="card-alert alert alert-danger mb-4 rounded">' . $this->session->flashdata('error') . '</div>';
                    }

                    if ($this->session->flashdata('success')) {
                      echo '<div class="card-alert alert alert-success mb-4 rounded">' . $this->session->flashdata('success') . '</div>';
                    }
                  ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required="" name="username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required="" name="password">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="<?php echo base_url('index.php/register') ?>" class="text-primary">Create</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url() ?>public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url() ?>public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url() ?>public/js/off-canvas.js"></script>
  <script src="<?php echo base_url() ?>public/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
