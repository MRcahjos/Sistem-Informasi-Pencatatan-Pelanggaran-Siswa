<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('admin_model');
    }
public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['siswaAll'] = $this->admin_model->getSiswa();
        $data['kelasAll'] = $this->admin_model->getKelas();
        $data['Get_Point'] = $this->admin_model->get_point();

        if($this->input->post('pencarian') == 'siswa'){

			$this->form_validation->set_rules('siswa','Nama Siswa','required');

		}elseif($this->input->post('pencarian') == 'kelas'){

			$this->form_validation->set_rules('kelas','Nama Kelas','required');

		}

		$this->form_validation->set_rules('pencarian','Tipe Pencarian','required');
		// $this->form_validation->set_rules('search','Silahkan Mengisi Inputan di Atas','required');
		$this->form_validation->set_rules('awal','Awal Periode','required');
		$this->form_validation->set_rules('akhir','Akhir Periode','required');

		if($this->form_validation->run() == false){

            $data['tipe'] = NULL;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }else{


        $pencarian = $this->input->post('pencarian');
        $siswa = $this->input->post('siswa');
        $kelas = $this->input->post('kelas');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');

        if($pencarian == 'siswa'){

            $query = "SELECT *,
            pelanggaran_id AS id_pelanggaran,
            siswa.id AS id_siswa,
            -- guru.id AS id_guru,
            wali.id AS id_wali,
            wali.no_telp AS phone_number_wali,
            ketegori.id AS id_tipe_pelanggaran
            FROM pelanggaran 
            JOIN siswa ON pelanggaran.siswa_id = siswa.id
            JOIN kelas ON pelanggaran.class_id = kelas.id 
            -- JOIN guru ON pelanggaran.guru_id = guru.id
            JOIN wali ON pelanggaran.wali_id = wali.id
            JOIN ketegori ON pelanggaran.tipe_id = ketegori.id
            WHERE (pelanggaran.reported_on BETWEEN '$awal' AND '$akhir') AND siswa.id = $siswa";

            $queryTotal = "SELECT COUNT(tipe_id) AS total_pelanggaran, SUM(point) AS total_point FROM pelanggaran WHERE siswa_id = $siswa";

        }elseif($pencarian == 'kelas'){

            $query = "SELECT *,
            pelanggaran_id AS id_pelanggaran,
            siswa.id AS id_siswa,
            -- guru.id AS id_guru,
            wali.id AS id_wali,
            wali.no_telp AS phone_number_wali,
            ketegori.id AS id_tipe_pelanggaran
            FROM pelanggaran
            JOIN siswa ON pelanggaran.siswa_id = siswa.id 
            JOIN kelas ON pelanggaran.class_id = kelas.id 
            -- JOIN guru ON pelanggaran.guru_id = guru.id
            JOIN wali ON pelanggaran.wali_id = wali.id
            JOIN ketegori ON pelanggaran.tipe_id = ketegori.id
            WHERE (pelanggaran.reported_on BETWEEN '$awal' AND '$akhir') AND kelas.id = '$kelas'";

            $queryTotal = "SELECT COUNT(tipe_id) AS total_pelanggaran, SUM(point) AS total_point FROM pelanggaran WHERE class_id = $kelas";

        };

        $data['hasilOne'] = $this->db->query($query)->row();
        $data['hasilAll'] = $this->db->query($query)->result();
        $data['hasilTotal'] = $this->db->query($queryTotal)->row();

        $data['tipe'] = $pencarian;
        // $data['siswa'] = $siswa;
        // // $data['kelas'] = $kelas;
        // $data['awal'] = $awal;
        // $data['akhir'] = $akhir;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    }

    public function laporanPdf(){

		$this->load->library('mypdf');

	

		$data['siswaAll'] = $this->admin_model->getSiswa();
		$data['kelasAll'] = $this->admin_model->getKelas();
		$data['oneWeb'] = $this->admin_model->getOneWebsite($this->session->userdata('school_name'));
		

		if($this->input->post('pencarianPdf') == 'siswa'){

			$this->form_validation->set_rules('siswaPdf','Nama Siswa','required');

		}elseif($this->input->post('pencarianPdf') == 'kelas'){

			$this->form_validation->set_rules('kelasPdf','Nama Kelas','required');

		}

		$this->form_validation->set_rules('pencarianPdf','Tipe Pencarian','required');
		// $this->form_validation->set_rules('search','Silahkan Mengisi Inputan di Atas','required');
		$this->form_validation->set_rules('awalPdf','Awal Periode','required');
		$this->form_validation->set_rules('akhirPdf','Akhir Periode','required');

		if($this->form_validation->run() == false){

		
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/index', $data);
            $this->load->view('templates/footer');
			//sample
			// $this->template->load('admin/layout/admin_template','admin/modul_laporan/admin_laporan_sample',$data);

		}else{


			$pencarian = $this->input->post('pencarianPdf');
			$siswa = $this->input->post('siswaPdf');
			$kelas = $this->input->post('kelasPdf');
			$awal = $this->input->post('awalPdf');
			$akhir = $this->input->post('akhirPdf');

			if($pencarian == 'siswa'){

                $query = "SELECT *,
                pelanggaran_id AS id_pelanggaran,
                siswa.id AS id_siswa,
                -- guru.id AS id_guru,
                wali.id AS id_wali,
                wali.no_telp AS phone_number_wali,
                ketegori.id AS id_tipe_pelanggaran
                FROM pelanggaran 
                JOIN siswa ON pelanggaran.siswa_id = siswa.id
                JOIN kelas ON pelanggaran.class_id = kelas.id 
                -- JOIN guru ON pelanggaran.guru_id = guru.id
                JOIN wali ON pelanggaran.wali_id = wali.id
                JOIN ketegori ON pelanggaran.tipe_id = ketegori.id
                WHERE (pelanggaran.reported_on BETWEEN '$awal' AND '$akhir') AND siswa.id = $siswa";
    
                $queryTotal = "SELECT COUNT(tipe_id) AS total_pelanggaran, SUM(point) AS total_point FROM pelanggaran WHERE siswa_id = $siswa";

			}elseif($pencarian == 'kelas'){

                $query = "SELECT *,
                pelanggaran_id AS id_pelanggaran,
                siswa.id AS id_siswa,
                -- guru.id AS id_guru,
                wali.id AS id_wali,
                wali.no_telp AS phone_number_wali,
                ketegori.id AS id_tipe_pelanggaran
                FROM pelanggaran
                JOIN siswa ON pelanggaran.siswa_id = siswa.id 
                JOIN kelas ON pelanggaran.class_id = kelas.id 
                -- JOIN guru ON pelanggaran.guru_id = guru.id
                JOIN wali ON pelanggaran.wali_id = wali.id
                JOIN ketegori ON pelanggaran.tipe_id = ketegori.id
                WHERE (pelanggaran.reported_on BETWEEN '$awal' AND '$akhir') AND kelas.id = '$kelas'";
    
                $queryTotal = "SELECT COUNT(tipe_id) AS total_pelanggaran, SUM(point) AS total_point FROM pelanggaran WHERE class_id = $kelas";

			};


			$data['hasilOne'] = $this->db->query($query)->row();
			$data['hasilAll'] = $this->db->query($query)->result();
			$data['hasilTotal'] = $this->db->query($queryTotal)->row();
			
			$data['tipe'] = $pencarian;

           
            $this->load->view('laporan/laporanPdf', $data);
           
		}
	}

}