<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Dashboard extends CI_controller
{
    /**
     * Constructs a new instance.
     */
    function __construct()
    {
        parent::__construct();
        //login cek and authentication
        // getAuthAdmin();
        getAuthCompany();
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Perusahaan';
        $data['lowongan'] = $this->db->query("SELECT * FROM `lowongan` WHERE `id_company` =".$this->session->userdata('id_perusahaan'))->num_rows();
        $data['pelamar'] = $this->db->query("SELECT * FROM `job_apply` JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan WHERE lowongan.id_company =".$this->session->userdata('id_perusahaan'))->num_rows();
        $data['terima'] = $this->db->query("SELECT * FROM `job_apply` JOIN lowongan ON lowongan.id_lowongan=job_apply.id_lowongan WHERE job_apply.status = 'terima' AND lowongan.id_company =".$this->session->userdata('id_perusahaan'))->num_rows();
        getViews($data, 'v_company/dashboard');
    }

    public function get_chart_visitor(){
        $arr_bulan = [
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        ];


        $sekarang = date('m');
        $old = $sekarang - 4;
        $tahun = date('Y');
        $hari = date('d');

        for($i = $old; $i<=$sekarang; $i++){
          $bulan[] = $i;
        }

        for ($i=0; $i < count($bulan) ; $i++) { 
            $label[] = $arr_bulan[$bulan[$i]];
            $total = $this->db->query("SELECT * FROM `pengunjung` WHERE YEAR(`tanggal`) = $tahun AND MONTH(`tanggal`) = $bulan[$i]")->num_rows();
            $data_perbulan[] = $total;
        }

        $data = [
            'label' => $label,
            'result' => $data_perbulan
        ];

        echo json_encode($data);
    }

    public function get_chart_baru($id){
        //get status berkerja perjurusan
        $berkerja = $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = $id AND status_alumni.status ='bekerja'")->num_rows();
        $kuliah =  $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = $id AND status_alumni.status ='kuliah'")->num_rows();
        $nganggur =  $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = $id AND status_alumni.status ='tidak'")->num_rows();
        $kerja_kuliah =  $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = $id AND status_alumni.status ='bekerja kuliah'")->num_rows();


        $data = [$berkerja, $kuliah, $kerja_kuliah, $nganggur];

        $flag = false;
        for($i = 0; $i<count($data); $i++){
            if ($data[$i] > 0) {
                $flag = true;
            }
        }

        if ($flag) {
            $result = ['total' => $data];        
        }else{
            $result = ['total' => null];
        }

        echo json_encode($result);
    }

        //chart alumni berdasarkan status
    public function get_dataChart(){

        $total = $this->m_admin->chartStatus();
    
        $data = ['total' => $total];

        echo json_encode($data);
    
    }

    public function get_dataChart2(){
        $total = $this->m_admin->getGender();

        $data = ['jumlah' => $total];

        echo json_encode($data);
    }

    public function get_dataChart3(){

        $jurusan = $this->m_admin->chartJurusan();

        foreach ($jurusan as $jtotal) {
            $total = $jtotal['total'];
            $totalJurusan[] = $total;
        }

        foreach ($jurusan as $jlabel) {
            $label[] = $jlabel['nama_jurusan'];
        }

        $dataJurusan = ['jurusan' => $totalJurusan,
                        'nama_jurusan' => $label];
        echo json_encode($dataJurusan);
    }

    public function get_barChart(){
        $jurusan = $this->db->get('jurusan')->result_array();

        foreach ($jurusan as $j) {
            $label[] = $j['nama_jurusan'];

            //ambil status 
            $berkerja[] = $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = ".$j['id_jurusan']." AND status_alumni.status = 'bekerja'")->num_rows();
            $kuliah[] = $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = ".$j['id_jurusan']." AND status_alumni.status = 'kuliah'")->num_rows();
            $nganggur[] =  $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = ".$j['id_jurusan']." AND status_alumni.status = 'tidak'")->num_rows();
            $kerja_kuliah[] = $this->db->query("SELECT * FROM `status_alumni` JOIN alumni ON alumni.nisn=status_alumni.nisn WHERE alumni.id_jurusan = ".$j['id_jurusan']." AND status_alumni.status = 'bekerja kuliah'")->num_rows();
        }

        $result = [
            'label' => $label,
            'kerja' => $berkerja,
            'kuliah' => $kuliah,
            'kerja_kuliah' => $kerja_kuliah,
            'tidak' => $nganggur
        ];

        echo json_encode($result);
    }
}
