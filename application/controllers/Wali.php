<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Wali extends CI_Controller {

	public function __construct(){		
		parent::__construct();
        cek_login();
		$this->load->model('wali_model');
	}

	public function index(){

		$data['title'] = 'Profile Anak';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
		
		$data['oneSiswa'] = $this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wali_topbar', $data);
        $this->load->view('wali/index', $data);
        $this->load->view('templates/footer');


	}

	public function pelanggaran(){

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
		
		$data['oneSiswa'] = $this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4));

		$data['pelanggaran'] = $this->wali_model->getPelanggaranByNiSN(substr($this->session->userdata('username'), 4));
		$data['pelanggaranTotal'] = $this->wali_model->getCountPelanggaran($this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4))->id_siswa);
		// $data['onepel'] = $this->wali_model->getOnePelanggaran($this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 5))->id_siswa);
		$data['onepel'] = $this->wali_model->getOnePelanggaran($this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4))->id_siswa);

		$data['title'] = 'Pelanggaran Anak';
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wali_topbar', $data);
        $this->load->view('wali/pelanggaran', $data);
        $this->load->view('templates/footer');


	}

		public function pelanggaranAnakOnePrint($pelanggaran_id){


		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$data['oneWeb'] = $this->wali_model->getOneWebsite($this->session->userdata('school_name'));
		// $data['onepel'] = $this->wali_model->getOnePelanggaran($this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4))->id_siswa);
		$data['onepel'] = $this->wali_model->getOnePelanggaran($this->encrypt->decode($pelanggaran_id));
		$data['oneSis'] = $this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4));

		$data['title'] = "List Pelanggaran Print";
		$data['parent'] = "List Pelanggaran";
		$data['page'] = "List Pelanggaran Print";
		$this->load->view('wali/wali_pelanggaranAnakOnePrint', $data);

	}

	public function pelanggaranAnakAllPrint(){
		$this->load->library('mypdf');

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$data['oneWeb'] = $this->wali_model->getOneWebsite($this->session->userdata('school_name'));

		$data['hasilOne'] = $this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4));
		$data['hasilAll'] = $this->wali_model->getPelanggaranByNiSN(substr($this->session->userdata('username'), 4));
		$data['hasilTotal'] = $this->wali_model->getCountPelanggaran($this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4))->id_siswa);


		$data['title'] = $this->wali_model->website();
		$data['page'] = "Laporan Pelanggaran Anak ";
		$this->load->view('wali/wali_pelanggaranAnakAllPrint',$data);




	}


public function PelanggaranAnakDetail($pelanggaran_id = null){

	$data['user'] = $this->db->get_where('user', ['username' =>
	$this->session->userdata('username')])->row_array();

	$data['oneSiswa'] = $this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4));
	// $data['onepel'] = $this->wali_model->getOnePelanggaran($this->wali_model->getOneSiswa(substr($this->session->userdata('username'), 4))->id_siswa);
	$data['onepel'] = $this->wali_model->getOnePelanggaran($pelanggaran_id); 

	$data['title'] = 'Pelanggaran Anak';
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/wali_topbar', $data);
        $this->load->view('wali/wali_pelanggaranAnakDetail', $data);
        $this->load->view('templates/footer');


}
}
