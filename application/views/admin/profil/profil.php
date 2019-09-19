<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('admin/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "profil";
        $this->load->view('admin/templates/menu', $data); 
    ?>

    <div class="page">
      <!-- navbar-->
      <?php $this->load->view('admin/templates/header'); ?>
      
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>
          </ul>
        </div>
      </div>

      <!-- KONTEN -->
      <section>
        <div class="container-fluid">
          <div style="height: 10px"></div>

          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-header">
                  <h4>Profil
                    <button style="float: right;" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-info"><i class="fa fa-edit"> Ubah Password</i></button>
                  </h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="<?php echo base_url()?>admin/profil/update_profil" method="post">
                  <?php $no=1; foreach ($data_profil as $row) { 
                  ?>
                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                    <input type="hidden" name="username_lama" value="<?php echo $row->username ?>">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="username_baru" value="<?php echo $row->username ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $row->nama_lengkap ?>">
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                  <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- tambah data -->
      <!-- Modal-->
      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="exampleModalLabel" class="modal-title">Ubah Password</h5>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url()?>admin/profil/update_password" method="post">
                <div class="form-group">   
                  <label>Password Lama</label>
                  <input type="password" name="password_lama" class="form-control">
                </div>

                <div class="form-group">   
                  <label>Password Baru</label>
                  <input type="password" name="password_baru" class="form-control">
                </div>

                <div class="form-group">   
                  <label>Konfirmasi Password</label>
                  <input type="password" name="konfirmasi_password" class="form-control">
                </div>

                <div class="modal-footer">
                  <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->

      <!-- KONTEN -->
      <div class="pesan" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

      <!-- footer -->
      <?php $this->load->view('admin/templates/footer'); ?>
      <!-- footer -->
    </div>
    <!-- JavaScript files-->
      <?php $this->load->view('admin/templates/javascript'); ?>

      <script src="<?php echo base_url()?>assets/js/switch/sweetalert.min.js"></script>

      <script type="text/javascript">
          const flashData = $('.pesan').data('flashdata');

          if(flashData == 'tidak_sama'){
            Swal.fire({
                type: 'warning',
                title: 'Password Lama Tidak Sama',
                text: 'Silahkan Ulangi Kembali',
              })
          }else if(flashData == 'konfirmasi_salah'){
            Swal.fire({
                type: 'warning',
                title: 'Konfirmasi Password Salah',
                text: 'Silahkan Ulangi Kembali',
              })
          }
      </script>

  </body>
</html>