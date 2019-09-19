<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('user/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?php echo base_url()?>assets/img/user.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $this->session->nama ?></h2><span>User</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="<?php echo base_url()?>assets/index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="active"><a href="<?php echo base_url()?>user/dashboard"> <i class="icon-home"></i>Home</a></li>
            <li><a href="<?php echo base_url()?>user/pengajuan"> <i class="fa fa-cube"></i>Pengajuan</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="page">
    <div class="pesan" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="<?php echo base_url()?>assets/#" class="menu-btn"><i class="icon-bars"> </i></a><a href="<?php echo base_url()?>assets/index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Aplikasi Pengajuan Pembangunan Pelayanan Publik</span></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <!-- Log out-->
                <li class="nav-item"><a href="" class="nav-link logout" data-toggle="modal" data-target="#login"> <span class="d-none d-sm-inline-block">Login</span><i class="fa fa-sign-in"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      
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
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">
            <!-- Login-->
            <div class="col-lg-4 col-md-4">
              <div class="card project-progress">
                <h2 class="display h4">Login</h2>
                <p> Silahkan login terlebih dahulu untuk melakukan pengajuan pelayanan publik.</p>
                <div class="">
                    <form action="<?php echo base_url()?>login/cek_login_user" method="post">
                        <div class="form-group">   
                          <label>Email</label>
                          <input type="text" name="email" class="form-control">
                        </div>

                        <div class="form-group">   
                          <label>Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>

            <!-- Daftar -->
            <div class="col-lg-4 col-md-4 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report">
                <h2 class="display h4">Daftar Akun</h2>
                <p> Belum punya akun? Silahkan daftar jika belum mempunyai akun.</p>
                <div class="line-chart">
                    <form action="<?php echo base_url()?>login/proses_daftar" method="post">
                        <div class="form-group">   
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
                          <small style="color: red"><?php echo form_error('nama'); ?></small>
                        </div>

                        <div class="form-group">   
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
                          <small style="color: red"><?php echo form_error('email'); ?></small>
                        </div>

                        <div class="form-group">   
                          <label>Password</label>
                          <input type="password" name="password" class="form-control">
                          <small style="color: red"><?php echo form_error('password'); ?></small>
                        </div>

                        <div class="form-group">   
                          <label>Konfirmasi Password</label>
                          <input type="password" name="konf_password" class="form-control">
                          <small style="color: red"><?php echo form_error('konf_password'); ?></small>
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>

            <!-- Login-->
            <div class="col-lg-4 col-md-4">
              <div class="card project-progress">
                <h2 class="display h4">Daftar Pelayanan</h2>
                <p> Berikut daftar pelayanan publik yang dapat diajukan.</p>
                <div class="">
                    <ul>
                      <?php foreach($data_kriteria as $row) {?>
                      <li><?php echo $row->kriteria ?></li>
                      <?php } ?>
                    </ul>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </section>

      <!-- footer -->
      <?php $this->load->view('user/templates/footer'); ?>
      <!-- footer -->

      <!-- Modal-->
      <div id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="exampleModalLabel" class="modal-title">Login</h5>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url()?>login/cek_login_user" method="post">
                <div class="form-group">   
                  <label>Email</label>
                  <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">   
                  <label>Password</label>
                  <input type="text" name="password" class="form-control">
                </div>

                <div class="modal-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->

      

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