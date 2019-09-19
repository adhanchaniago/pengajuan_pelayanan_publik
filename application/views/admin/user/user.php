<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css">

    <?php $this->load->view('admin/templates/head'); ?>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "user";
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
            <li class="breadcrumb-item active">User</li>
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
                  <h4>User
                  </h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Nama</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($data_user as $row) { ?>
                        <tr>
                          <th scope="row"><?php echo $no ?></th>
                          <td><?php echo $row->username ?></td>
                          <td><?php echo $row->password ?></td>
                          <td><?php echo $row->nama ?></td>
                          <td>
                              <a href="<?php echo base_url()?>admin/user/edit/<?php echo $row->id ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"> </i></a>
                              <a href="<?php echo base_url()?>admin/user/hapus/<?php echo $row->id ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"> </i></a>
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
            <form action="<?php echo base_url()?>admin/user/simpan" method="post">
                <input type="hidden" name="kode_user" value="<?php echo $kode_user ?>">
                <div class="form-group">
                  <label>Kode Varibel</label>
                  <input type="text" placeholder="" value="<?php echo $kode_user ?>" disabled class="form-control">
                </div>
                <div class="form-group">       
                  <label>user</label>
                  <input type="text" placeholder="" name="user" class="form-control" autofocus>
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