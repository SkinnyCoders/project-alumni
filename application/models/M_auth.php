<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_auth extends CI_Model
{
    public function cekUserAlmuni($email){
        $this->db->select('*');
        $this->db->from('alumni');
        $this->db->where('email', $email);
        $this->db->or_where('nisn', $email);
        return $this->db->get()->row_array();
    }

    public function cekUserAdmin($email){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('email', $email);
        $this->db->or_where('username', $email);
        return $this->db->get()->row_array();
    }

    public function cekUserCompany($email){
        return $this->db->query("SELECT * FROM `company` JOIN company_member AS m ON m.id_company=company.id_company WHERE company.status = 'active' AND m.status = 'active' AND m.email = '$email'")->row_array();
    }

    public function updateStatus($id, $status){
    	//update login status
        $this->db->set('login_status', $status);
        $this->db->where('id_pengguna',$id);
        return $this->db->update('pengguna');
    }
}