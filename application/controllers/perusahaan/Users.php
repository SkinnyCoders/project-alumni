<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Users extends CI_Controller
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
            'title' => 'Daftar Pengguna',
            'datas' => $this->db->query("SELECT * FROM `company_member` WHERE `id_company` = ".$this->session->userdata('id_perusahaan'))->result_array()
        ];

    	getViews($data, 'v_company/v_member');
    }

    public function add()
    {
        
    	$this->form_validation->set_rules('nama','Nama','required|trim',['required' => '{field} tidak boleh kosong']);
        // $this->form_validation->set_rules('perusahaan','Perusahaan','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_cekEmail|valid_email', ['required' => '{field} tidak boleh kosong', 'cekEmail' => '{field} sudah digunakan']);
        $this->form_validation->set_rules('password', 'Password' , 'required|callback_cekPassword', ['required' => '{field} tidak boleh kosong', 'cekPassword' => '{field} terlalu pendek']);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]', ['required' => '{field} tidak boleh kosong', 'matches' => '{field} tidak sama']);
        $this->form_validation->set_rules('telp','No telepon','required|trim',['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('level','Level Pengguna','required|trim',['required' => '{field} tidak boleh kosong']);
    	$this->form_validation->set_rules('alamat','Alamat Pengguna','required|trim',['required' => '{field} tidak boleh kosong']);

    	if ($this->form_validation->run() == FALSE) {
    		$this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                redirect('perusahaan/users');
    	}else{

            //get perusahaan
            $perusahaan = $this->m_perusahaan->getCompany($this->session->userdata('id_perusahaan'));
            $id_perusahaan = $this->session->userdata('id_perusahaan');

    		$data = [
                'id_company' => $id_perusahaan,
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
                'alamat' => $this->input->post('alamat', true),
                'no_telp' => $this->input->post('telp', true),
                'level' => $this->input->post('level', true),
                'status' => "active"
    		];

    		if (insertData('company_member', $data)) {
    			$this->session->set_flashdata('msg_success', 'Selamat, data berhasil ditambahkan');
                redirect('perusahaan/users');   
    		}else{
    			$this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                redirect('perusahaan/users');
    		}
    	}
    }

    public function update(){
        if (isset($_POST['id_get_update']) && !empty($_POST['id_get_update'])) {
            $dataLowongan = $this->db->get_where('company_member', ['id_member' => $_POST['id_get_update']])->row_array();

            $data = [
                'id' => $dataLowongan['id_member'],
                'id_company' => $dataLowongan['id_company'],
                'nama' => $dataLowongan['nama'],
                'email' => $dataLowongan['email'],
                'telp' => $dataLowongan['no_telp'],
                'alamat' => $dataLowongan['alamat'],
                'level' => $dataLowongan['level'],
                'status' => $dataLowongan['status']
            ];

            echo json_encode($data);
        }

        if (isset($_POST['simpan'])) {
            $id_member = $_POST['id'];

            $this->form_validation->set_rules('nama','Nama','required|trim',['required' => '{field} tidak boleh kosong']);
            // $this->form_validation->set_rules('perusahaan','Perusahaan','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => '{field} tidak boleh kosong']);
            if(!empty($this->input->post('password') && $this->input->post('password2'))){
                $this->form_validation->set_rules('password', 'Password' , 'required|callback_cekPassword', ['required' => '{field} tidak boleh kosong', 'cekPassword' => '{field} terlalu pendek']);
                $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]', ['required' => '{field} tidak boleh kosong', 'matches' => '{field} tidak sama']);
            }
            $this->form_validation->set_rules('telp','No telepon','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('level','Level Pengguna','required|trim',['required' => '{field} tidak boleh kosong']);
            $this->form_validation->set_rules('alamat','Alamat Pengguna','required|trim',['required' => '{field} tidak boleh kosong']);

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                redirect('perusahaan/users');
            }else{

                if(!empty($this->input->post('password') && $this->input->post('password2'))){
                    $data = [
                        'nama' => $this->input->post('nama', true),
                        'email' => $this->input->post('email', true),
                        'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
                        'alamat' => $this->input->post('alamat', true),
                        'no_telp' => $this->input->post('telp', true),
                        'level' => $this->input->post('level', true),
                        'status' => $this->input->post('status', true),
                    ];
                }else{
                    $data = [
                        'nama' => $this->input->post('nama', true),
                        'email' => $this->input->post('email', true),
                        'alamat' => $this->input->post('alamat', true),
                        'no_telp' => $this->input->post('telp', true),
                        'level' => $this->input->post('level', true),
                        'status' => $this->input->post('level', true),
                    ];
                }

                if ($this->db->update('company_member', $data, ['id_member' => $id_member])) {
                    $this->session->set_flashdata('msg_success', 'Selamat, data berhasil diperbarui');
                    redirect('perusahaan/users');
                }else{
                    $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                    redirect('perusahaan/users');
                }
            }

        }
    }

    public function delete($id){
    	$delete = $this->db->delete('company_member', ['id_member' => $id]);
    	
    	if ($delete) {
    		$this->session->set_flashdata('msg_success', 'Selamat, data berhasil dihapus');
    		http_response_code(200);
    	}else{
    		$this->session->set_flashdata('msg_failed', 'Maaf, data gagal dihapus');
    		http_response_code(500);
    	}
    }

    public function cekPassword($str){
		$cek = strlen($str);
		if ($cek <= 6) {
			return false;
		}else{
			return true;
		}
    }

    public function cekEmail($str){
		$cekmail = $this->db->get_where('company_member', ['email' => $str])->row_array();
		if ($this->db->get_where('company_member', ['email' => $str])->num_rows() > 0) {
			if ($cekmail['email'] == $this->input->post('email')) {
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
}