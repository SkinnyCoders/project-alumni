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
        getAuthAdmin();
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['total'] = $this->m_admin->getTotal();
        $data['jurusan'] = $this->db->get('jurusan')->result_array();
        getViews($data, 'v_admin/dashboard');
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
        if($sekarang - 4 < 0){
            $old = $sekarang - 4 + 12;
            if($old == 9){
                $bulan = [9,10,11,12,1];
            }elseif($old == 10){
                $bulan = [10,11,12,1,2];
            }elseif($old == 11){
                $bulan = [11,12,1,2,3];
            }elseif($old == 12){
                $bulan = [12,1,2,3,4];
            }
        }elseif($sekarang - 4 == 0){
            $old = 1;
            for($i = $old; $i<=$sekarang; $i++){
                $bulan[] = $i;
              }
        }else{
            $old = $sekarang - 4;
            for($i = $old; $i<=$sekarang; $i++){
                $bulan[] = $i;
            }
        }
        
        $tahun = date('Y');
        $hari = date('d');

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
