<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css">

    <?php $this->load->view('admin/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "v_khusus";
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
            <li class="breadcrumb-item active">Variabel Khusus</li>
          </ul>
        </div>
      </div>

      <!-- KONTEN -->
      <section>
        <div class="container-fluid">
          <div style="height: 10px"></div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Variabel Khusus
                  <button style="float: right;" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-primary"><i class="fa fa-plus"> Tambah</i></button>
                  </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Variabel Khusus</th>
                          <th>Inisialisasi</th>
                          <th>Jawaban</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_v_khusus as $row) { ?>
                        <tr>
                          <th scope="row"><?php echo $no ?></th>
                          <td><?php echo $row->variabel ?></td>
                          <td><?php echo $row->inisialisasi ?></td>
                          <td><?php echo $row->jawaban ?></td>
                          <td>
                              <a href="<?php echo base_url()?>admin/v_khusus/edit/<?php echo $row->id ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"> </i></a>
                          </td>
                        </tr>
                        <?php $no++;  } ?>
                      </tbody>
                    </table>
                  </div>
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
            <form action="<?php echo base_url()?>admin/v_khusus/simpan" method="post">
                <div class="form-group">       
                  <label>Variabel khusus</label>
                  <input type="text" placeholder="" name="v_khusus" class="form-control">
                </div>
                <div class="form-group">       
                  <label>Inisialisasi</label>
                  <input type="text" placeholder="" name="inisialisasi" class="form-control">
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 form-control-label">Jawaban</label>
                  <div class="col-sm-10 mb-3">
                    <select multiple="" class="form-control" name="jawaban">
                      <option value="ya">Ya</option>
                      <option value="tidak">Tidak</option>
                    </select>
                  </div>
                </div>
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