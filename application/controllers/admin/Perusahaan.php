<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Perusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        getAuthAdmin();
    }

    public function index()
    {
    	$data = [
            'title' => 'Daftar Perusahaan',
            'events' => $this->db->get('company')->result_array()
        ];

    	getViews($data, 'v_admin/v_perusahaan');
    }

    public function status(){

        if (isset($_POST['id_get_status']) && !empty($_POST['id_get_status'])) {

            $status = $this->db->query("SELECT * FROM company WHERE id_company =".$_POST['id_get_status'])->row_array();

            $data = [
                'id' => $status['id_company'],
                'status' => $status['status']
            ];

            echo json_encode($data);
        }

        if(isset($_POST['simpan_status'])){
            $id = $_POST['id_company'];
            $status = $_POST['status'];

            $data = [
                'status' => $status
            ];

            if ($this->db->update('company', $data, ['id_company' => $id])) {
                $this->session->set_flashdata('msg_success', 'Selamat, data berhasil diperbarui');
                redirect('admin/perusahaan');
            }else{
                $this->session->set_flashdata('msg_failed', 'Maaf, data gagal diperbarui');
                redirect('admin/perusahaan');
            }
        }
    }

    public function tambah(){
        $data = [
            'title' => 'Daftar Perusahaan'
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('bidang', 'Bidang Usaha', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim', ['required' => '{field} tidak boleh kosong']);
        $this->form_validation->set_rules('website', 'Website', 'required|trim', ['required' => '{field} tidak boleh kosong']);

        if($this->form_validation->run() == FALSE){
            getViews($data, 'v_admin/v_perusahaan_add');
        }else{
            if (!empty($_FILES['foto']['name'])) {
    			$file = $this->_uploadFile();
    		}else{
    			$file = 'default-image.png';
            }

            $data = [
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('des'),
                'lokasi' => $this->input->post('lokasi'),
                'alamat_lengkap' => $this->input->post('alamat'),
                'website' => $this->input->post('website'),
                'logo' => $file,
                'tanggal_berdiri' => DateTime::createFromFormat('m/d/Y', $this->input->post('tgl_berdiri'))->format('Y-m-d'),
                'bidang_usaha' => $this->input->post('bidang')
            ];
            
            if (insertData('company', $data)) {
    			$this->session->set_flashdata('msg_success', 'Selamat, data berhasil ditambahkan');
                redirect('admin/perusahaan');
    		}else{
    			$this->session->set_flashdata('msg_failed', 'Maaf, data gagal ditambahkan');
                redirect('admin/perusahaan');
    		}
        }

    }

    public function delete($id){
        $file = $this->db->get_where('company', ['id_company' => $id])->row_array();
    	$file = $file['logo'];
    	$delete = $this->db->delete('company', ['id_company' => $id]);
    	
    	if ($delete) {
    		if (!empty($file)) {
    			unlink('assets/img/uploads/'.$file);
    		}
    		$this->session->set_flashdata('msg_success', 'Selamat, data berhasil dihapus');
    		http_response_code(200);
    	}else{
    		$this->session->set_flashdata('msg_failed', 'Maaf, data gagal dihapus');
    		http_response_code(500);
    	}
    }

    public function detail($id){
        $data = [
            'title' => "Detail Perusahaan",
            'perusahaan' => $this->db->query("SELECT * FROM company WHERE id_company = $id")->row_array(),
            'member' => $this->db->query("SELECT * FROM company_member WHERE id_company = $id")->result_array()
        ];

        getViews($data, 'v_admin/v_perusahaan_detail');

    }

    private function _uploadFile()
    {
        $config['upload_path']          = './assets/img/uploads/';
        $config['allowed_types']        = 'jpg|png|pdf';
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
}