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
                          <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item active">Daftar Pengguna</li>
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
                              <h3 class="card-title"><i class="far fa-dollar"></i> Tabel Daftar Pengguna</h3>
                              <a class="btn btn-sm btn-primary float-right ml-3" data-toggle="modal" data-target="#modal-tambah" href="javascript:void(0)"><i class="fa fa-plus"></i> Tambah Pengguna</a>
                              <!-- <a class="btn btn-sm btn-success float-right ml-3" href="<?= base_url('admin/lowongan/rekap') ?>"><i class="fa fa-download"></i> Download Rekap Lowongan</a> -->
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <table id="example1" class="table table-striped">
                             <thead>
                               <tr>
                                 <th class="text-nowrap" style="width: 5%">No</th>
                                 <th class="text-nowrap" style="width: 10%">Gambar</th>
                                 <th class="text-nowrap">Nama</th>
                                 <th class="text-nowrap">Email</th>
                                 <th class="text-nowrap">No Telp</th>
                                 <th class="text-nowrap">Level</th>
                                 <th class="text-nowrap">Status</th>
                                 <th style="width: 10%">Aksi</th>
                               </tr>
                             </thead>
                             <tbody>
                              <?php 
                              $no = 1;
                              foreach ($datas as $data) :
                              ?>
                              <tr>
                                <td><?=$no++?></td>
                                <td><img class="brand-image" style="width: 50px; height: 5Nama0px; border-radius: 5%" src="<?= base_url('assets/img/user/default.png') ?>"></td>
                                <td><?=ucwords($data['nama'])?></td>
                                <td><?=$data['email']?></td>
                                <td><?=$data['no_telp']?></td>
                                <td><?=$data['level']?></td>
                                <td>Aktif</td>
                                <td><a href="javascript:void(0)" data-toggle="modal" id="<?=$data['id_member']?>" data-target="#modal-lg" class="btn btn-sm btn-primary mr-3 update"><i class="fa fa-edit"></i></a><a href="javascript:void(0)" id="<?=$data['id_member']?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a></td>
                              </tr>
                              <?php 
                              endforeach;
                               ?>
                             </tbody>
                           </table>
                          </div>
                          <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                  </div>
              </div>

              <!-- tambah pengguna -->
              <div class="modal fade" id="modal-tambah">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Tambah Pengguna</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                    <form action="<?= base_url('perusahaan/users/add') ?>" method="post" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id_lowongan" value="">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kelas">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama" id="posisi" placeholder="Masukkan Nama Pengguna" value="<?php echo set_value('kelas'); ?>">
                                <small class="text-danger mt-2"><?= form_error('kelas') ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email" id="gaji" placeholder="Masukkan Email Pengguna" value="<?php echo set_value('gaji'); ?>">
                            <small class="text-danger mt-2"><?= form_error('penempatan') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Pengguna" value="<?php echo set_value('gaji'); ?>">
                            <small class="text-danger mt-2"><?= form_error('gaji') ?></small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tahun">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password2" id="gaji" placeholder="Konfirmasi Password Pengguna" value="<?php echo set_value('gaji'); ?>">
                            <small class="text-danger mt-2"><?= form_error('penempatan') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tahun">No telp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="telp" id="kemampuan" placeholder="Masukkan No telp" value="<?php echo set_value('kemampuan'); ?>">
                            <small class="text-danger mt-2"><?= form_error('kemampuan') ?></small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Level <span class="text-danger">*</span></label>
                            <select id="pengalaman" class="form-control select2bs42" name="level" style="width: 100%;" data-placeholder="Pilih Pengalaman">
                              <option></option>
                              <option value="admin">Admin</option>
                              <option value="recruitment">Recruitment</option>
                            </select>
                            <small class="text-danger mt-2"><?= form_error('gaji') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="misi">Alamat Pengguna <span class="text-danger">*</span></label>
                        <textarea id="des" name="alamat" class="form-control" style="height: 150px;" placeholder="Masukkan Alamat Pengguna"></textarea>
                        <small class="text-danger mt-2"><?= form_error('alamat') ?></small>
                      </div>
                    </div>
                    <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                     <button type="submit" name="simpan" class="btn btn-primary">Tambah Pengguna</button>
                     </form>
                   </div>
                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
             </div>
             <!-- /.modal -->

              <!-- perbarui pengguna -->
              <div class="modal fade" id="modal-lg">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Perbarui Pengguna</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                    <form action="<?= base_url('perusahaan/users/update') ?>" method="post" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id_member" value="">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kelas">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Pengguna" value="<?php echo set_value('kelas'); ?>">
                                <small class="text-danger mt-2"><?= form_error('kelas') ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email Pengguna" value="<?php echo set_value('gaji'); ?>">
                            <small class="text-danger mt-2"><?= form_error('penempatan') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Pengguna" value="<?php echo set_value('gaji'); ?>">
                            <small class="text-danger mt-2"><?= form_error('gaji') ?></small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tahun">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password2" id="gaji" placeholder="Konfirmasi Password Pengguna" value="<?php echo set_value('gaji'); ?>">
                            <small class="text-danger mt-2"><?= form_error('penempatan') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tahun">No telp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan No telp" value="<?php echo set_value('kemampuan'); ?>">
                            <small class="text-danger mt-2"><?= form_error('kemampuan') ?></small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="kelas">Level <span class="text-danger">*</span></label>
                            <select id="level" class="form-control select2bs42" name="level" style="width: 100%;" data-placeholder="Pilih Pengalaman">
                              <option></option>
                              <option value="admin">Admin</option>
                              <option value="recruitment">Recruitment</option>
                            </select>
                            <small class="text-danger mt-2"><?= form_error('gaji') ?></small>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="misi">Alamat Pengguna <span class="text-danger">*</span></label>
                        <textarea id="alamat" name="alamat" class="form-control" style="height: 150px;" placeholder="Masukkan Alamat Pengguna"></textarea>
                        <small class="text-danger mt-2"><?= form_error('alamat') ?></small>
                      </div>
                      <div class="form-group">
                        <label for="kelas">Status <span class="text-danger">*</span></label>
                        <select id="status" class="form-control select2bs42" name="status" style="width: 100%;" data-placeholder="Pilih Status">
                            <option></option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                        </select>
                        <small class="text-danger mt-2"><?= form_error('gaji') ?></small>
                      </div>
                    </div>
                    <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                     <button type="submit" name="simpan" class="btn btn-primary">Tambah Pengguna</button>
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

    $('.select2bs42').select2({
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
       url: "<?= base_url('perusahaan/users/update') ?>",
       data: {
         'id_get_update': dataId
       },
       dataType: "json",
       success: function(data) {
          $('#id_member').val(data.id);     
          $('#nama').val(data.nama);
          $('#email').val(data.email);
          $('#telp').val(data.telp);
          $('#alamat').text(data.alamat);
          $('#level').val(data.level).change();
          $('#status').val(data.status).change();
       },
     });
   });

   $('.delete').on('click', function(e) {
     e.preventDefault();
     var dataId = this.id;
     Swal.fire({
       title: 'Hapus Data Pengguna',
       text: "Apakah anda yakin ingin menghapus data pengguna ini?",
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
             url: "<?= base_url() ?>perusahaan/users/delete/" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('perusahaan/users') ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('perusahaan/users') ?>";
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