<!DOCTYPE html>
<html>
  <head>
    <?php $this->load->view('admin/templates/head'); ?>

    <script src="<?php echo base_url()?>assets/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/vendor/modernizr-2.6.2.min.js"></script>

    <script>
      $(document).ready(function(){
        var windowH = $(window).height();
        var wrapperH = $('#wrap').height();
        var margin = (windowH)*0.05;
        var wrapH = (windowH)*0.9;
        
        $('#wrap').css('min-height', (wrapH)+'px');  
        $('#main').css('min-height', (wrapH)+'px');  
        var mainH = $('#main').height();
        $('aside').css('min-height', (mainH)+'px'); 
        
        $(window).resize(function(){
          var windowH = $(window).height();
          var wrapperH = $('#wrap').height();
          var margin = (windowH)*0.05;
          var wrapH = (windowH)*0.9;
          
          $('#wrap').css('min-height', (wrapH)+'px');  
          $('#main').css('min-height', (wrapH)+'px');  
          var mainH = $('#main').height();
          $('aside').css('min-height', (mainH)+'px'); 
        })
        
        //Other things to be done
        $('form .submit').click(function() {
          $(this).parent().submit();  
        });
        /*$('.empty-db').click(function() {
          alert('This will delete all facts, rules & KB Tables from database. Do you want to proceed?');
        });*/
        
        var new_rule_short = $("#new_rule_short").val();
        var new_rule = $("#new_rule").val();
        
        //For Keys to add rules in input box
        $('.key').click(function() {
          if($(this).attr('ref') == "CLEAR"){
            new_rule = '';
            new_rule_short = '';
          }
          else{
            if(new_rule != ''){
              new_rule = new_rule + ' ' + $(this).text();
              new_rule_short = new_rule_short + '+' + $(this).attr('ref');
            } 
            else{
              new_rule = new_rule + $(this).text();
              new_rule_short = new_rule_short + $(this).attr('ref');
            } 
          }
          $("#new_rule").val(new_rule); 
          $("#new_rule_short").val(new_rule_short); 
        });
      })  
    </script>

    <style type="text/css">
      .clear{
          width:95%;
          margin-left:2.5%;
          margin-right:2.5%;
          display:block;
          height:auto;
          float:left;
          border-top:1px solid rgba(213, 213, 213, 0.39);
          border-bottom:1px solid rgba(182, 182, 182, 0.06);
          height:1px;
          margin-top:5px;
          margin-bottom:5px;
        }
        .key{
          /*width:100%;*/
          min-width:5%;
          float:left;
          display:block;
          padding: 3px 8px 3px 8px;
          margin: 8px 8px 8px 8px;
          border-radius:5px;
          text-align:center;
          cursor:pointer;
          background-color:rgba(33, 191, 48);
          color:#ffffff;
          box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .key:active{
          background-color:rgba(255, 255, 255, 0.12);
          color:#ffffff;
          box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.5);
        }
    </style>

  </head>
  <body>
    <!-- Side Navbar -->
    <?php 
        $data['hal'] = "rule";
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
            <li class="breadcrumb-item active">Rule</li>
          </ul>
        </div>
      </div>

      <!-- KONTEN -->
      <section>
        <div class="container-fluid">
          <div style="height: 10px"></div>

          <div class="row">
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Rule
                  </h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="<?php echo base_url()?>admin/rule/simpan" method="post">
    

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Kode Rule</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $kode_rule ?>" required="required" name="kode_rule" readonly>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Rule</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="new_rule" value="" required="required" name="new_rule" placeholder="Tambahkan aturan baru menggunakan tombol yang ditunjukkan di bawah ini" readonly>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label"></label>
                      <div class="col-sm-10">
                        <div class="key" ref="if(">if</div>
                        <div class="key" ref="OR">or</div>
                        <div class="key" ref="and">and</div>
                        <div class="key" ref="not">not</div>
                        <div class="key" ref="then">then</div>
                        <div class="key" ref="CLEAR" style="background-color:rgb(173, 83, 79);">Hapus</div>
                      </div>

                      <label class="col-sm-2 form-control-label"></label>
                      <div class="col-sm-10">
                        <?php foreach ($data_variabel as $row) { ?>
                        <div class="key" ref="<?php echo $row->inisialisasi ?>"><?php echo $row->inisialisasi ?></div>
                        <?php } ?>
                      </div>

                      <!-- <label class="col-sm-2 form-control-label"></label>
                      <div class="col-sm-10">
                        <?php foreach ($data_variabel_khusus as $row) { ?>
                        <div class="key" ref="<?php echo $row->inisialisasi ?>"><?php echo $row->variabel ?></div>
                        <?php } ?>
                      </div> -->
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Kategori Target</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="kategori_target">
                          <option value="Layak">Layak</option>
                          <option value="Dipertimbangkan">Dipertimbangkan</option>
                          <option value="Tidak Layak">Tidak Layak</option>
                        </select>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                    <b>Keterangan:</b>
                    <table>
                      <?php foreach ($data_variabel as $row) { ?>
                        <tr>
                        <td><?php echo $row->inisialisasi ?></td>
                        <td> = </td>
                        <td><?php echo $row->variabel ?></td>
                        </tr>
                      <?php } ?>
                    </table>
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