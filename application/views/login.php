<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="<?php echo base_url()?>assets/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="<?php echo base_url()?>assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Login</span><strong class="text-primary"> Administrator</strong></div>
            <p>Klasifikasi Kelayakan Pengajuan Pembangunan Pelayanan Publik Menggunakan Algoritma Rule Based</p>
            <form method="POST" action="<?php echo base_url()?>login/cek_login" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group text-center"><button type="submit" class="btn btn-primary">Login</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form>
          </div>
          <div class="copyrights text-center">
            <p>Copyright &copy; 2019 by<a href="<?php echo base_url()?>assets/https://bootstrapious.com/p/bootstrap-4-dashboard" class="external"> &nbsp;Zyran Aditya Rahman</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <div class="pesan" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

    <!-- JavaScript files-->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url()?>assets/js/front.js"></script>

    <script src="<?php echo base_url()?>assets/js/switch/sweetalert.min.js"></script>

    <script type="text/javascript">
        const flashData = $('.pesan').data('flashdata');

        if(flashData == 'gagal'){
          Swal.fire({
              type: 'warning',
              title: 'Login Gagal',
              text: 'Silahkan Ulangi',
            })
        }else if(flashData == 'ubah_password'){
          Swal.fire({
              type: 'success',
              title: 'Ubah Password Berhasil',
              text: 'Silahkan Login Kembali',
            })
        }else if(flashData == 'ubah_profil'){
            Swal.fire({
                type: 'success',
                title: 'Edit Profil Berhasil',
                text: 'Silahkan Login Kembali',
              })
          }
    </script>
  </body>
</html>