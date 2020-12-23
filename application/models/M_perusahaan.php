<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_perusahaan extends CI_Model
{
    public function getCompany($id){
        return $this->db->query("SELECT * FROM `company` WHERE company.id_company = ".$id)->row_array();
    }
}