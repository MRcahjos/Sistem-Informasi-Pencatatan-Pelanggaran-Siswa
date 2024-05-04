<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Pelanggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('admin_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['title'] = 'Kategori Pelanggaran';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['ketegori'] = $this->db->get('ketegori')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function Pelanggaran()
    {
        $data['title'] = 'List Pelanggaran';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('kategori_model', 'pelanggaran');
        $this->load->model('kategori_model', 'kelas');
        $this->load->model('kategori_model', 'siswa');

        // $kelas = $this->admin_model->getKelas(); 	
		// $siswa = $this->admin_model->getSiswa(); 	
		// $list = $this->ajax_model->get_pelanggaran();
       
         $data['pelanggaran'] = $this->pelanggaran->get_all_pelanggaran_data();      
         $data['kelas'] = $this->kelas->getKelas();
         $data['siswa'] = $this->siswa->getSiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/pelanggaran', $data);
        $this->load->view('templates/footer');

        
    }


   public function PelanggaranAdd()
    {
        $data['title'] = ' Pelanggaran Add';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Kategori_model', 'pelanggaran');

        $data['guruAll'] = $this->pelanggaran->getGuru();
		$data['pelanggaranAll'] = $this->pelanggaran->getKategoriPelanggaran();

        $this->form_validation->set_rules('nisn','nisn','required');
        $this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('nama_kls','Nama Kelas','required');
		// $this->form_validation->set_rules('nama','Nama Siswa','required');
		$this->form_validation->set_rules('pelapor','Pelapor','required');
		$this->form_validation->set_rules('pelanggaran','Kategori Pelanggaran','required');
        $this->form_validation->set_rules('catatan','Catatan','required');
        $this->form_validation->set_rules('pelapor','Pelapor','required');

		if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/pelanggaran-add', $data);
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

                    $data_gambar = $this->upload->data();

                    $config['image_library'] = 'gd2';
                    $config['source_image']  = './assets/upload/images/' . $data_gambar["file_name"];
                    $config['create_thumb']  = false;
                    $config['maintain_ratio'] = false;
                    $config['quality']       = '60%';
                    $config['width']         = 900;
                    $config['height']        = 650;
                    $config['new_image']     = './assets/upload/images/' . $data_gambar["file_name"];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

			$dataPelanggaran = [
                
                'image' => $data_gambar["file_name"],
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
            // var_dump($dataPelanggaran);
            // die;
			$this->db->insert('pelanggaran', $dataPelanggaran);

            $this->session->set_flashdata('flash','Data Pelanggaran Siswa Berhasil Ditambahkan');
			
			redirect('pelanggaran/pelanggaran');
        }
    }

	public function edit($pelanggaran_id = null)
{
    $data['title'] = 'Edit Pelanggaran';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->model('Kategori_model', 'pelanggaran');

    $data['onepel'] = $this->admin_model->getOnePelanggaran($this->encrypt->decode($pelanggaran_id));
    $data['pelanggaranAll'] = $this->admin_model->getKategoriPelanggaran();
    $data['guruAll'] = $this->admin_model->getGuru();

    $this->form_validation->set_rules('nisn', 'nisn', 'required');
    $this->form_validation->set_rules('kelas', 'Kelas', 'required');
    $this->form_validation->set_rules('nama_kls', 'Nama Kelas', 'required');
    // $this->form_validation->set_rules('nama','Nama Siswa','required');
    $this->form_validation->set_rules('pelapor', 'Pelapor', 'required');
    $this->form_validation->set_rules('pelanggaran', 'Kategori Pelanggaran', 'required');
    $this->form_validation->set_rules('catatan', 'Catatan', 'required');
    $this->form_validation->set_rules('pelapor', 'Pelapor', 'required');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/pelanggaran-edit', $data);
        $this->load->view('templates/footer');
    } else {
        $upload_image = $_FILES['image'];
        if ($upload_image['name']) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '200048';
            $config['upload_path'] = './assets/upload/images/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                // Hapus gambar lama jika ada
                $old_image = $this->input->post('old_image');
                if ($old_image && file_exists('./assets/upload/images/' . $old_image)) {
                    unlink('./assets/upload/images/' . $old_image);
                }

                $data_gambar = $this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/images/' . $data_gambar["file_name"];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $config['quality'] = '60%';
                $config['width'] = 900;
                $config['height'] = 650;
                $config['new_image'] = './assets/upload/images/' . $data_gambar["file_name"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $siswa_id = $this->input->post('nama_mhs'); // Ambil nilai siswa_id dari input field
        $encrypted_siswa_id =  $this->encrypt->decode($siswa_id); // Enkripsi nilai siswa_id

        $data_pelanggaran = [
            'class_id' => $this->encrypt->decode($this->input->post('nama_kls')),
            'pelapor' => $this->input->post('pelapor'),
            'siswa_id' => $encrypted_siswa_id,
            'nisn' => $this->pelanggaran->getOneSiswa($encrypted_siswa_id)->nisn,
            'wali_id' => $this->pelanggaran->getOneWali($encrypted_siswa_id)->id,
            'tipe_id' => $this->input->post('pelanggaran'),
            'point' => $this->admin_model->getOneKategoriPelanggaran($this->input->post('pelanggaran'))->point,
            'catatan' => $this->input->post('catatan'),
            'reported_on' => date('Y-m-d H:i:s')
        ];

        // var_dump($data_pelanggaran);
        // die;

        $this->db->where('pelanggaran_id', $this->input->post('z'));
        $this->db->update('pelanggaran', $data_pelanggaran);
        $this->session->set_flashdata('flash', 'Data Pelanggaran Siswa Berhasil Diubah');
        redirect('pelanggaran/pelanggaran');
    }
}

    public function detail ($pelanggaran_id = null)
    {
        $data['title'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['onepel'] = $this->admin_model->getOnePelanggaran($this->encrypt->decode($pelanggaran_id)); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function ListPelanggaranDelete($pelanggaran_id = null){
   
       
		$dataPelanggaran = $this->db->get_where('pelanggaran',['pelanggaran_id' => $pelanggaran_id])->row();
        
		$dataKelas = $this->db->get_where('kelas',['id' => $dataPelanggaran->class_id])->row();
		$pengurangan = $dataKelas->total_poin - $dataPelanggaran->point;
		$data = [

			'total_poin' => $pengurangan

		];

		$this->db->where('id', $dataPelanggaran->class_id);
		$this->db->update('kelas',$data);

        unlink ('./assets/upload/images/'.$dataPelanggaran->image);

		$this->db->delete('pelanggaran',['pelanggaran_id' => $pelanggaran_id]);


        $this->session->set_flashdata('flash','Data Pelanggaran Siswa Berhasil Dihapus');

           redirect('pelanggaran/pelanggaran');
    }
    
    public function edit_kategori()
    {

        $id = $this->input->post('id');
        $pelanggaran = $this->input->post('pelanggaran');
        $point = $this->input->post('point');

        $data = array(
            'pelanggaran' => $pelanggaran,
            'point' => $point
        );

        $where = array(
            'id' => $id
        );

        $this->Kategori_model->edit_data($where, $data, 'ketegori');


        $this->session->set_flashdata('flash','Kategori Pelanggaran Berhasil Diubah');


        redirect('kategori/index');
    }

    public function delete_kategori($id)
    {
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata('flash','Kategori Pelanggaran Berhasil Dihapus');
        redirect('kategori');
    }
}

