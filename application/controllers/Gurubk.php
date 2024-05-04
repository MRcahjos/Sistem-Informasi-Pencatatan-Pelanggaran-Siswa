<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Gurubk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('admin_model');
        $this->load->model('Admin_model');
      
    }

    public function index()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['oneWeb'] = $this->admin_model->getOneWebsite($this->session->userdata('school_name'));

		$this->form_validation->set_rules('point','Point','trim|required|is_natural',[
			'is_natural' => 'Point Hanya Berisi Angka'
		]);

        if($this->form_validation->run() == false){

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gurubk/index', $data);
        $this->load->view('templates/footer');

    }else{
        $data = [

            'point' => $this->input->post('point'),

        ];

        $this->db->where('id', $this->input->post('z'));
        $this->db->update('website',$data);
        $this->session->set_flashdata('flash','Pengaturan Website Berhasil Diubah');
        redirect('gurubk/index');

    }
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['ttlSiswa'] = $this->admin_model->getCountSiswa();
		$data['ttlTipePelanggaran'] = $this->admin_model->getCountTipePelanggaran();
		$data['ttlPelanggaran'] = $this->admin_model->getCountPelanggaranDashboard();
		$data['ttlGuru'] = $this->admin_model->getCountGuru();

		$data['murid'] = $this->admin_model->TopMurid();
		$data['pelanggaran'] = $this->admin_model->TopPelanggaran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gurubk/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
