<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perusahaan');
        getAuthCompany();
    }

    public function index()
    {
        $id_perusahaan = $this->session->userdata('id_perusahaan');

		$data = [
            'title' => 'Profil Perusahaan Anda',
            'data' => $this->db->query("SELECT * FROM `company` WHERE `id_company` = ".$this->session->userdata('id_perusahaan'))->row_array()
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('bidang', 'Bidang Usaha', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('website', 'Website', 'required|trim', ['required' => '{field} tidak boleh kosong']);

		if ($this->form_validation->run() == FALSE) {
			getViews($data, 'v_company/v_profile');
		}else{
			if (!empty($_FILES['foto']['name'])) {
				$gambar = uploadImage('foto', './assets/img/user/','');
			}else{
				$gambar = $data['data']['logo'];
			}

			$data = [
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('des'),
                'lokasi' => $this->input->post('lokasi'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'website' => $this->input->post('website'),
                'logo' => $gambar,
                'tanggal_berdiri' => DateTime::createFromFormat('m/d/Y', $this->input->post('tgl_berdiri'))->format('Y-m-d'),
                'bidang_usaha' => $this->input->post('bidang')
			];

			$update = $this->db->update('company', $data, ['id_company' => $id_perusahaan]);

			if ($update) {
				$this->session->set_flashdata('msg_success', 'Selamat, Data berhasil diperbarui');
                redirect('perusahaan/profil');
			}else{
				$this->session->set_flashdata('msg_failed', 'Maaf, Data gagal diperbarui');
                redirect('perusahaan/profil');
			}
        }
    }
}