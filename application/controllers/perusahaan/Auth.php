<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email Atau Username', 'required|trim', ['required' => 'Maaf, Email belum diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Maaf, Password belum diisi!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_company/v_login');
        } else {
            //cek data for admin
            $user = $this->m_auth->cekUserCompany($this->input->post('email', TRUE));
            
            if (!empty($user)) {
                if (password_verify($this->input->post('password'), $user['password'])) {
                    $data = [
                        'id_perusahaan' => $user['id_company'],
                        'is_login' => 'punten',
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'perusahaan' => true,
                        'nama_role' => 'perusahaan',
                        'foto' => $user['foto'],
                        'role' => 5
                    ];

                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('msg_success', 'Selamat, Anda berhasil login');
                    redirect('perusahaan/dashboard');
                } else {
                    $this->session->set_flashdata('msg_failed', 'Ups!, Password anda salah!');
                    redirect('perusahaan');
                }
            } else {
                $this->session->set_flashdata('msg_failed', 'Ups!, Akun anda belum terdaftar!');
                redirect('perusahaan');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('nama_role');
        $this->session->unset_userdata('nisn');
        $this->session->set_flashdata('msg_success', 'Selamat, Anda berhasil logut');
        redirect('/');
    }

    public function logout_peserta()
    {

        //update login status
            $this->session->unset_userdata('is_login');
            $this->session->unset_userdata('nama');
            $this->session->set_flashdata('msg_success', 'Selamat, Anda berhasil logut');
            redirect('?p=login');
    }
}
