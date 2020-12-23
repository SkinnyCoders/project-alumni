<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')?>">
    <!-- daterange picker -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/select2/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>perusahaan"><b>Daftar Akun</b> Perusahaan</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Data Perusahaan</p>

      <form action="" method="post">
          <div class="form-group">
            <small class="text-danger"><?= form_error('nama_perusahaan') ?></small>
            <div class="input-group mb-3">
                <input type="text" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-company"></span>
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <small class="text-danger"><?= form_error('bidang') ?></small>
            <div class="input-group mb-3">
                <input type="text" name="bidang" class="form-control" placeholder="Bidang Usaha">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-company"></span>
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <small class="text-danger"><?= form_error('lokasi') ?></small>
            <select name="lokasi" id="lokasi" class="form-control " style="width: 100%;">
    
            </select>
          </div>
          <div class="form-group">
            <small class="text-danger"><?= form_error('tgl_berdiri') ?></small>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="tgl_berdiri" id="datepicker" placeholder="Tanggal Berdiri">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <small class="text-danger"><?= form_error('bidang') ?></small>
            <div class="input-group mb-3">
                <textarea name="alamat" id="alamat" class="form-control" style="height: 100px;" placeholder="Alamat Lengkap Perusahaan"></textarea>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-company"></span>
                    </div>
                </div>
            </div>
          </div>
          <hr>

        <p class="login-box-msg mt-2 mb-0">Data Diri</p>
          <div class="form-group">
            <small class="text-danger"><?= form_error('nama') ?></small>
            <div class="input-group mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <small class="text-danger"><?= form_error('email') ?></small>
            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
          <small class="text-danger"><?= form_error('password') ?></small>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
          </div>
    
        <div class="row">
         <!--  <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12 mt-2">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js')?>"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js')?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js')?>"></script>

<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>

    $(function() {
          //Date picker
          $('#datepicker').datepicker({
              autoclose: true
          })
      });
  </script>

<script>
 //Initialize Select2 Elements
 $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    });

$(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 4000
    });
    <?php 
    if($this->session->flashdata('msg_failed')){
    ?>
      Toast.fire({
        type: 'error',
        title: '<?= $this->session->flashdata('msg_failed')?>'
      });
    <?php 
    }elseif($this->session->flashdata('msg_success')){
    ?>
    Toast.fire({
        type: 'success',
        title: '<?= $this->session->flashdata('msg_success')?>'
    });
    <?php
    }
    ?>
});
</script>
<script>
  $(document).ready(function(){
    console.log("ok");
      $.ajax({
          type : "GET",
          url : "<?=base_url('perusahaan/register/provinsi')?>",
          dataType : "json",
          success : function(data){
            var html = '<option>Pilih lokasi</option>';
            var i;

            for (i = 0; i < data.rajaongkir.results.length; i++) {

                html += '<option value="' + data.rajaongkir.results[i].province + '">' + data.rajaongkir.results[i].province + '</option>'
            }

            $('#lokasi').html(html);
          }
      })
  })
  </script>
</body>
</html>
