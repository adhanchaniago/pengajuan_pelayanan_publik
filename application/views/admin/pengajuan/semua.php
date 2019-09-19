<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('admin/templates/head'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/dataTables.bootstrap4.min.css">
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX0BerEOaK59srKbH-FnzzRYM1xTzeEts&sensor=false" type="text/javascript"></script>
    <!-- API key nya rahasia jangan disebarkan karena beli ke google -->

  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "pengajuan";
        $this->load->view('admin/templates/menu', $data); 
    ?>

    <div class="page">
      <!-- navbar-->
      <?php $this->load->view('admin/templates/header'); ?>
      
      <!-- Counts Section -->
      <section>
        <div class="container-fluid">
          <div style="height: 10px"></div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Semua Lokasi Pengajuan
                  </h4>
                </div>
                <div class="card-body">
                  <div id="map-canvas" style="width:100% ;height:460px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="pesan" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

      <!-- Header Section-->
     

      <!-- footer -->
      <?php $this->load->view('admin/templates/footer'); ?>
      <!-- footer -->
      
    </div>
    <!-- JavaScript files-->
      <?php $this->load->view('admin/templates/javascript'); ?>

      <script>
        var marker;
          function initialize() {
            // Variabel untuk menyimpan informasi (desc)
            var infoWindow = new google.maps.InfoWindow;
            //  Variabel untuk menyimpan peta Roadmap
            var mapOptions = {
              mapTypeId: google.maps.MapTypeId.ROADMAP
            } 
            // Pembuatan petanya
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            // Variabel untuk menyimpan batas kordinat
            var bounds = new google.maps.LatLngBounds();

            // Pengambilan data dari database
            <?php

                foreach ($data_pengajuan as $row){
                    $nama      = $row->lokasi;
                    $lat       = $row->lat;
                    $lon       = $row->lng;
                    $kriteria  = $row->kriteria;
                    $image = base_url()."assets/pengajuan/red_mark.png";

                    echo ("addMarker($lat, $lon, '$image', '<b>Lokasi</b>: $nama<br> <b>Jenis Pengajuan: $kriteria</b><br> <b>Lattitude</b>: $lat</b> <br><b>Longitude</b>: $lon');\n");
                } 

              ?>
              
            // Proses membuat marker 
            function addMarker(lat, lng, img, info) {
                var lokasi = new google.maps.LatLng(lat, lng);
                bounds.extend(lokasi);
                var marker = new google.maps.Marker({
                    map: map,
                    position: lokasi,
                    icon: img
                });       
                map.fitBounds(bounds);
                bindInfoWindow(marker, map, infoWindow, info);
             }
            
            // Menampilkan informasi pada masing-masing marker yang diklik
            function bindInfoWindow(marker, map, infoWindow, html) {
              google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
              });
            }
     
            }
          google.maps.event.addDomListener(window, 'load', initialize);
       </script>
  </body>
</html>