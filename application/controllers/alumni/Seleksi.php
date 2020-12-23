<?php 
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Seleksi extends CI_controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('m_seleksi');
	}
	
	public function mulai($id_seleksi)
	{
        
    }
}