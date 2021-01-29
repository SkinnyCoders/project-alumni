<?php 
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Lowongan extends CI_controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_alumni');
		$this->load->model('m_seleksi');
	}
	
	public function index()
	{
		$data['title'] = 'Lowongan Kerja';
		$data['lowongans'] = $this->m_alumni->getLowongan(date('m'));
		getViews($data, 'v_alumni/v_lowongan');
	}

	public function detail(){
		$slug = $this->uri->segment(4);
		$data['title'] = 'Lowongan Kerja';
		$data['lowongan'] = $this->m_alumni->getLowonganDetail($slug);
		$data['cek_detail'] = $this->db->query("SELECT * FROM `job_apply` JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan WHERE lowongan.slug = '$slug' AND job_apply.nisn = ".$this->session->userdata('nisn'))->num_rows();

		if(!empty($data['lowongan'])){
			getViews($data, 'v_alumni/v_lowongan_detail');
		}else{
			$this->session->set_flashdata('msg_failed', 'Maaf, Detail Lowongan tidak ditemukan');
            redirect('alumni/lowongan');
		}
	}

	public function apply(){
		$this->form_validation->set_rules('lamaran','Surat Lamaran','required|trim',['required' => '{field} tidak boleh kosong']);
		$this->form_validation->set_rules('contact','Contact','required|trim|numeric',['required' => '{field} tidak boleh kosong']);
		$this->form_validation->set_rules('posisi','Posisi','required',['required' => '{field} tidak boleh kosong']);
		// $this->form_validation->set_rules('resume','Resume','required',['required' => '{field} tidak boleh kosong']);
		
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg_failed', 'Maaf, Harap lengkapi form apply job');
            redirect($_SERVER['HTTP_REFERER']);
		}else{
			if (!empty($_FILES['resume']['name'])) {
				$file = $this->_uploadFile();
    		}else{
    			$this->session->set_flashdata('msg_failed', 'Maaf, Harap lengkapi resume apply job');
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}

			if($file){
				$data = [
					"id_lowongan" => $this->input->post('id_lowongan', true),
					"nisn" => $this->session->userdata('nisn'),
					"resume" => $file,
					"contact" => $this->input->post('contact'),
					"cover_letter" => $this->input->post('lamaran'),
					"posisi" => $this->input->post('posisi'),
					"status" => "pending"
				];
	
				if (insertData('job_apply', $data)) {
					$this->session->set_flashdata('msg_success', 'Selamat, kamu berhasil melamar');
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('msg_failed', 'Maaf, kamu belum berhasil melamar');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}else{
				$this->session->set_flashdata('msg_failed', 'Maaf, berkas resume tidak dapat diupload');
				redirect($_SERVER['HTTP_REFERER']);
				return false;
			}
			
		}
	}

	public function list(){
		$data['title'] = 'Daftar Lamaran Kerja Saya';
		$data['lowongans'] = $this->db->query("SELECT lowongan.posisi_pekerjaan, lowongan.gaji, lowongan.deskripsi, lowongan.penempatan, lowongan.berakhir, company.nama, lowongan.thumbnail, lowongan.id_lowongan FROM `job_apply` JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan JOIN company ON company.id_company=lowongan.id_company WHERE job_apply.nisn =".$this->session->userdata('nisn'))->result_array();
		getViews($data, 'v_alumni/v_daftar_lamaran');
	}

	public function status($id){
		$nisn = $this->session->userdata('nisn');
		$data['title'] = 'Status Lamaran Kerja Saya';
		$data['berkas'] = $this->db->query("SELECT resume FROM job_apply WHERE id_lowongan = ".$id)->row_array();
		$data['id_tes'] = $this->db->query("SELECT id_tes_seleksi AS id_tes FROM konfigurasi_tes_seleksi WHERE id_lowongan=".$id)->row_array();
		$data['status_berkas'] = $this->db->query("SELECT `status_berkas` AS status, `apply_at` FROM `job_apply` WHERE `id_lowongan` = ".$id)->row_array();
		$data['status_akhir'] = $this->db->query("SELECT `status` AS status FROM `job_apply` WHERE `id_lowongan` = ".$id)->row_array();
		$data['cek_tes'] = $this->db->query("SELECT * FROM `hasil_tes_seleksi` JOIN tes_seleksi as tes ON tes.id_tes_seleksi=hasil_tes_seleksi.id_tes_seleksi JOIN konfigurasi_tes_seleksi AS conf ON conf.id_tes_seleksi=tes.id_tes_seleksi WHERE hasil_tes_seleksi.nisn = $nisn AND conf.id_lowongan = ".$id)->num_rows();
		$data['status_tes'] = $this->db->query("SELECT `status` FROM `hasil_tes_seleksi` JOIN tes_seleksi ON tes_seleksi.id_tes_seleksi=hasil_tes_seleksi.id_tes_seleksi JOIN konfigurasi_tes_seleksi as conf ON conf.id_tes_seleksi = tes_seleksi.id_tes_seleksi WHERE conf.id_lowongan =".$id)->row_array();
		// $data['lowongans'] = $this->db->query("SELECT lowongan.posisi_pekerjaan, lowongan.gaji, lowongan.deskripsi, lowongan.penempatan, lowongan.berakhir, company.nama, lowongan.thumbnail, lowongan.id_lowongan FROM `job_apply` JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan JOIN company ON company.id_company=lowongan.id_company WHERE job_apply.nisn =".$this->session->userdata('nisn'))->result_array();
		getViews($data, 'v_alumni/v_status_lamaran');
	}

	private function _uploadFile()
    {
        $config['upload_path']          = './assets/file_lamaran/';
        $config['allowed_types']        = 'pdf';
        $config['encrypt_name']         = TRUE;
        $config['overwrite']            = true;
        $config['max_size']             = 5012; //5mb

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('resume')) {
            return false;
        } else {
            return $this->upload->data('file_name');
        }
	}
	
	public function seleksi($id_seleksi){
		$data['soal'] = $this->m_seleksi->getAllSoal($id_seleksi);
        $data_tes = $this->db->get_where('tes_seleksi', ['id_tes_seleksi' => $id_seleksi])->row_array();
		$data['title'] = $data_tes['nama_tes_seleksi'];
		$data['id_lowongan'] = $this->db->query("SELECT id_lowongan FROM konfigurasi_tes_seleksi WHERE id_tes_seleksi=".$id_seleksi)->row_array();

        getViews($data, 'v_alumni/v_tes_seleksi');

        if (isset($_POST['selesai'])) {
			$id_lowongan = $data['id_lowongan'];
            $total_soal = count($this->input->post('id_soal'));
            $point_awal = 0;
            $point_benar = 1;

            for ($i=0; $i < $total_soal ; $i++) { 
                $jawaban = $this->input->post('jawaban'.$i);
                $jawaban_benar = $this->input->post('jawaban_benar');

                if ($jawaban == $jawaban_benar[$i]) {
                    $benar[] = $point_awal + $point_benar;
                }else{
                    $benar[] = $point_awal;
                }
                
            }
            $total_benar = array_sum($benar);
            $nilai_akhir = $total_benar/$total_soal*100;

            $bobot = $data_tes['bobot_tes'];

            if ($nilai_akhir >= $bobot) {
                $status = 'lulus';
            }else{
                $status = 'tidak';
            }

            //insert ke hasil tes
            $data_hasil = [
                'nisn' => $this->session->userdata('nisn'),
                'id_tes_seleksi' => $id_seleksi,
                'nilai_benar' => $total_benar,
                'nilai_akhir' => $nilai_akhir,
                'status' => $status
			];

            $insertHasil = $this->db->insert('hasil_tes_seleksi', $data_hasil);
            if ($insertHasil) {
				//update selesai di table token
				$this->session->set_flashdata('msg_success', 'Selamat, Anda baru saja mengikuti tahapan tes seleksi');
                    redirect('alumni/lowongan/status/'.$id_lowongan['id_lowongan']);
            }else{
				$this->session->set_flashdata('msg_success', 'Selamat, Anda baru saja mengikuti tahapan tes seleksi');
					redirect('alumni/lowongan/status/'.$id_lowongan['id_lowongan']);
			}
        }
	}
}