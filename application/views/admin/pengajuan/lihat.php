<?php
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html>
  <head>
    
    <?php $this->load->view('admin/templates/head'); ?>

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
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Foto
                  </h4>
                </div>
                <div class="card-body">
                    <?php foreach ($data_pengajuan as $row) { ?>
                    
                      <img src="<?php echo base_url()?><?php echo $row->foto ?>" class="img-fluid"><br><br>
                      <a href="<?php echo base_url()?>admin/pengajuan/download/<?php echo $row->id ?>" class="btn btn-xs btn-info"><i class="fa fa-download fa-2x"></i></a><small>&nbsp; <i>download gambar</i></small><br>
                      
                    <?php } ?>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4>Detail Pengajuan
                  </h4>
                </div>
                <div class="card-body">
                  <table class="table table-sm">
                    <?php foreach ($data_pengajuan as $row) { 
                    $keterangan = $row->keterangan;
                    $status     = $row->status;
                    ?>
                    
                    <tr>
                      <td><b>Diajukan Oleh</b></td>
                      <td>: <?php echo $row->nama_lengkap ?></td>
                    </tr>
                    <tr>
                      <td><b>Email</b></td>
                      <td>: <?php echo $row->email ?></td>
                    </tr>
                    <tr>
                      <td><b>Jenis Pengajuan</b></td>
                      <td>: <?php echo $row->kriteria ?></td>
                    </tr>
                    <tr>
                      <td><b>Kecamatan</b></td>
                      <td>: <?php echo $row->kecamatan ?></td>
                    </tr>
                    <tr>
                      <td><b>Lokasi</b></td>
                      <td>: <?php echo $row->lokasi ?></td>
                    </tr>
                    <tr>
                      <td><b>Informasi Pengajuan</b></td>
                      <td>: <?php echo $row->deskripsi ?></td>
                    </tr>
                    <tr>
                      <td><b>Keterangan</b></td>
                      <td>: 
                        <?php 
                          if($keterangan == "Layak"){
                            ?><span class="btn btn-xs btn-success">Layak</span><?php
                          }else if($keterangan == "Dipertimbangkan"){
                            ?><span class="btn btn-xs btn-info">Dipertimbangkan</span><?php
                          }else{
                            ?><span class="btn btn-xs btn-danger">Tidak Layak</span><?php
                          }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Status</b></td>
                      <td>: 
                        <?php 
                          if($status == "1"){
                            ?><span class="btn btn-xs btn-success"><i class="fa fa-star"></i> Perlu</span><?php
                          }else if($status == "2"){
                            ?><span class="btn btn-xs btn-info"><i class="fa fa-check"></i> Approve</span><?php
                          }else{
                            ?><span class="btn btn-xs btn-primary"><i class="fa fa-hourglass-1"></i> Dalam Proses Perencanaan</span><?php
                          }
                        ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Lokasi Pengajuan
                  </h4>
                </div>
                <div class="card-body">
                  <table class="table table-sm">
                    
                    <tr>
                      <div id="map-canvas" style="width:100%;height:450px;"></div>
                    </tr>
                    <?php foreach ($data_pengajuan as $baris) { ?>
                    <tr>
                      <td><b>Lat</b></td>
                      <td colspan="2">: <?php echo $row->lat ?></td>
                    </tr>
                    <tr>
                      <td><b>Lng</b></td>
                      <td colspan="2">: <?php echo $row->lng ?></td>
                    </tr>
                    <?php } ?>
                  
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12">
              <!-- Daily Feed Widget-->
              <div id="daily-feeds" class="card updates daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box"><h4>Tanggapan & Komentar</h4></a></h2>
                  <div class="right-column">
                    <a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                      <!-- List-->
                      <?php foreach ($data_pesan as $row_2) { 
                      $user = $row_2->user;
                      ?>
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <a href="#" class="feed-profile">
                              <?php 
                              if ($user == 'admin'){ 
                                  ?>
                                  <img src="<?php echo base_url()?>assets/img/user.png" alt="person" class="img-fluid rounded-circle">
                                  <?php 
                              }else{
                                  ?>
                                  <img src="<?php echo base_url()?>assets/img/user2.png" alt="person" class="img-fluid rounded-circle">
                                  <?php 
                              }
                              ?>
                            </a>
                            <?php 
                              if ($user == 'admin'){ 
                                  ?>
                                  <div class="content"><strong><?php echo $row_2->nama_admin ?></strong>
                                    <div class="full-date"><small><?php echo $row_2->date_time ?></small></div>
                                  </div>
                                  <?php 
                              }else{
                                  ?>
                                  <div class="content"><strong><?php echo $row_2->nama_user ?></strong>
                                    <div class="full-date"><small><?php echo $row_2->date_time ?></small></div>
                                  </div>
                                  <?php 
                              }
                              ?>
                          </div>
                          <?php 
                          $chunks = array(
                              array(60 * 60 * 24 * 365, 'tahun'),
                              array(60 * 60 * 24 * 30, 'bulan'),
                              array(60 * 60 * 24 * 7, 'minggu'),
                              array(60 * 60 * 24, 'hari'),
                              array(60 * 60, 'jam'),
                              array(60, 'menit'),
                          );
                          $today = time();
                              $ori = strtotime($row_2->date_time);

                          if(empty($ori)){
                             $original = strtotime('0000-00-00 00:00:00');
                          }else{
                             $original = $ori;
                          }


                          $since = $today - $original;

                          if ($since > 604800)
                          {
                            $print = date("M jS", $original);
                            if ($since > 31536000)
                            {
                              $print .= ", " . date("Y", $original);
                            }
                            $ket = $print;
                          }

                          for ($i = 0, $j = count($chunks); $i < $j; $i++)
                          {
                            $seconds = $chunks[$i][0];
                            $name = $chunks[$i][1];

                            if (($count = floor($since / $seconds)) != 0)
                              break;
                          }

                          $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
                            $ket = $print . ' yang lalu';
                        ?>
                          <div class="date"><small><?php echo $ket; ?></small></div>
                        </div>
                        <div class="message-card" <?php if($user == "admin") {?>style="background: #dafacd;" <?php } else{?> style="background: #cddffa" <?php } ?> > <small style="color: #333d38"><?php echo $row_2->pesan ?></small></div>
                      </li>
                      <?php } ?>

                  
                      <li class="clearfix">
                        <?php foreach ($data_pengajuan as $baris) { 
                        $user = $this->session->username;
                        ?>
                        <form action="<?php echo base_url()?>admin/pengajuan/kirim" method="post">
                            <input type="hidden" name="id_pengajuan" value="<?php echo $baris->id ?>">
                            <input type="hidden" name="user" value="<?php echo $user ?>">

                            <div class="form-group">   
                              <label>Pesan</label>
                              <textarea class="form-control" name="pesan"></textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                        <?php } ?>
                      </li>
                    </ul>
                    
                  </div>
                </div>
              </div>
              <!-- Daily Feed Widget End-->
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

  </body>
</html>


<script>
    var marker;
      function initialize() {
        var myOptions = {
              zoom: 8,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };

       
        var map = new google.maps.Map(document.getElementById("map-canvas"),
              myOptions);
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
    
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                position: pt
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
          }
 
          <?php foreach ($data_pengajuan as $baris) {
            $lat = $baris->lat;
            $lon = $baris->lng;
            $nama = $baris->lokasi;
            $alamat = $baris->lokasi; 
            $kriteria = $baris->kriteria;
              echo ("addMarker($lat, $lon, '<b>Lokasi</b>: $nama<br> <b>Jenis Pengajuan: $kriteria</b><br> <b>Lattitude</b>: $lat</b> <br><b>Longitude</b>: $lon');\n");                       
            }
          ?>
        }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <script src="<?php echo base_url()?>assets/js/switch/sweetalert.min.js"></script>

      <script type="text/javascript">
          const flashData = $('.pesan').data('flashdata');

          if(flashData == 'kirim'){
            Swal.fire({
                type: 'success',
                title: 'Pesan Berhasil Dikirim',
                text: 'Terima Kasih',
              })
          }
      </script>