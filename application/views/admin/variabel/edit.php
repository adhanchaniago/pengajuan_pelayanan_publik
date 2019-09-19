<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('admin/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "variabel";
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
            <li class="breadcrumb-item active">Variabel</li>
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
                  <h4>Edit Variabel
                  </h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="<?php echo base_url()?>admin/variabel/update" method="post">
                  <?php $no=1; foreach ($data_variabel as $row) { 
                  $jawaban = $row->jawaban;
                  ?>
                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Kode Variabel</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="kode_variabel" value="<?php echo $row->kode_variabel ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Variabel</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="variabel" value="<?php echo $row->variabel ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Inisialisasi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="inisialisasi" value="<?php echo $row->inisialisasi ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Jawaban</label>
                      <div class="col-sm-10 mb-3">
                        <select multiple="" class="form-control" name="jawaban">
                          <option value="ya" <?php if($jawaban == "ya"){ echo "selected = 'selected'"; }?> >Ya</option>
                          <option value="tidak" <?php if($jawaban == "tidak"){ echo "selected = 'selected'"; }?>>Tidak</option>
                        </select>
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