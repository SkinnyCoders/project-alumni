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
             <li class="breadcrumb-item active">Status Alumni</li>
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
         <div class="col-md-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">Perbarui Status</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <form action="" method="post">
               <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2bs4" data-placeholder="Pilih Status">
                        <option></option>
                        <option value="bekerja" <?php if(!empty($status) && $status['status'] == 'bekerja' ){ echo 'selected'; }?>>Bekerja</option>
                        <option value="kuliah" <?php if(!empty($status) && $status['status'] == 'kuliah' ){ echo 'selected'; }?>>Kuliah</option>
                        <option value="tidak" <?php if(!empty($status) && $status['status'] == 'tidak' ){ echo 'selected'; }?>>Belum / Tidak bekerja</option>
                        <option value="bekerja kuliah" <?php if(!empty($status) && $status['status'] == 'bekerja kuliah' ){ echo 'selected'; }?>>Bekerja sambil kuliah</option>
                    </select>
                    <small class="text-danger mt-2"><?= form_error('status') ?></small>
                </div>

                  <div class="form-group" id="kerja" style="display: none;">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan" value="<?php if (!empty($status['jabatan'])) {echo $status['jabatan'];}?>">
                  </div>
                  <div class="form-group" id="mulai_kerja" style="display: none;">
                    <label for="jabatan">Mulai kerja</label>
                    <input type="text" name="mulai_kerja" class="form-control" id="datepicker1" placeholder="Pilih Tanggal Mulai" value="<?php if (!empty($status['tanggal_bekerja'])) {echo DateTime::createFromFormat('Y-m-d', $status['tanggal_bekerja'])->format('m/d/Y') ;}?>">
                  </div>

                <div id="kuliah" style="display: none;">
                  <div class="form-group">
                    <label for="jabatan">Nama Universitas</label>
                    <input type="text" name="univ" class="form-control" placeholder="Masukkan Nama Universitas"  value="<?php if (!empty($status['universitas'])) {echo $status['universitas'];}?>">
                  </div>
                </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="deskripsi">Deskripsi Status</label>
                       <textarea id="deskripsi" name="deskripsi" class="form-control" style="height: 150px;" placeholder="Masukkan status anda yang sekarang. Misalkan jika anda bekerja, sebutkan dimana lokasi anda bekerja, posisi apa, dan berapa lama anda bekerja. Deskripsikan segala sesuatu yang anda anggap penting kepada kami, karena hal ini dapat membantu kami untuk mentracking alumni"><?php if (!empty($status['deskripsi'])) {echo $status['deskripsi'];}?></textarea>
                        <small class="text-danger mt-2"><?= form_error('deskripsi') ?></small>
                     </div>
                   </div>
                 </div>
             </div>
             <div class="card-footer">
               <button type="submit" class="btn btn-primary float-right">Simpan</button>
             </div>
             </form>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
       </div>
     </div>
   </section>
 </div>
 <!-- /.content-wrapper -->

 <?php $this->load->view('templates/cdn_admin'); ?>
  <!-- bootstrap datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

 <script>
    $(function() {
          //Date picker
          $('#datepicker1').datepicker({
              autoclose: true
          })
      });

      $(function() {
          //Date picker
          $('#datepicker2').datepicker({
              autoclose: true
          })
      });

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

   var loadFile = function(event) {
     var output = document.getElementById('output');
     output.src = URL.createObjectURL(event.target.files[0]);
   };

   $(document).ready(function(){
    var status = $('#status').val();
     if(status == 'bekerja'){
       $('#kerja').show();
       $('#mulai_kerja').show();
       $('#kuliah').hide();
     }else if(status == 'kuliah'){
      $('#kuliah').show();
        $('#kerja').hide();
        $('#mulai_kerja').hide();
     }else if(status == 'tidak'){
      $('#kerja').hide();
      $('#kuliah').hide();
      $('#mulai_kerja').hide();
     }else if(status == 'bekerja kuliah'){
      $('#kerja').show();
      $('#mulai_kerja').show();
      $('#kuliah').show();
     }
   })

   $('#status').on('change', function(){
     var status = $('#status').val();
     if(status == 'bekerja'){
       $('#kerja').show();
       $('#mulai_kerja').show();
       $('#kuliah').hide();
     }else if(status == 'kuliah'){
      $('#kuliah').show();
        $('#kerja').hide();
        $('#mulai_kerja').hide();
     }else if(status == 'tidak'){
      $('#kerja').hide();
      $('#kuliah').hide();
      $('#mulai_kerja').hide();
     }else if(status == 'bekerja kuliah'){
      $('#kerja').show();
      $('#mulai_kerja').show();
      $('#kuliah').show();
     }
   })

   $('.update').on('click', function() {
     var dataId = this.id;
     $.ajax({
       type: "post",
       url: "<?= base_url('admin/sekolah/tahun_ajaran/update') ?>",
       data: {
         'id_get_update': dataId
       },
       dataType: "json",
       success: function(data) {
         $('.id_tahun').val(data.id_tahun_ajaran);
         $('.tgl_mulai').val(data.tahun_mulai);
         $('.tgl_akhir').val(data.tahun_akhir);
       },
     });
   });
 </script>