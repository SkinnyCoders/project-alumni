  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark"><?= ucwords($title) ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('perusahaan/dashboard') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('perusahaan/lowongan') ?>">Lowongan</a></li>
                          <li class="breadcrumb-item active">Detail Pelamar</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
        $id = $this->uri->segment(4);
      ?>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
          <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-default ">
                          <div class="card-header">
                              <h3 class="card-title"><i class="far fa-dollar"></i> Detail Pelamar</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <div class="row">

                              <div class="col-sm-6 border-right">
                                <table class="table table-borderless">
                                  <tr>
                                    <th style="width: 35%">NISN</th>
                                    <td>: <span id="email"> <?=$alumni['nisn']?></span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 35%">Nama</th>
                                    <td>: <span id="tanggal_lahir"><?=!empty($alumni['nama'])?ucwords($alumni['nama']):"Kosong"?> </span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 35%">Email</th>
                                    <td>: <span id="tempat_lahir"> <?=!empty($alumni['email'])?ucwords($alumni['email']):"Kosong"?></span></td>
                                  </tr>
                                  
                                  <tr>
                                    <th style="width: 35%">Jurusan</th>
                                    <td>: <span id="jenis_kelamin"> <?=!empty($alumni['nama_jurusan'])?ucwords($alumni['nama_jurusan']):"Kosong"?></span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 35%">Tahun Lulus</th>
                                    <td>: <span id="jenis_kelamin"> <?=!empty($alumni['tahun_lulus'])?$alumni['tahun_lulus']:"Kosong"?></span></td>
                                  </tr>
                                  
                                  
                                </table>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <table class="table table-borderless">
                                <tr>
                                    <th style="width: 35%">Jenis Kelamin</th>
                                    <td>: <span id="jenis_kelamin">
                                    <?php
                                    if(!empty($alumni['jenis_kelamin'])){
                                        if($alumni['jenis_kelamin'] == 'L'){
                                            $kelamin = 'Laki - Laki';
                                        }else{
                                            $kelamin = 'Perempuan';
                                        }
                                    }else{
                                        $kelamin = "Kosong";
                                    }
                                    echo $kelamin;
                                    ?>
                                     </span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 35%">Alamat</th>
                                    <td>: <span id="telepon"> <?=!empty($alumni['alamat'])?$alumni['alamat']:"Kosong"?></span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 35%">Tanggal Lahir</th>
                                    <td>: <span id="agama"> <?=!empty($alumni['tanggal_lahir'])?DateTime::createFromFormat('Y-m-d', $alumni['tanggal_lahir'])->format('d F Y'):"Kosong"?></span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 35%">Tempat Lahir</th>
                                    <td>: <span id="tahun_masuk"> <?=!empty($alumni['tempat_lahir'])?ucwords($alumni['tempat_lahir']):"Kosong"?></span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 35%">Agama</th>
                                    <td>: <span id="alamat"> <?= !empty($alumni['agama'])?ucwords($alumni['agama']):"Kosong"?></span></td>
                                  </tr>
                                </table>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-default ">
                          <div class="card-header">
                              <h3 class="card-title"><i class="far fa-dollar"></i> Resume dan Cover Letter</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <div class="row">

                              <div class="col-sm-12">
                                <table class="table table-borderless">
                                  <tr>
                                    <th style="width: 15%">File Resume</th>
                                    <td>: <span id="email"> <a href="<?=base_url('assets/file_lamaran/'.$alumni['resume'])?>" target="_blank" class="btn btn-sm btn-primary">Lihat file</a></span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 15%">Kontak</th>
                                    <td>: <span id="tanggal_lahir"><?=!empty($alumni['contact'])?ucwords($alumni['contact']):"Kosong"?> </span></td>
                                  </tr>
                                  <tr>
                                    <th style="width: 15%">Cover Letter</th>
                                    <td>: <span id="tempat_lahir"> <?=!empty($alumni['cover_letter'])?ucwords($alumni['cover_letter']):"Kosong"?></span></td>
                                  </tr>                  
                                </table>
                                <!-- /.description-block -->
                              </div>
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                          <?php
                          if($alumni['status_berkas'] == 'terima'){
                            $disable_terima = 'disabled';
                            $disable_tolak = '';
                          }elseif($alumni['status_berkas'] == 'tolak'){
                            $disable_terima = '';
                            $disable_tolak = 'disabled';
                          }else{  
                            $disable_terima = '';
                            $disable_tolak = '';
                          }
                          ?>
                          <a href="<?=base_url()?>perusahaan/lowongan/berkas?status=tolak&id=<?=$id?>" class="btn btn-sm btn-danger float-right <?=$disable_tolak?>">Tidak Memenuhi</a>
                          <a href="<?=base_url()?>perusahaan/lowongan/berkas?status=terima&id=<?=$id?>" class="btn btn-sm btn-success float-right mr-2 <?=$disable_terima?>">Verifikasi</a>
                          </div>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-default ">
                          <div class="card-header">
                              <h3 class="card-title"><i class="far fa-dollar"></i> Hasil Tes Seleksi</h3>
                              <!-- <a class="btn btn-sm btn-primary float-right ml-3" href="<?= base_url('perusahaan/lowongan/tambah') ?>"><i class="fa fa-plus"></i> Tambah Lowongan</a> -->
                              <!-- <a class="btn btn-sm btn-success float-right ml-3" href="<?= base_url('admin/lowongan/rekap') ?>"><i class="fa fa-download"></i> Download Rekap Lowongan</a> -->
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <?php if(!empty($hasil_tes)){?>
                                <table id="example1" class="table table-striped">
                             <thead>
                               <tr>
                                 <th class="text-nowrap" style="width: 5%">No</th>
                                 <th class="text-nowrap">Nama Tes</th>
                                 <th class="text-nowrap">Bobot Tes</th>
                                 <th class="text-nowrap">Nilai Benar</th>
                                 <th class="text-nowrap">Nilai Akhir</th>
                                 <th class="text-nowrap">Status</th>
                               </tr>
                             </thead>
                             <tbody>
                              <?php 
                              $no = 1;
                              foreach ($hasil_tes as $hasil) :
                              ?>
                              <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($hasil['nama_tes_seleksi'])?></td>
                                <td><?=$hasil['bobot_tes']?></td>
                                <td><?=$hasil['nilai_benar']?></td>
                                <td><?=$hasil['nilai_akhir']?></td>
                                <td><?=ucwords($hasil['status'])?></td>
                              </tr>
                              <?php 
                              endforeach;
                               ?>
                             </tbody>
                           </table>
                           <?php }else{ ?>
                                <table id="example1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap" style="width: 5%">No</th>
                                        <th class="text-nowrap">Gambar</th>
                                        <th class="text-nowrap">Posisi</th>
                                        <th class="text-nowrap">Penempatan</th>
                                        <th class="text-nowrap">Deskripsi</th>
                                        <th class="text-nowrap">Berakhir</th>
                                        <th style="width: 12%">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr></tr>
                                    </tbody>
                                </table>
                            <?php
                            }
                            ?>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>

              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-default ">
                          <div class="card-header">
                              <h3 class="card-title"><i class="far fa-dollar"></i> Keputusan Penerimaan Calon Pegawai</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <div class="row">

                              <div class="col-sm-12">
                              <p>Silahkan melakukan konfirmasi atas keputusan akhir pada tahap penerimaan calon pegawai baru berdasarkan keriteria dan kebutuhan perusahaan!</p>
                              <?php
                              if($alumni['status'] == 'terima'){
                                $disable_terima1 = 'disabled';
                                $disable_tolak1 = '';
                              }elseif($alumni['status'] == 'tolak'){
                                $disable_terima1 = '';
                                $disable_tolak1 = 'disabled';
                              }else{  
                                $disable_terima1 = '';
                                $disable_tolak1 = '';
                              }
                              ?>
                              <a href="javascript:void(0)" id="<?=$id?>" class="btn btn-danger float-right delete <?=$disable_tolak1?>">Tolak Pelamar</a>
                              <a href="javascript:void(0)" id="<?=$id?>" class="btn btn-success float-right mr-2 acc <?=$disable_terima1?>">Terima Pelamar</a>
                              </div>
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                          
                          </div>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div>
      </section>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('templates/cdn_admin'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    $(function() {
          //Date picker
          $('#datepicker').datepicker({
              autoclose: true
          })
      });
  </script>

  <script>
  $(document).ready(function(){
      $.ajax({
          type : "GET",
          url : "<?=base_url('perusahaan/lowongan/provinsi')?>",
          dataType : "json",
          success : function(data){
            var html = '<option></option>';
            var i;

            for (i = 0; i < data.rajaongkir.results.length; i++) {
                html += '<option value="' + data.rajaongkir.results[i].province + '">' + data.rajaongkir.results[i].province + '</option>'
            }

            $('#penempatan').html(html);
          }
      })
  })
  </script>

   <script>
   $(function() {
     $("#example1").DataTable({});
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
     });
   });


   $('.update').on('click', function() {
     var dataId = this.id;
     $.ajax({
       type: "post",
       url: "<?= base_url('perusahaan/lowongan/update') ?>",
       data: {
         'id_get_update': dataId
       },
       dataType: "json",
       success: function(data) {
          $('#id_lowongan').val(data.id);     
          $('#posisi').val(data.posisi);
          $('#perusahaan').val(data.perusahaan);
          $('.tgl_berakhir').val(data.berakhir);
          $('#des').text(data.deskripsi);
          $('.img').attr('src', data.thumbnail);
          $('#gaji').val(data.gaji);
          $('#kemampuan').val(data.kemampuan);
          $('.penempatan').val(data.penempatan).change();    
          $('#pengalaman').val(data.pengalaman).change();
       },
     });
   });

   $('.delete').on('click', function(e) {
     e.preventDefault();
     var dataId = this.id;
     Swal.fire({
       title: 'Hapus Data Lowongan Pekerjaan',
       text: "Apakah anda yakin ingin menghapus data lowongan ini?",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Ya, Tolak!'
     }).then(
       function(isConfirm) {
         if (isConfirm.value) {
           $.ajax({
            type: "post",
             url: "<?= base_url() ?>perusahaan/lowongan/penerimaan?status=tolak&id=" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('perusahaan/lowongan/detail/'.$id) ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('perusahaan/lowongan/detail/'.$id) ?>";
             },
           });
         } else {
           swal("Cancelled", "Your imaginary file is safe :)", "error");
         }
       });
   });

   $('.acc').on('click', function(e) {
     e.preventDefault();
     var dataId = this.id;
     Swal.fire({
       title: 'Hapus Data Lowongan Pekerjaan',
       text: "Apakah anda yakin ingin menghapus data lowongan ini?",
       type: "success",
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Ya, Terima!'
     }).then(
       function(isConfirm) {
         if (isConfirm.value) {
           $.ajax({
             type: "post",
             url: "<?= base_url() ?>perusahaan/lowongan/penerimaan?status=terima&id=" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('perusahaan/lowongan/detail/'.$id) ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('perusahaan/lowongan/detail/'.$id) ?>";
             },
           });
         } else {
           swal("Cancelled", "Your imaginary file is safe :)", "error");
         }
       });
   });
 </script>

<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>