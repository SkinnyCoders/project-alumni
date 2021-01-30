<?php 
$project = explode('/', $_SERVER['REQUEST_URI'])[1];
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Laporan Data Alumni <?=$header?></title>
  <style type="text/css">
    .table-me{
      font-size: 14px;
      width: 100%;
      text-align: center;
    }

    .table-me thead{
      border-bottom: 2px solid #000; 
      margin-bottom: 5px;
    }

    .header .header-text{
      text-align: center;
    }

    .header .header-text small{
      font-size: 12px;
      color: #333 ;
    }

    .table-me tbody{
      border-bottom: 2px solid #eaeaea !important;
    }

    .hormat{
      float: right;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div id="outtable">
    <div class="header">
      <table border="0" width="100%">
        <tr>
          <td width="10">
            <div class="header-img">
              <img style="width: 100px; height: 100px; border-radius: 5px;" src="D:/xampp/htdocs/<?=$project?>/assets/images/logosmk.jpg">
            </div>
          </td>
          <td width="100%">
            <div class="header-text">
              <h2>Laporan Data Pelamar<br> SMK Pancasila 7 Pracimantoro <br> <?=$header?></h2>
              <small>Godang, Pracimantoro, Pracimantoro, Kec. Pracimantoro Kab. Wonogiri</small>
            </div>
          </td>
        </tr>
      </table>
    </div>
      
      <!-- <p>SMK Muhammadiyah Mlati <span style="margin-left: 270px;">No.Pendaftaran : </span></p> -->
      <hr>
      <div style="overflow-x:auto;">
      <table class="table-me" border="0" cellpadding="3">
        <thead>
          <tr>
            <th style="width: 3%">No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th style="width: 15%">Lowongan</th>
            <th>Perusahaan</th>
            <th>Penempatan</th>
            <th>Gaji</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(!empty($alumni)) :
            $no = 1;
            foreach($alumni AS $a) :  
               

                switch($a['jenis_kelamin']){
                    case 'P':
                      $gender = 'Perempuan';
                    break;

                    case 'L':
                      $gender = 'Laki - Laki';
                    break;
                }

                switch($a['status']){
                    case '':
                      $status = 'Pending';
                    break;

                    case 'terima':
                      $status = 'Diterima';
                    break;

                    case 'tolak':
                      $status = 'Ditolak';
                    break;

                    case 'pending':
                      $status = 'Menunggu Verifikasi';
                    break;
                }      
          ?>
          <tr>
            <td><?=$no++?></td>
            <td><?php echo ucwords($a['nisn'])?></td>
            <td><?php echo ucwords($a['nama'])?></td>
            <td><?php echo !empty($a['nama_jurusan'])?ucwords($a['nama_jurusan']):"Belum Diisi"?></td>
            <td><?php echo $gender?></td>
            <td><?php echo !empty($a['posisi'])?ucwords($a['posisi']):"Belum Diisi"?></td>
            <td><?php echo !empty($a['perusahaan'])?$a['perusahaan']:"Belum Diisi"?></td>
            <td><?php echo !empty($a['penempatan'])?$a['penempatan']:"Belum Diisi"?></td>
            <td><?php echo !empty($a['gaji'])?$a['gaji']:"Belum Diisi"?></td>
            <td><?php echo $status?></td>
          </tr>
            <?php 
                endforeach;
            else :
            ?>
            <tr>
                <td colspan="10" style="text-align: center; margin-top: 50px; margin-bottom: 50px;">--- Belum Ada Data ---</td>
            </tr>
            <?php
            endif;
            ?>

        </tbody>   
      </table>
    </div>
    <div class="hormat">
      <?php
      $admin = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
      ?>
      <p style="margin-left: 0px;"><?=DateTime::createFromFormat('Y-m-d',  date("Y-m-d"))->format('d F Y')?></p>
      <p style="margin-top: 60px;"><?=ucwords($admin['nama'])?></p>
      <p>                       </p>
    </div>
   </div>
</body>
</html>