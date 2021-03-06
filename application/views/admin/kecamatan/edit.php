<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('admin/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "kecamatan";
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
            <li class="breadcrumb-item active">Kecamatan</li>
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
                  <h4>Edit Kecamatan
                  </h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="<?php echo base_url()?>admin/kecamatan/update" method="post">
                  <?php $no=1; foreach ($data_kecamatan as $row) { 
                  ?>
                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                    <input type="hidden" name="kode_kecamatan" value="<?php echo $row->kode_kecamatan ?>">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Kode Kecamatan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->kode_kecamatan ?>" disabled>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Kecamatan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="kecamatan" value="<?php echo $row->kecamatan ?>">
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </div>

                  <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

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

          if(flashData == 'tambah'){
            Swal.fire({
                type: 'success',
                title: 'Tambah Data Berhasil',
              })
          }else if(flashData == 'hapus'){
            Swal.fire({
                type: 'success',
                title: 'Hapus Data Berhasil',
              })
          }
      </script>

  </body>
</html>