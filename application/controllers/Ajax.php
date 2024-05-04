<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Ajax extends CI_Controller {

	public function __construct(){

		parent::__construct();


		/*-- untuk mengatasi error confirm form resubmission  --*/
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		$this->load->model('ajax_model');
		$this->load->model('admin_model');
	}

	function get_data()
{
    if (isset($_GET['term'])) {
        $result = $this->ajax_model->search_barang($_GET['term']);
        if (count($result) > 0) {
            $arr_result = array();
            foreach ($result as $row) {
                $arr_result[] = array(
					'label' =>  $row->nisn,
					// "value"=>$row->id_siswa,"namaSiswa"=>$row->nama,
					'namaSiswa' =>  $row->nama,
					'kelas' =>  $row->kelas,
					'namaKelas' =>  $row->nama_kls,	
					'nama_mhs' =>  $row->id_siswa,	
					'nama_kls' =>  $row->kelas_id,		
                );
            }
            echo json_encode($arr_result);
        }
    }
}

	
	function fetch_nik() {
        if (isset($_GET['term'])) {
            $result = $this->ajax_model->search_nik($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    //  $arr_result[] = $row->nama;

                    $arr_result[] = array(
                        'label' =>  $row->nik,
						'addNIKGuru' =>  $row->id,
						'fullnameGuru'  =>  $row->guru,
						'usernameGuru' => "guru$row->nik",
                    );
                echo json_encode($arr_result);
            }
        }
	}


	function fetch_nik_bk() {
        if (isset($_GET['term'])) {
            $result = $this->ajax_model->search_nik($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    //  $arr_result[] = $row->nama;

                    $arr_result[] = array(
                        'label' =>  $row->nik,
						'addNIKGuruBk' =>  $row->id,
						'fullnameGuruBk'  =>  $row->guru,
						'usernameGuruBk' => "gurubk$row->nik",
                    );
                echo json_encode($arr_result);
            }
        }
	}

	function fetch_search_nisn() {
        if (isset($_GET['term'])) {
            $result = $this->ajax_model->search_nisn($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    //  $arr_result[] = $row->nama;

                    $arr_result[] = array(
						'label' =>  $row->nisn,
						'fullnameSiswa'  =>  $row->nama,
						'usernameSiswa' =>  "siswa$row->nisn",
                    );
                echo json_encode($arr_result);
            }
        }
	}

	function fetch_search_nisn_Wali() {
        if (isset($_GET['term'])) {
            $result = $this->ajax_model->search_nisn_wali($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    //  $arr_result[] = $row->nama;

                    $arr_result[] = array(
						'label' =>  $row->nisn,
						'fullnameWali'  =>  $row->parent_name,
						'usernameWali' =>  "wali$row->nisn",
                    );
                echo json_encode($arr_result);
            }
        }
	}
	
	function fetch_laporan() {
        if (isset($_GET['term'])) {
            $result = $this->ajax_model->search_laporan($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    //  $arr_result[] = $row->nama;

                    $arr_result[] = array(
						'label' =>  $row->nisn,
						'siswa' =>  $row->id,
						// 'addNIKGuru' =>  $row->id,
						// 'fullnameGuru'  =>  $row->guru,
						// 'usernameGuru' =>  "fullnameGuru$row->nik",
                    );
                echo json_encode($arr_result);
            }
        }
    }

	public function fetch_subNamakelas(){
		if($this->input->post('kelas')){
			echo $this->ajax_model->fetch_subNamakelas($this->input->post('kelas'));
		}
	}

	public function fetch_subNamaSiswa(){
		if($this->input->post('namaKelas')){
			echo $this->ajax_model->fetch_subNamaSiswa($this->input->post('namaKelas'));
		}
	}

	public function fetch_nikGuru(){

		if($this->input->post('idGuru')){

			$dataGuru = $this->db->get_where('guru',['id' => $this->input->post('idGuru')])->row();
			$data['nama'] = $dataGuru->guru;
			$data['nik'] = "guru$dataGuru->nik";
			echo json_encode($data);
		}
	}

	public function fetch_nikGuruBk(){

		if($this->input->post('idGuru')){

			$dataGuru = $this->db->get_where('guru',['id' => $this->input->post('idGuru')])->row();
			$data['nama'] = $dataGuru->guru;
			$data['nik'] = "gurubk$dataGuru->nik";
			echo json_encode($data);
		}
	}

	public function fetch_nisnWali(){
		
		if($this->input->post('nisnWali')){

			$dataNISNWali = $this->db->get_where('siswa',['id' => $this->input->post('nisnWali')])->row();
			$dataWali = $this->db->get_where('wali',['siswa_id' => $this->input->post('nisnWali')])->row();
			$data['nama'] = $dataWali->parent_name;
			$data['nisn'] = "wali$dataNISNWali->nisn";
			echo json_encode($data);
		}
	}

	public function fetch_nisnSiswa(){
		if($this->input->post('nisnSiswa')){

			$dataNISSiswa = $this->db->get_where('siswa',['id' => $this->input->post('nisnSiswa')])->row();
			$data['nama'] = $dataNISSiswa->nama;
			$data['nisn'] = "siswa$dataNISSiswa->nisn";
			echo json_encode($data);
		}
	}

}