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
             <li class="breadcrumb-item"><a href="<?= base_url('alumni/dashboard') ?>">Dashboard</a></li>
             <li class="breadcrumb-item"><a href="<?= base_url('alumni/lowongan') ?>">Lowongan</a></li>
             <li class="breadcrumb-item active">Detail Lowongan Kerja</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
            <!-- <div class="col-12">
                <h4>
                <i class="fas fa-globe"></i> AdminLTE, Inc.
                <small class="float-right">Date: 2/10/2014</small>
                </h4>
            </div> -->
            <!-- /.col -->

            </div>
            <!-- info row -->
            <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <img src="<?=base_url()?>assets/uploads/file_berita/<?=$lowongan['thumbnail']?>" style="width:100%; height:250px;"  alt="">
                <small class="mt-5 text-muted">di posting oleh <?=$lowongan['author']?> - tanggal <?=DateTime::createFromFormat('Y-m-d H:i:s', $lowongan['create_at'])->format('d F Y')?></small>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col ml-2">
                <h3><strong><?=ucwords($lowongan['posisi_pekerjaan'])?></strong></h3>
                <h4><?=ucwords($lowongan['nama'])?></h4>
                <p><?=$lowongan['deskripsi']?></p>
                <span class="text-muted"><strong>Penempatan :</strong> <?=ucwords($lowongan['penempatan'])?></span><br>
                <span class="text-muted"> <strong>Dibuat :</strong> <?php echo DateTime::createFromFormat('Y-m-d H:i:s', $lowongan['create_at'])->format('d F Y')?></span><br>
                <span class="text-muted"> <strong>Berakhir :</strong> <?php echo DateTime::createFromFormat('Y-m-d', $lowongan['berakhir'])->format('d F Y')?></span><br>
                
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row mt-3">
            <!-- accepted payments column -->
            <div class="col-8">
                <p class="lead">Deskripsi Pekerjaan</p>

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                <?php echo $lowongan['deskripsi_lowongan'] ?>
                </p>
            </div>
            </div>
            <hr>
            <?php
            if($cek_detail > 0){
              $disabled = 'disabled';
              $msg = "Anda Sudah Mendaftar";
            }else{
              $disabled = '';
              $msg = "Daftar Sekarang";
            }
            ?>
            <a href="javascript:void(0)" data-toggle="modal" id="<?=$lowongan['id_lowongan']?>" data-target="#modal-lg" class="btn btn-success <?=$disabled?>"><?=$msg?></a>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <!-- <div class="row no-print">
            <div class="col-12">
                <button type="button" class="btn btn-default" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
                </button>
            </div>
            </div> -->

            <div class="modal fade" id="modal-lg">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                    <div class="row">
                    <p class="modal-title text-center">Kamu akan melamar ke <b><?=ucwords($lowongan['nama'])?></b> sebagai <b><?=ucwords($lowongan['posisi_pekerjaan'])?></b></p>
                     <!-- <h4 >Lamar Lowongan</h4> -->
                    </div>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <!-- form start -->
                    <form action="<?= base_url('alumni/lowongan/apply') ?>" method="post" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id_lowongan" value="<?=$lowongan['id_lowongan']?>">
                      <input type="hidden" name="id_company" value="<?=$lowongan['id_company']?>">
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputFile">Resume  <span class="text-danger">*</span></label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="resume" onchange="loadFile(event)" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Pilih File Resume</label>
                                
                              </div>
                            </div>
                            <small class="text-muted">Upload file dalam format PDF max 5mb</small>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Posisi yang ingin dilamar</label>
                        <select name="posisi" class="form-control" id="">
                          <?php
                          $lowongans = explode(",", $lowongan['posisi_pekerjaan']);
                          for($i=0; $i < count($lowongans); $i++){
                            ?>
                            <option value='<?=strtolower($lowongans[$i])?>'><?=$lowongans[$i]?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kelas">Contact <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="contact" id="posisi" placeholder="Masukkan No Telp" value="<?php echo set_value('contact'); ?>">
                        <small class="text-danger mt-2"><?= form_error('contact') ?></small>
                      </div>
                      <div class="form-group">
                        <label for="misi">Cover letter <span class="text-danger">*</span></label>
                        <textarea id="lamaran" name="lamaran" class="form-control" style="height: 150px;" placeholder="Masukkan Surat Lamaran"></textarea>
                        <small class="text-danger mt-2"><?= form_error('lamaran') ?></small>
                      </div>
                    </div>
                    <!-- /.card-body -->
                   <div class="modal-footer justify-content-between">
                     <button type="submit" name="simpan" class="btn btn-primary btn-block">Lamar Sekarang</button>
                     </form>
                   </div>
                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
             </div>
             <!-- /.modal -->

        </div>
        <!-- /.invoice -->
     </div>
   </section>
 </div>
 <!-- /.content-wrapper -->

 <?php $this->load->view('templates/cdn_admin'); ?>

 <script>

   var loadFile = function(event) {
     var output = document.getElementById('output');
     output.src = URL.createObjectURL(event.target.files[0]);
   };

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