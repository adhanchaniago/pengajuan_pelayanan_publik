<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('user/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "home";
        $this->load->view('user/templates/menu', $data); 
    ?>

    <div class="page">
      <!-- navbar-->
      <?php $this->load->view('user/templates/header'); ?>
      
      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <div>
              <h3 style="text-align: center;">Selamat Datang Di Aplikasi Pengajuan Pembangunan Pelayanan Publik</h3>
            </div>
          </div>
        </div>
      </section>

      <!-- Header Section-->
     

      <!-- footer -->
      <?php $this->load->view('user/templates/footer'); ?>
      <!-- footer -->
      
    </div>
    <!-- JavaScript files-->
      <?php $this->load->view('user/templates/javascript'); ?>

      <script src="<?php echo base_url()?>assets/js/switch/sweetalert.min.js"></script>

      <script type="text/javascript">
          const flashData = $('.pesan').data('flashdata');

          if(flashData == 'email_ada'){
            Swal.fire({
                type: 'warning',
                title: 'Email sudah terdaftar',
                text: 'Silahkan gunakan email yang lain',
              })
          }else if(flashData == 'daftar_suskes'){
            Swal.fire({
                type: 'success',
                title: 'Pendaftaran Berhasil',
                text: 'Silahkan Login',
              })
          }else if(flashData == 'gagal'){
            Swal.fire({
                type: 'warning',
                title: 'Login Gagal',
                text: 'Silahkan Ulangi Lagi',
              })
          }
      </script>
  </body>
</html>