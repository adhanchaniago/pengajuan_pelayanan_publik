<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css">

    <?php $this->load->view('admin/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "pertanyaan";
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
            <li class="breadcrumb-item active">pertanyaan</li>
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
                  <h4>Edit Pertanyaan
                  </h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="<?php echo base_url()?>admin/pertanyaan/update" method="post">
                  <?php $no=1; foreach ($data_pertanyaan as $row) { 
                  ?>
                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                    <input type="hidden" name="kode_variabel" value="<?php echo $row->kode_variabel?>">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Kode Variabel</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $row->kode_variabel ?>" disabled>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">pertanyaan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="pertanyaan" value="<?php echo $row->pertanyaan ?>">
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


      <!-- tambah data -->
      <!-- Modal-->
      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="exampleModalLabel" class="modal-title">Tambah</h5>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url()?>admin/pertanyaan/simpan" method="post">
                <div class="form-group">
                  <label>Kode Variabel</label>
                  <select name="kode_variabel" class="form-control">
                    <option>Pilih Kode Variabel</option>
                    <?php foreach ($kode_variabel as $row) { ?>
                    <option value="<?php echo $row->kode ?>"><?php echo $row->kode ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">   
                  <label>Pertanyaan</label>
                  <textarea class="form-control" name="pertanyaan"></textarea>
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
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.bootstrap4.min.js"></script>

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
          }else if(flashData == 'update'){
            Swal.fire({
                type: 'success',
                title: 'Edit Data Berhasil',
              })
          }
      </script>

      <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
      </script>

  </body>
</html>