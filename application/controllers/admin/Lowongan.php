<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Lowongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perusahaan');
        getAuthAdmin();
    }

    public function index()
    {
    	$data = [
            'title' => 'Daftar Lowongan Pekerjaan',
            'lowongans' => $this->db->query("SELECT * FROM `lowongan` JOIN company ON company.id_company=lowongan.id_company WHERE lowongan.status = 'verifikasi' ORDER BY lowongan.create_at DESC")->result_array()
        ];

    	getViews($data, 'v_admin/v_lowongan');
    }

    public function tambah()
    {
    	$data['title'] = 'Tambah Lowongan Pekerjaan';
    	$this->form_validation->set_rules('posisi','Posisi','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('perusahaan','Perusahaan','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('penempatan','Penempatan','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('gaji','Gaji','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('pengalaman','Pengalaman','required|trim',['required' => '{field} tidak boleh kosong']);
    	$this->form_validation->set_rules('des','Deskripsi','required|trim',['required' => '{field} tidak boleh kosong']);

    	if ($this->form_validation->run() == FALSE) {
    		getViews($data, 'v_admin/v_lowongan_add');
    	}else{

    		if (!empty($_FILES['foto']['name'])) {
    			$file = $this->_uploadFile();
    		}else{
    			$file = 'default-job.jpg';
            }

            //get perusahaan
            $perusahaan = $this->m_perusahaan->getCompany($this->input->post('perusahaan'));
            $id_perusahaan = $this->input->post('perusahaan');

            //make slug
            $slug = str_replace(' ', '-', $this->input->post('posisi'));
            $slug .= '-';
            $slug .= str_replace(' ', '-', $perusahaan['nama']);

            //ubah format tanggal
            $tanggal = DateTime::createFromFormat('m/d/Y', $this->input->post('tgl_berakhir', true))->format('Y-m-d');

    		$data = [
    			'posisi_pekerjaan' => $this->input->post('posisi', true),
                'id_company' => $id_perusahaan,
                'gaji' => $this->input->post('gaji', true),
                'pengalaman' => $this->input->post('pengalaman', true),
                'kemampuan' => $this->input->post('kemampuan', true),
                'penempatan' => $this->input->post('penempatan', true),
                'deskripsi' => $this->input->post('des', true),
                'thumbnail' => $file,
    			'berakhir' => $tanggal,
                'author' => $this->session->userdata('nama'),
                'slug' => $slug,
                'status' => 'verifikasi'
            ];

    		if (insertData('lowongan', $data)) {
    			$this->session->set_flashdata('msg_success', 'Selamat, data berhasil ditambahkan');
                redirect('admin/lowongan');
    		}else{
    			$this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                redirect('admin/lowongan');
    		}
    	}
    }

    public function update(){
        if (isset($_POST['id_get_update']) && !empty($_POST['id_get_update'])) {
            $dataLowongan = $this->db->get_where('lowongan', ['id_lowongan' => $_POST['id_get_update']])->row_array();

            $gambar = 'assets/uploads/file_berita/'.$dataLowongan['thumbnail'];
            $berakhir = DateTime::createFromFormat('Y-m-d', $dataLowongan['berakhir'])->format('m/d/Y');

            $data = [
                'id' => $dataLowongan['id_lowongan'],
                'posisi' => $dataLowongan['posisi_pekerjaan'],
                'perusahaan' => 'test',
                'deskripsi' => $dataLowongan['deskripsi'],
                'thumbnail' => base_url($gambar),
                'penempatan' => $dataLowongan['penempatan'],
                'berakhir' => $berakhir
            ];

            echo json_encode($data);
        }

        if (isset($_POST['simpan'])) {
            $id_lowongan = $_POST['id'];

            $this->form_validation->set_rules('posisi','Posisi','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('perusahaan','Perusahaan','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('penempatan','Penempatan','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('des','Deskripsi','required|trim',['required' => '{field} tidak boleh kosong']);

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                redirect('admin/lowongan');
            }else{
                $file_old = $this->db->get_where('lowongan', ['id_lowongan' => $id_lowongan])->row_array();
                $img_old = $file_old['thumbnail'];

                if (!empty($_FILES['foto']['name'])) {
                    $file = $this->_uploadFile();
                    if ($file !== false) {
                        unlink('assets/uploads/file_berita/'.$img_old);
                    }
                }else{
                    $file = $img_old;
                }

                //make slug
                $slug = str_replace(' ', '-', $this->input->post('posisi'));
                $slug .= '-';
                $slug .= str_replace(' ', '-', $this->input->post('perusahaan'));

                //ubah format tanggal
                $tanggal = DateTime::createFromFormat('m/d/Y', $this->input->post('tgl_berakhir', true))->format('Y-m-d');

                $data = [
                    'posisi_pekerjaan' => $this->input->post('posisi', true),
                    'perusahaan' => $this->input->post('perusahaan', true),
                    'penempatan' => $this->input->post('penempatan', true),
                    'deskripsi' => $this->input->post('des', true),
                    'thumbnail' => $file,
                    'berakhir' => $tanggal,
                    'author' => $this->session->userdata('username'),
                    'slug' => $slug
                ];

                if ($this->db->update('lowongan', $data, ['id_lowongan' => $id_lowongan])) {
                    $this->session->set_flashdata('msg_success', 'Selamat, data berhasil diperbarui');
                    redirect('admin/lowongan');
                }else{
                    $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                    redirect('admin/lowongan');
                }
            }

        }
    }

    public function delete($id){
    	$file = $this->db->get_where('lowongan', ['id_lowongan' => $id])->row_array();
    	$file = $file['thumbnail'];
    	$delete = $this->db->delete('lowongan', ['id_lowongan' => $id]);
    	
    	if ($delete) {
    		if (!empty($file)) {
    			unlink('assets/uploads/file_berita/'.$file);
    		}
    		$this->session->set_flashdata('msg_success', 'Selamat, data berhasil dihapus');
    		http_response_code(200);
    	}else{
    		$this->session->set_flashdata('msg_failed', 'Maaf, data gagal dihapus');
    		http_response_code(500);
    	}
    }

    private function _uploadFile()
    {
        $config['upload_path']          = './assets/uploads/file_berita/';
        $config['allowed_types']        = 'jpg|png|pdf|doc|docx';
        $config['encrypt_name']         = TRUE;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; //2mb

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            return $this->upload->display_errors();
        } else {
            return $this->upload->data('file_name');
        }
    }

    public function rekap(){
        $data['title'] = "Laporan"; 
        $data['lowongans'] = $this->db->get_where('lowongan', ['MONTH(create_at)' => date('m')])->result_array();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "rekap_Lowongan.pdf";
        $this->pdf->load_view('v_admin/v_laporan_lowongan', $data);
    }

    public function verifikasi(){
        $data = [
            'title' => 'Daftar Lowongan Pekerjaan',
            'lowongans' => $this->db->query("SELECT * FROM `lowongan` JOIN company ON company.id_company=lowongan.id_company WHERE lowongan.status != 'verifikasi' ORDER BY lowongan.create_at DESC")->result_array()
        ];

    	getViews($data, 'v_admin/v_verif_lowongan');
    }

    public function verif($id){
        $status = $_POST['status'];

    	$verif = $this->db->query("UPDATE `lowongan` SET `status`= '$status' WHERE `id_lowongan` = ".$id);
    	
    	if ($verif) {
    		$this->session->set_flashdata('msg_success', 'Selamat, data berhasil diverifikasi');
    		http_response_code(200);
    	}else{
    		$this->session->set_flashdata('msg_failed', 'Maaf, data gagal diverifikasi');
    		http_response_code(500);
    	}
    }

    public function get_perusahaan(){
        $perusahaan = $this->db->query('SELECT * FROM company')->result_array();

        echo json_encode($perusahaan);
    }

    public function rekap1(){
        $lowongan = $this->input->post('lowongan');
        $status = $this->input->post('status');


        //get loowngan
        if(!empty($lowongan)){
            $lowongan_q = $this->db->query("SELECT * FROM lowongan WHERE id_lowongan =".$lowongan)->row_array();
            $lowongan_name = $lowongan_q['posisi_pekerjaan'];
        }

        if(!empty($lowongan) && !empty($status)){
            //all 
            $data = [
                'header' => "Lowongan $lowongan_name dan status $status",
                'alumni' => $this->db->query("SELECT alumni.nisn, alumni.nama,jurusan.nama_jurusan, alumni.jenis_kelamin, lowongan.posisi_pekerjaan, company.nama AS perusahaan, lowongan.penempatan, lowongan.gaji, job_apply.status FROM `job_apply` JOIN alumni ON alumni.nisn=job_apply.nisn JOIN jurusan ON jurusan.id_jurusan=alumni.id_jurusan JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan JOIN company ON company.id_company=lowongan.id_company WHERE lowongan.id_lowongan = $lowongan AND job_apply.status = '$status' ORDER BY job_apply.apply_at DESC")->result_array()
            ];
        }elseif(!empty($lowongan) ){
            //lowongan
            $data = [
                'header' => 'Lowongan '.$lowongan_name,
                'alumni' => $this->db->query("SELECT alumni.nisn, alumni.nama,jurusan.nama_jurusan, alumni.jenis_kelamin, lowongan.posisi_pekerjaan, company.nama AS perusahaan, lowongan.penempatan, lowongan.gaji, job_apply.status FROM `job_apply` JOIN alumni ON alumni.nisn=job_apply.nisn JOIN jurusan ON jurusan.id_jurusan=alumni.id_jurusan JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan JOIN company ON company.id_company=lowongan.id_company WHERE lowongan.id_lowongan = $lowongan ORDER BY job_apply.apply_at DESC")->result_array()
            ];
        }elseif(!empty($status)){
            //jurusan & thn lulus
            $data = [
                'header' => 'Semua Lowongan dan status '.$status,
                'alumni' => $this->db->query("SELECT alumni.nisn, alumni.nama,jurusan.nama_jurusan, alumni.jenis_kelamin, lowongan.posisi_pekerjaan, company.nama AS perusahaan, lowongan.penempatan, lowongan.gaji, job_apply.status FROM `job_apply` JOIN alumni ON alumni.nisn=job_apply.nisn JOIN jurusan ON jurusan.id_jurusan=alumni.id_jurusan JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan JOIN company ON company.id_company=lowongan.id_company WHERE job_apply.status = '$status' ORDER BY job_apply.apply_at DESC")->result_array()
            ];
        }else{
            //kosong semua
            $data = [
                'header' => 'Semua Lowongan Pekerjaan',
                'alumni' => $this->db->query('SELECT alumni.nisn, alumni.nama,jurusan.nama_jurusan, alumni.jenis_kelamin, lowongan.posisi_pekerjaan, company.nama AS perusahaan, lowongan.penempatan, lowongan.gaji, job_apply.status FROM `job_apply` JOIN alumni ON alumni.nisn=job_apply.nisn JOIN jurusan ON jurusan.id_jurusan=alumni.id_jurusan JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan JOIN company ON company.id_company=lowongan.id_company ORDER BY job_apply.apply_at DESC')->result_array()
            ];
        }

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "rekap_data_pelamar.pdf";
        $this->pdf->load_view('v_admin/v_laporan_pelamar', $data);
    }

    public function provinsi(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: e6d06e1e8ef5fa5fa2e60bf9bd11a2ca"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
}