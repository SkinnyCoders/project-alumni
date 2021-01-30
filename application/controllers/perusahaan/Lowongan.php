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
        getAuthCompany();
    }

    public function index()
    {
    	$data = [
            'title' => 'Daftar Lowongan Anda',
            'lowongans' => $this->db->query("SELECT * FROM `lowongan` WHERE `id_company` = ".$this->session->userdata('id_perusahaan'))->result_array()
        ];

    	getViews($data, 'v_company/v_lowongan');
    }

    public function tambah()
    {
        
    	$data['title'] = 'Tambah Lowongan Pekerjaan';
    	$this->form_validation->set_rules('posisi','Posisi','required|trim',['required' => '{field} tidak boleh kosong']);
        // $this->form_validation->set_rules('perusahaan','Perusahaan','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('penempatan','Penempatan','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('gaji','Gaji','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('pengalaman','Pengalaman','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('tgl_berakhir','Tanggal Berakhir','required|trim',['required' => '{field} tidak boleh kosong']);
    	$this->form_validation->set_rules('des','Deskripsi','required|trim',['required' => '{field} tidak boleh kosong']);

    	if ($this->form_validation->run() == FALSE) {
    		getViews($data, 'v_company/v_lowongan_add');
    	}else{

    		if (!empty($_FILES['foto']['name'])) {
    			$file = $this->_uploadFile();
    		}else{
    			$file = 'default-job.jpg';
            }

            //get perusahaan
            $perusahaan = $this->m_perusahaan->getCompany($this->session->userdata('id_perusahaan'));
            $id_perusahaan = $this->session->userdata('id_perusahaan');

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
                'slug' => str_replace(",", "-", $slug)
    		];

    		if (insertData('lowongan', $data)) {
    			$this->session->set_flashdata('msg_success', 'Selamat, data berhasil ditambahkan');
                redirect('perusahaan/lowongan');
    		}else{
    			$this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                redirect('perusahaan/lowongan');
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
                'gaji' => $dataLowongan['gaji'],
                'kemampuan' => $dataLowongan['kemampuan'],
                'pengalaman' => $dataLowongan['pengalaman'],
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
            $this->form_validation->set_rules('penempatan','Penempatan','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('gaji','Gaji','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('pengalaman','Pengalaman','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('tgl_berakhir','Tanggal Berakhir','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('des','Deskripsi','required|trim',['required' => '{field} tidak boleh kosong']);

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                redirect('perusahaan/lowongan');
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

                $this->load->model('m_perusahaan');
                $perusahaan = $this->m_perusahaan->getCompany($this->session->userdata('id_perusahaan'));

                //make slug
                $slug = str_replace(' ', '-', $this->input->post('posisi'));
                $slug .= '-';
                $slug .= str_replace(' ', '-', $perusahaan['nama']);

                //ubah format tanggal
                $tanggal = DateTime::createFromFormat('m/d/Y', $this->input->post('tgl_berakhir', true))->format('Y-m-d');

                $data = [
                    'posisi_pekerjaan' => $this->input->post('posisi', true),
                    'id_company' =>$this->session->userdata('id_perusahaan'),
                    'gaji' => $this->input->post('gaji', true),
                    'pengalaman' => $this->input->post('pengalaman', true),
                    'kemampuan' => $this->input->post('kemampuan', true),
                    'penempatan' => $this->input->post('penempatan', true),
                    'deskripsi' => $this->input->post('des', true),
                    'thumbnail' => $file,
                    'berakhir' => $tanggal,
                    'author' => $this->session->userdata('nama'),
                    'slug' => str_replace(",", "-", $slug)
                ];

                if ($this->db->update('lowongan', $data, ['id_lowongan' => $id_lowongan])) {
                    $this->session->set_flashdata('msg_success', 'Selamat, data berhasil diperbarui');
                    redirect('perusahaan/lowongan');
                }else{
                    $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                    redirect('perusahaan/lowongan');
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

    public function pelamar($id){

        if($this->db->query("SELECT id_lowongan FROM lowongan WHERE id_lowongan = ". $id)->num_rows() < 1){
            $this->session->set_flashdata('msg_failed', 'Tidak dapat membuka halaman');
            redirect('perusahaan/lowongan');
        }else{
            $data = [
                'title' => 'Daftar Pelamar',
                'datas' => $this->db->query("SELECT job_apply.*, job_apply.status AS status_pelamar, alumni.*, jurusan.nama_jurusan FROM `job_apply` JOIN alumni ON alumni.nisn=job_apply.nisn LEFT JOIN jurusan ON jurusan.id_jurusan=alumni.id_jurusan WHERE job_apply.id_lowongan =".$id)->result_array()
            ];
    
            getViews($data, 'v_company/v_pelamar');
        }
    }

    public function detail($id_job_apply){
        $data = [
            'title' => "Detail Pelamar",
            'alumni' => $this->db->query("SELECT alumni.*, jurusan.*, job_apply.* FROM `alumni` JOIN job_apply ON job_apply.nisn=alumni.nisn LEFT JOIN jurusan ON jurusan.id_jurusan=alumni.id_jurusan WHERE job_apply.id_job_apply =".$id_job_apply)->row_array()
        ];
        
        $nisn = $data['alumni']['nisn'];

        $data['hasil_tes'] = $this->db->query("SELECT * FROM `job_apply` JOIN konfigurasi_tes_seleksi as konfig ON konfig.id_lowongan=job_apply.id_lowongan JOIN hasil_tes_seleksi ON hasil_tes_seleksi.id_tes_seleksi=konfig.id_tes_seleksi JOIN tes_seleksi ON tes_seleksi.id_tes_seleksi=hasil_tes_seleksi.id_tes_seleksi WHERE hasil_tes_seleksi.nisn = $nisn AND job_apply.id_job_apply=".$id_job_apply)->result_array();

        getViews($data, 'v_company/v_detail_pelamar');
    }

    public function berkas(){
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $id = $_GET['id'];
            $data = [
                'status_berkas' => $_GET['status']
            ];

            if ($this->db->update('job_apply', $data, ['id_job_apply' => $id])) {
                $this->session->set_flashdata('msg_success', 'Selamat, berkas berhasil diverifikasi');
                redirect('perusahaan/lowongan/detail/'.$id);
            }else{
                $this->session->set_flashdata('msg_failed', 'Maaf, berkas gagal diverifikasi');
                redirect('perusahaan/lowongan/detail/'.$id);
            }
        }
    }

    public function penerimaan(){
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $id = $_GET['id'];
            $data = [
                'status' => $_GET['status']
            ];

            if ($this->db->update('job_apply', $data, ['id_job_apply' => $id])) {
                $this->session->set_flashdata('msg_success', 'Selamat, data peserta berhasil diperbarui');
                http_response_code(200);
            }else{
                $this->session->set_flashdata('msg_failed', 'Maaf, data peserta gagal diperbarui');
                http_response_code(400);
            }
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