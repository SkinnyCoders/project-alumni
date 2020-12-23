<?php 
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Status extends CI_controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_alumni');
	}
	
	public function index()
	{
		$nisn = $this->session->userdata('nisn');
		$data['title'] = 'Status Alumni';
		$data['status'] = $this->m_alumni->getStatus($nisn);

		$this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => '{field} tidak boleh kosong!']);
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Status', 'required|trim', ['required' => '{field} tidak boleh kosong!']);

		if ($this->form_validation->run() == FALSE) {
			getViews($data , 'v_alumni/v_status_alumni');
		}else{

			if(!empty($_POST['jabatan'])){
				$jabatan = $_POST['jabatan'];
			}else{
				$jabatan = '';
			}

			if(!empty($_POST['mulai_kerja'])){
				$tgl_kerja = $_POST['mulai_kerja'];
				$tgl_kerja = DateTime::createFromFormat('m/d/Y', $tgl_kerja)->format('Y-m-d');
			}else{
				$tgl_kerja = '';
			}

			if(!empty($_POST['univ'])){
				$univ = $_POST['univ'];
			}else{
				$univ = '';
			}


			$data = [
				'nisn' => $nisn,
				'status' => $this->input->post('status', true),
				'jabatan' => $jabatan,
				'universitas' => $univ,
				'tanggal_bekerja' => $tgl_kerja,
				'deskripsi' => $this->input->post('deskripsi', true)
			];

			if(!empty($this->m_alumni->getStatus($nisn))){
				if ($this->m_alumni->updateStatus($data, $nisn)) {
					$this->session->set_flashdata('msg_success', 'Selamat, Data berhasil diperbarui');
                	redirect('alumni/status');
				}else{
					$this->session->set_flashdata('msg_failed', 'Maaf, Data gagal diperbarui');
                	redirect('alumni/status');
				}
			}else{
				if ($this->m_alumni->insertStatus($data)) {
					$this->session->set_flashdata('msg_success', 'Selamat, Data berhasil ditambahkan');
                	redirect('alumni/status');
				}else{
					$this->session->set_flashdata('msg_failed', 'Maaf, Data gagal ditambahkan');
                	redirect('alumni/status');
				}
			}
		}
	}
}