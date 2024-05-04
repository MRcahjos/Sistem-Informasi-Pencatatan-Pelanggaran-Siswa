<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Kelas_model');
        $this->load->model('data_model');
        $this->load->model('admin_model');
        $this->load->model('Data_model');
       
    }


   
    public function siswa()
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Data_model', 'kelas');

        $data['Kelas'] = $this->kelas->getKelas();
                
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/siswa', $data);
        $this->load->view('templates/footer');
        
 
    }
    
public function SiswaDetail($id = null){

    $data['title'] = 'Detail Siswa';
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $data['oneSiswa'] = $this->admin_model->getOneSiswa($this->encrypt->decode($id)); /*-- Load One Data Administrator --*/

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail-siswa', $data);
        $this->load->view('templates/footer');

}

public function delete_siswa($id)
    {
        $this->Data_model->delete_siswa($id);
        $this->session->set_flashdata('flash','Data Siswa Berhasil Dihapus');
        redirect('guru/siswa');
    }

}
