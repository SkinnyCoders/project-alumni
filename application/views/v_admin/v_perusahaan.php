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
                          <li class="breadcrumb-item active">Daftar Perusahaan</li>
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
                              <h3 class="card-title"><i class="far fa-dollar"></i> Tabel Daftar Perusahaan</h3>
                              <a class="btn btn-sm btn-primary float-right ml-3" href="<?= base_url('admin/perusahaan/tambah') ?>"><i class="fa fa-plus"></i> Tambah Perusahaan</a>
                              <!-- <a class="btn btn-sm btn-success float-right ml-3" href="<?= base_url('admin/event/rekap') ?>"><i class="fa fa-download"></i> Download Rekap Event</a> -->
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
          
                          <div class="card-body">
                            <table id="example1" class="table table-striped">
                             <thead>
                               <tr>
                                 <th class="text-nowrap" style="width: 5%">No</th>
                                 <th class="text-nowrap">Logo</th>
                                 <th class="text-nowrap">Nama</th>
                                 <th class="text-nowrap">Deskripsi</th>
                                 <th class="text-nowrap">Lokasi</th>
                                 <th class="text-nowrap">Bidang Usaha</th>
                                 <th class="text-nowrap">Tanggal Daftar</th>
                                 <th class="text-nowrap">Status</th>
                                 <th style="width: 12%">Aksi</th>
                               </tr>
                             </thead>
                             <tbody>
                              <?php 
                              $no = 1;
                              foreach ($events as $acara) :
                                if($acara['logo'] == ''){
                                    $logo = 'default-image.png';
                                }else{
                                    $logo = $acara['logo'];
                                }
                              ?>
                              <tr>
                                <td><?=$no++?></td>
                                
                                <td><img class="brand-image" style="width: 70px; height: 70px; border-radius: 5%" src="<?= base_url('assets/img/uploads/' . $logo) ?>"></td>
                                <td><?=ucwords($acara['nama'])?></td>
                                <td><?= ucwords(word_limiter($acara['deskripsi'], 27))?></td>
                                <td><?=$acara['lokasi']?></td>
                                <td><?=ucwords($acara['bidang_usaha'])?></td>
                                <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $acara['create_at'])->format('d/m/Y') ?></td>
                                <td><?=ucwords($acara['status'])?></td>
                                <td>
                                <a href="javascript:void(0)" data-toggle="modal" id="<?=$acara['id_company']?>" data-target="#modal-lg" class="btn btn-sm btn-primary update"><i class="fa fa-edit"></i></a>
                                <a href="<?=base_url()?>admin/perusahaan/detail/<?=$acara['id_company']?>" id="<?=$acara['id_company']?>" class="btn btn-sm btn-success"><i class="fa fa-info"></i></a>
                                <a href="javascript:void(0)" id="<?=$acara['id_company']?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a></td>
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

              <div class="modal fade" id="modal-lg">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Perbarui Status</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                    <form action="<?= base_url('admin/perusahaan/status') ?>" method="post" role="form">
                      <input type="hidden" name="id_company" id="id_company" value="">
                        <div class="form-group">
                            <label for="kelas">Status Perusahaan <span class="text-danger">*</span></label>
                            <select id="status1" class="form-control select2bs4" name="status" style="width: 100%;" data-placeholder="Pilih Pengalaman">
                              <option value="active">Active</option>
                              <option value="pending">Pending</option>
                            </select>
                            <small class="text-danger mt-2"><?= form_error('nama') ?></small>
                        </div>
                    </div>
                    <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                     <button type="submit" name="simpan_status" class="btn btn-primary">Perbarui</button>
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
       url: "<?= base_url('admin/perusahaan/status') ?>",
       data: {
         'id_get_status': dataId
       },
       dataType: "json",
       success: function(data) {
           console.log(data)
           $("#status1").val(data.status).change();
           $('#id_company').val(data.id);
 
       },
     });
   });

   $('.delete').on('click', function(e) {
     e.preventDefault();
     var dataId = this.id;
     Swal.fire({
       title: 'Hapus Data Event',
       text: "Apakah anda yakin ingin menghapus data ini?",
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
             url: "<?= base_url() ?>admin/perusahaan/delete/" + dataId,
             data: {
               'id_kelas': dataId
             },
             success: function(respone) {
               window.location.href = "<?= base_url('admin/perusahaan') ?>";
             },
             error: function(request, error) {
               window.location.href = "<?= base_url('admin/perusahaan') ?>";
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