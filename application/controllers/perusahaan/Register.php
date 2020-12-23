<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Register extends CI_controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_cekEmail', ['required' => '{field} tidak boleh kosong', 'valid_email' => 'Email tidak valid', 'cekEmail' => 'Email sudah didaftarakan']);
		$this->form_validation->set_rules('password', 'Password' , 'required|callback_cekPassword', ['required' => '{field} tidak boleh kosong', 'cekPassword' => '{field} terlalu pendek']);
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('bidang', 'Bidang Usaha', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('tgl_berdiri', 'Tanggal Berdiri', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('v_company/v_register');
        }else{
            $data = [
                'nama' => $this->input->post('nama_perusahaan', true),
                'lokasi' => $this->input->post('lokasi', true),
                'alamat_lengkap' => $this->input->post('alamat', true),
                'tanggal_berdiri' => DateTime::createFromFormat('m/d/Y', $this->input->post('tgl_berdiri'))->format('Y-m-d'),
                'bidang_usaha' => $this->input->post('bidang', true),
                'status' => 'pending'
            ];

            $insertCompany = $this->db->insert('company', $data);
            if($insertCompany){
                $id_company = $this->db->insert_id();

                $data_pengguna = [
                    'id_company' => $id_company,
                    'nama' => $this->input->post('nama', true),
                    'email' => $this->input->post('email', true),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'level' => 'admin',
                    'status' => 'active'
                ];

                $insert = $this->db->insert('company_member', $data_pengguna);
                if ($insert) {
                    $this->session->set_flashdata('msg_success', 'Selamat, Pendaftaran berhasil');
                    redirect('perusahaan');
                }else{
                    $this->session->set_flashdata('msg_failed', 'Maaf, Pendaftaran Gagal');
                    redirect('perusahaan/register');
                }
            }else{
                $this->session->set_flashdata('msg_failed', 'Maaf, Pendaftaran Gagal');
                redirect('perusahaan/register');
            }
        }

    }

    public function cekEmail($str){
		$cek = $this->db->get_where('company_member', ['email' => $str])->num_rows();

		if ($cek > 0) {
			return false;
		}else{
			return true;
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