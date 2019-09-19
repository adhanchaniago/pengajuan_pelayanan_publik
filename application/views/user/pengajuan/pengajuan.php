<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('user/templates/head'); ?>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX0BerEOaK59srKbH-FnzzRYM1xTzeEts&sensor=false" type="text/javascript"></script>
    <!-- API key nya rahasia jangan disebarkan karena beli ke google -->

  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "pengajuan";
        $this->load->view('user/templates/menu', $data); 
    ?>

    <div class="page">
      <!-- navbar-->
      <?php $this->load->view('user/templates/header'); ?>
      
      <!-- Counts Section -->
      <section>
        <div class="container-fluid">
          <div style="height: 10px"></div>

          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-header">
                  <h4>Pengajuan
                  </h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" id="form1" action="<?php echo base_url()?>user/pengajuan/simpan" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Foto Lokasi</label>
                      <div class="col-sm-9">
                        <i class="fa fa-picture-o fa-5x"></i>
                        <input type="file" name="file" class="form-control" required>
                        <small style="font-size: 11px; color: green"><i>Ekstensi yang diperbolehkan: jpg, jpeg, png dan maksimal ukuran : 10mb </i></small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Jenis Pengajuan</label>
                      <div class="col-sm-9">
                          <select name="kode_kriteria" class="form-control" required>
                            <option>- Pilih Jenis Pengajuan -</option>
                            <?php foreach ($data_kriteria as $row) { ?>
                            <option value="<?php echo $row->kode_kriteria ?>"><?php echo $row->kriteria ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Kecamatan</label>
                      <div class="col-sm-9">
                          <select name="kode_kecamatan" class="form-control" required>
                            <option>- Pilih Kecamatan -</option>
                            <?php foreach ($data_kecamatan as $row) { ?>
                            <option value="<?php echo $row->kode_kecamatan ?>"><?php echo $row->kecamatan ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Lokasi</label>
                      <div class="col-sm-9">
                          <small><i>Silahkan geser icon map <i class="fa fa-map-marker" style="color: red"></i> berwarna <span style="color: red">merah</span> sesuai lokasi yang diajukan</i></small>
                          <div id="map" style="width:600px;height: 300px;"></div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label"></label>
                      <div class="col-sm-9">
                          <input type="text" name="lokasi" class="form-control" placeholder="Masukkan Nama Lokasi" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label" for="lat">Latitude</label>
                      <div class="col-sm-9">
                          <input type="text" name='lat' id='lat' class="form-control control-label" readonly>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label" for="lng">Longitude</label>
                      <div class="col-sm-9">
                          <input type="text" name='lng' id='lng' class="form-control control-label" readonly>
                      </div>
                    </div>
<!-- 
                    <input type="hidden" name='lat' id='lat' class="form-control control-label">

                    <input type="hidden" name='lng' id='lng' class="form-control control-label"> -->

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Informasi Pengajuan</label>
                      <div class="col-sm-9">
                          <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="pesan" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

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

          if(flashData == 'tambah'){
            Swal.fire({
                type: 'success',
                title: 'Pengajuan Berhasil Dikirim',
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

      <script type="text/javascript">
          document.getElementById('reset').onclick= function() {
              var field1= document.getElementById('lng');
              var field2= document.getElementById('lat');
              field1.value= field1.defaultValue;
              field2.value= field2.defaultValue;
          };
      </script>    

      <script type="text/javascript">
          function updateMarkerPosition(latLng) {
              document.getElementById('lat').value = [latLng.lat()];
              document.getElementById('lng').value = [latLng.lng()];
          }

          var myOptions = {
              zoom: 15,
              scaleControl: true,
              center:  new google.maps.LatLng(-6.923700,106.928726),
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };

       
          var map = new google.maps.Map(document.getElementById("map"),
              myOptions);

          var marker1 = new google.maps.Marker({
              position : new google.maps.LatLng(-6.923700,106.928726),
              title : 'lokasi',
              map : map,
              draggable : true
          });
       
       //updateMarkerPosition(latLng);

          google.maps.event.addListener(marker1, 'drag', function() {
          updateMarkerPosition(marker1.getPosition());
       });
      </script>
  </body>
</html>