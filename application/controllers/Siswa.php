<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
		$this->load->model('siswa_model');
    }


    public function profil()
    {
        $data['title'] = 'Profile Siswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $data['oneSiswa'] = $this->siswa_model->getOneSiswa('user', ['username' =>
        // $this->session->userdata('username')])->row_array();
        $data['oneSiswa'] = $this->siswa_model->getOneSiswa(substr($this->session->userdata('username'), 5));
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/profil', $data);
        $this->load->view('templates/footer');       
    }

    public function profile(){

        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
		

		$data['oneSiswa'] = $this->siswa_model->getOneSiswa(substr($this->session->userdata('username'), 5));


		$this->form_validation->set_rules('nama','Nama Lengkap','required|trim');
		$this->form_validation->set_rules('wali','Nama Wali','required');
		$this->form_validation->set_rules('alamat','Alamat','required');		
		$this->form_validation->set_rules('telepon','No Telp / HP','required');

		if($this->form_validation->run() == false){

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/siswa_topbar', $data);
            $this->load->view('siswa/profil', $data);
            $this->load->view('templates/footer');

		}else{

            //check jika ada gmabar yang akan diupload, "f" itu nama inputnya
			// $upload_image = $_FILES['photo']['name'];
			$filename = substr($this->session->userdata('username'), 5);

			$config['allowed_types'] = 'png';
			$config['max_size']     = '5120'; // dalam hitungan kilobyte(kb), aslinya 1mb itu 1024kb
			$config['upload_path'] = './assets/img/profile/siswa/';
			$config['overwrite'] = "TRUE";
			$config['file_name'] = $filename;


			$this->load->library('upload', $config);
			$this->upload->overwrite = true;

			if(! $this->upload->do_upload('picture')){

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal Update </div>');
				redirect('Siswa/profil');
            }else{

                
             $data = [

                'nama' => htmlspecialchars($this->input->post('nama')),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => str_replace("-","",$this->input->post('telepon'))

             ];

             $this->db->where('nisn', $this->input->post('z'));
             $this->db->update('siswa',$data);
            

             $data1 = [

                'parent_name' => htmlspecialchars($this->input->post('wali')),
                'no_telp' => str_replace("-","",$this->input->post('telepon'))

             ];

				$student_id = $this->siswa_model->getOneSiswa(substr($this->session->userdata('username'), 5))->id_siswa;

                $this->db->where('siswa_id', $student_id);
                $this->db->update('wali',$data1);
                
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="success">
                Your Profile has been updated!
              </div>');                          
             }		
             redirect('Siswa/profil');	
		}

    }

    public function pelanggaran()
    {
        $data['title'] = 'List Pelanggaran';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['oneSiswa'] = $this->siswa_model->getOneSiswa(substr($this->session->userdata('username'), 5));
        $data['pelanggaran'] = $this->siswa_model->getPelanggaranByNiSN(substr($this->session->userdata('username'), 5));
		$data['pelanggaranTotal'] = $this->siswa_model->getCountPelanggaran($this->siswa_model->getOneSiswa(substr($this->session->userdata('username'), 5))->id_siswa);
		$data['onepel'] = $this->siswa_model->getOnePelanggaran($this->siswa_model->getOneSiswa(substr($this->session->userdata('username'), 5))->id_siswa);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/pelanggaran', $data);
        $this->load->view('templates/footer');       
    }

    public function PelanggaranAdd()
    {
        $data['title'] = 'Laporkan Pelanggaran';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        
		$data['oneSiswa'] = $this->siswa_model->getOneSiswa(substr($this->session->userdata('username'), 5));

        $this->load->model('Kategori_model', 'pelanggaran');

        $data['guruAll'] = $this->pelanggaran->getGuru();
		$data['pelanggaranAll'] = $this->pelanggaran->getKategoriPelanggaran();

        $this->form_validation->set_rules('nisn','nisn','required');
        $this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('namaKelas','Nama Kelas','required');
		$this->form_validation->set_rules('namaSiswa','Nama Siswa','required');
		$this->form_validation->set_rules('pelapor','Pelapor','required');
		$this->form_validation->set_rules('pelanggaran','Kategori Pelanggaran','required');
        $this->form_validation->set_rules('catatan','Catatan','required');
        $this->form_validation->set_rules('pelapor','Pelapor','required');

		if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/pelanggaran-add', $data);
        $this->load->view('templates/footer');
        }else{
            
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '200048';
                $config['upload_path'] = './assets/upload/images/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // $old_image = $data['user']['image'];
                    // if ($old_image != 'file_name.jpg') {
                    //     unlink(FCPATH . 'assets/upload/images/' . $old_image);
                    // }


                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

			$data = [

				'class_id' => $this->input->post('nama_kls'),
				'pelapor' => $this->input->post('pelapor'),
				'siswa_id' => $this->input->post('nama_mhs'),
				'nisn' => $this->pelanggaran->getOneSiswa($this->input->post('nama_mhs'))->nisn,
				'wali_id' => $this->pelanggaran->getOneWali($this->input->post('nama_mhs'))->id,
				'tipe_id' => $this->input->post('pelanggaran'),
				'point' => $this->pelanggaran->getOneKategoriPelanggaran($this->input->post('pelanggaran'))->point,
                'catatan' => $this->input->post('catatan'),
                // 'image' => $this->input->post('image'),
				'reported_on' => date('Y-m-d H:i:s')

			];


			$this->db->insert('pelanggaran', $data);


			$kelasPoint = $this->db->get_where('kelas',['id' => $this->input->post('namaKelas')])->row()->total_poin;

			$point = array($kelasPoint, $this->pelanggaran->getOneKategoriPelanggaran($this->input->post('pelanggaran'))->point);

			$totalPoint = array_sum($point);

			$data1 = [

				'total_poin' => $totalPoint
			];

			$this->db->where('id', $this->input->post('namaKelas'));
			$this->db->update('kelas',$data1);

            $this->session->set_flashdata('flash','Berhasil Melaporkan Pelanggaran Siswa');
			
			redirect('siswa/PelanggaranAdd');
        }
    }
    
}