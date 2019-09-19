<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <!-- Sidebar Header    -->
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center"><img src="<?php echo base_url()?>assets/img/user.png" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5"><?php echo $this->session->nama ?></h2><span>Administrator</span>
      </div>
      <!-- Small Brand information, appears on minimized sidebar-->
      <div class="sidenav-header-logo"><a href="<?php echo base_url()?>assets/index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <div class="main-menu">
      <h5 class="sidenav-heading">Main</h5>
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li class="<?php echo ($hal=='beranda')?'active':'';?>"><a href="<?php echo base_url()?>admin/dashboard"> <i class="icon-home"></i>Home</a></li>
        <li class="<?php echo ($hal=='variabel')?'active':'';?>"><a href="<?php echo base_url()?>admin/variabel"> <i class="icon-form"></i>Variabel</a></li>
        <li class="<?php echo ($hal=='pertanyaan')?'active':'';?>"><a href="<?php echo base_url()?>admin/pertanyaan"> <i class="icon-grid"></i>Pertanyaan</a></li>
        <li class="<?php echo ($hal=='kriteria')?'active':'';?>"><a href="<?php echo base_url()?>admin/kriteria"> <i class="icon-interface-windows"></i>Kriteria</a></li>
        <li class="<?php echo ($hal=='kecamatan')?'active':'';?>"><a href="<?php echo base_url()?>admin/kecamatan"> <i class="fa fa-map"></i>Kecamatan</a></li>
        <li class="<?php echo ($hal=='v_khusus')?'active':'';?>"><a href="<?php echo base_url()?>admin/v_khusus"> <i class="icon-bill"></i>Variabel Khusus</a></li>
        <li class="<?php echo ($hal=='rule')?'active':'';?>"><a href="<?php echo base_url()?>admin/rule"> <i class="fa fa-cogs"></i>Rule</a></li>
        <li class="<?php echo ($hal=='user')?'active':'';?>"><a href="<?php echo base_url()?>admin/user"> <i class="fa fa-users"></i>Users</a></li>
        <li class="<?php echo ($hal=='pengajuan')?'active':'';?>"><a href="<?php echo base_url()?>admin/pengajuan"> <i class="fa fa-cube"></i>Pengajuan</a></li>
      </ul>
      <h5 class="sidenav-heading">Second Menu</h5>
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li class="<?php echo ($hal=='profil')?'active':'';?>"><a href="<?php echo base_url()?>admin/profil"> <i class="icon-user"></i>Profil</a></li>
        <li><a href="<?php echo base_url()?>login/logout"> <i class="fa fa-sign-out fa-lg"></i>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>