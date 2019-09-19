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
        <li class="<?php echo ($hal=='home')?'active':'';?>"><a href="<?php echo base_url()?>user/dashboard"> <i class="icon-home"></i>Home</a></li>
        <li class="<?php echo ($hal=='pengajuan')?'active':'';?>"><a href="<?php echo base_url()?>user/pengajuan"> <i class="fa fa-cube"></i>Pengajuan</a></li>
        <li class="<?php echo ($hal=='status')?'active':'';?>"><a href="<?php echo base_url()?>user/pengajuan/status"> <i class="fa fa-bell"></i>Status Pengajuan</a></li>
        <li class="<?php echo ($hal=='bantuan')?'active':'';?>"><a href="<?php echo base_url()?>user/pengajuan"> <i class="fa fa-question-circle"></i>Bantuan</a></li>
      </ul>
      <h5 class="sidenav-heading">Second Menu</h5>
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li class="<?php echo ($hal=='profil')?'active':'';?>"><a href="<?php echo base_url()?>user/profil"> <i class="icon-user"></i>Setting</a></li>
        <li><a href="<?php echo base_url()?>login/logout_user"> <i class="fa fa-sign-out fa-lg"></i>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>