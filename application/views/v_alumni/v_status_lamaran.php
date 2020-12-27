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
                          <li class="breadcrumb-item"><a href="<?= base_url('alumni') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('alumni/lowongan') ?>">Lowongan</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('alumni/lowongan/list') ?>">Daftar Lowongan</a></li>
                          <li class="breadcrumb-item active">Status Lamaran</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-default ">
                          <div class="card-header">
                              <h3 class="card-title"><i class="far fa-dollar"></i> Status Lamaran</h3>
                              <!-- <a class="btn btn-sm btn-primary float-right ml-3" href="<?= base_url('perusahaan/lowongan/tambah') ?>"><i class="fa fa-plus"></i> Tambah Lowongan</a> -->
                              <!-- <a class="btn btn-sm btn-success float-right ml-3" href="<?= base_url('admin/lowongan/rekap') ?>"><i class="fa fa-download"></i> Download Rekap Lowongan</a> -->
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                        <?php 
                        switch($status_berkas['status']){
                            case 'pending':
                                $status = "fa-clock bg-gray";
                                $disabled_tes = 'disabled';
                                break;
                            
                            case 'terima':
                                $status = "fa-check bg-success";
                                $disabled_tes = '';
                            break;

                            case 'tolak':
                                $status = "fa-times bg-danger";
                                $disabled_tes = 'disabled';
                            break;
                        }

                        switch($status_akhir['status']){
                            case 'pending':
                                $status_final = "fa-clock bg-gray";
                                $message = "Pengumuman akan tampil disini";
                                break;
                            
                            case 'terima':
                                $status_final = "fa-check bg-success";
                                $message = "Selamat, anda diterima. Detail dan info lebih lanjut akan dikirim ke email anda.";
                            break;

                            case 'tolak':
                                $status_final = "fa-times bg-danger";
                                $message = "Mohon Maaf, Lamaran anda belum berhasil lolos.";
                            break;
                        }

                        if($id_tes !== NULL){
                          $id_tes = $id_tes['id_tes'];
                          if($cek_tes > 0){
                            $disabled_tes = 'disabled';
                          }else{
                            if($status_berkas['status'] == 'pending'){
                              $disabled_tes = 'disabled';
                            }else{
                              $disabled_tes = '';
                            }
                          }
                        }else{
                          $status_seleksi = "fa-check bg-success";
                          $disabled_tes = 'disabled';
                        }

                        if($status_tes !== NULL){
                            if($status_tes['status'] == 'lulus'){
                                $status_seleksi = "fa-check bg-success";
                            }else{
                                $status_seleksi = "fa-times bg-danger";
                            }
                        }else{
                            $status_seleksi = "fa-clock bg-gray";
                        }?>
                          <div class="card-body">
                            <div class="timeline timeline-inverse">
                                <div>
                                    <i class="fas fa-check bg-success"></i>

                                    <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> <?=DateTime::createFromFormat('Y-m-d H:i:s', $status_berkas['apply_at'])->format('d F Y H:i:s')?></span>

                                    <h3 class="timeline-header"><a href="#">Kirim Lamaran</a> mengirim cv dan kontak</h3>

                                    <div class="timeline-body">
                                       
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="<?=base_url('assets/file_lamaran/'.$berkas['resume'])?>" target="_blank" class="btn btn-primary btn-sm">Lihat CV</a>
                                        <!-- <a href="#" class="btn btn-danger btn-sm">Delete</a> -->
                                    </div>
                                    </div>
                                </div>
                                 <!-- timeline item -->
                                 <div>
                                    <i class="fas <?=$status?>"></i>

                                    <div class="timeline-item">
                                        <!-- <span class="time"><i class="far fa-clock"></i> 5 mins ago</span> -->

                                        <h3 class="timeline-header border-0"><a href="#">Verifikasi Berkas</a>
                                        </h3>
                                        <div class="timeline-body">
                                        Perusahaan meninjau dan memverifikasi data anda
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas <?=$status_seleksi?>"></i>

                                    <div class="timeline-item">
                                    <!-- <span class="time"><i class="far fa-clock"></i> 5 mins ago</span> -->

                                    <h3 class="timeline-header"><a href="#">Tes Seleksi</a>
                                    </h3>
                                    <div class="timeline-body">
                                        Ikuti tes yang telah ditentukan
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="<?=base_url('alumni/lowongan/seleksi/'.$id_tes)?>" class="btn btn-primary btn-sm <?=$disabled_tes?>">Ikuti Test</a>
                                        <!-- <a href="#" class="btn btn-danger btn-sm">Delete</a> -->
                                    </div>
                                    </div>
                                    
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas <?=$status_final?>"></i>

                                    <div class="timeline-item">
                                        <!-- <span class="time"><i class="far fa-clock"></i> 5 mins ago</span> -->

                                        <h3 class="timeline-header border-0"><a href="#">Hasil Akhir</a>
                                        </h3>
                                        <div class="timeline-body">
                                            <?=$message?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- END timeline item -->
                                <!-- <div>
                                    <i class="far fa-clock bg-gray"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header border-0"><a href="#">Done</a>
                                        </h3>
                                    </div>
                                </div> -->
                            </div>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>

              <div class="modal fade" id="modal-lg">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Edit Lowongan Pekerjaan</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                    <form action="<?= base_url('perusahaan/lowongan/update') ?>" method="post" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id_lowongan" value="">
                      <div class="form-group">
                        <label for="kelas">Posisi Pekerjaan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Masukkan Posisi Pekerjaan" value="<?php echo set_value('kelas'); ?>">
                        <small class="text-danger mt-2"><?= form_error('kelas') ?></small>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Gaji Perbulan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="gaji" id="gaji" placeholder="Masukkan gaji perbulan" value="<?php echo set_value('gaji'); ?>">
                            <small class="text-danger mt-2"><?= form_error('gaji') ?></small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tahun">Penempatan <span class="text-danger">*</span></label>
                            <select id="penempatan" class="form-control select2bs4 penempatan" name="penempatan" style="width: 100%;" data-placeholder="Pilih Penempatan">
                              <option></option>
                            </select>
                            <small class="text-danger mt-2"><?= form_error('penempatan') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Pengalaman Kerja <span class="text-danger">*</span></label>
                            <select id="pengalaman" class="form-control select2bs4" name="pengalaman" style="width: 100%;" data-placeholder="Pilih Pengalaman">
                              <option></option>
                              <option value="Kurang dari satu tahun">Kurang dari satu tahun</option>
                              <option value="1-3 Tahun">1-3 Tahun</option>
                              <option value="3-5 Tahun">3-5 Tahun</option>
                              <option value="5-10 Tahun">5-10 Tahun</option>
                              <option value="Lebih dari 10 Tahun">Lebih dari 10 Tahun</option>
                            </select>
                            <small class="text-danger mt-2"><?= form_error('gaji') ?></small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tahun">Kemampuan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="kemampuan" id="kemampuan" placeholder="Masukkan Kemampuan" value="<?php echo set_value('kemampuan'); ?>">
                            <small class="text-danger mt-2"><?= form_error('kemampuan') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="misi">Deskripsi Lowongan <span class="text-danger">*</span></label>
                        <textarea id="des" name="des" class="form-control" style="height: 150px;" placeholder="Masukkan Deskripsi"></textarea>
                        <small class="text-danger mt-2"><?= form_error('des') ?></small>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="exampleInputFile">Gambar Lowongan</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto" onchange="loadFile(event)" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih File Gambar</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal Berakhir</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="far fa-calendar-alt"></i>
                                      </span>
                                  </div>
                                  <input type="text" name="tgl_berakhir" class="form-control float-right tgl_berakhir" placeholder="Pilih Tanggal" id="datepicker">
                              </div>
                              <!-- /.input group -->
                              <small class="text-danger mt-2"><?= form_error('tgl_berakhir') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <img class="mt-2 mb-2 img" style="width: 200px;" src="" id="output">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                     <button type="submit" name="simpan" class="btn btn-primary">Perbarui</button>
                     </form>
                   </div>
                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
             </div>
             <!-- /.modal -->
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
       confirmButtonText: 'Ya, Hapus!'
     }).then(
       function(isConfirm) {
         if (isConfirm.value) {
           $.ajax({
             type: "post",
             url: "<?= base_url() ?>perusahaan/lowongan/delete/" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('perusahaan/lowongan') ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('perusahaan/lowongan') ?>";
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