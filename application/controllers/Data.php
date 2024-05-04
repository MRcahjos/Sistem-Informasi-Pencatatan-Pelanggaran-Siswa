<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Kelas_model');
        $this->load->model('data_model');
        $this->load->model('admin_model');
        $this->load->model('Data_model');
        $this->load->library(array('excel'));
    }


    public function index()
    {
        $data['title'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['guru'] = $this->db->get('guru')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/index', $data);
        $this->load->view('templates/footer');
        
 
    }
    
    public function addGuru()
    {
        $data['title'] = 'Add Guru';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->db->get('guru')->result_array();

        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_natural|is_unique[guru.nik]',[
			'is_natural' => 'NIK Hanya Berisi Angka',
			'is_unique' => 'NIk Yang Anda Masukkan Sudah Terpakai!',
		]);
        $this->form_validation->set_rules('nama', 'Guru', 'required');
        $this->form_validation->set_rules('mapel', 'Plajaran', 'required');


        if ($this->form_validation->run() == false) {           
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/add-guru', $data);
        $this->load->view('templates/footer');

    }else{
        $data = [
            'nik' => $this->input->post('nik'),
            'guru' => $this->input->post('nama'),
            'plajaran' => $this->input->post('mapel'),

        ];
        $this->db->insert('guru', $data);
        $this->session->set_flashdata('flash','Data Guru Berhasil Ditambahkan');
        redirect('data');
    }
    
}
    public function kelas()
    {
        $data['title'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Kelas_model', 'kelas');

        $data['data'] = $this->db->get('kelas')->result_array();
        
        // $data['guru'] = $this->db->get('guru')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/kelas', $data);
        $this->load->view('templates/footer');
        
 
    }
    
    public function addKelas()
    {
        $data['title'] = 'Add Kelas';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        // $this->load->model('Kelas_model', 'kelas');

        $data['kelasAll'] = $this->admin_model->getKelas();
		$data['guruAll'] = $this->admin_model->getGuru();

        $this->form_validation->set_rules('kelas','Kelas','trim|required');
		$this->form_validation->set_rules('nama','Nama Kelas','trim|required|is_unique[kelas.nama_kls]',[
			'is_unique' => 'Nama Kelas Yang Anda Masukkan Sudah Ada!',
		]);
		$this->form_validation->set_rules('jumlah','Jumlah Murid','required|trim|is_natural',[
			'is_natural' => 'NIK Hanya Berisi Angka',
		]);
		$this->form_validation->set_rules('wali','Wali Kelas','required');



        if ($this->form_validation->run() == false) {           
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/add-kelas', $data);
        $this->load->view('templates/footer');

    }else{
        $data = [

            'kelas' => $this->input->post('kelas'),
            'nama_kls' => $this->input->post('nama'),
            'jumlah' => $this->input->post('jumlah'),
            'nama_Wali' => $this->input->post('wali')

        ];
        $this->db->insert('kelas', $data);
        $this->session->set_flashdata('flash','Data Kelas Berhasil Ditambahkan');
        redirect('data/kelas');
    }


}

    public function siswa()
    {
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('Data_model', 'kelas');

        $data['Siswa'] = $this->kelas->getKelas();
        $data['Kelas'] = $this->db->get('kelas')->result_array();
                
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/siswa', $data);
        $this->load->view('templates/footer');
        
 
    }
    
    public function addSiswa()
    {
        $data['title'] = 'Add Siswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        
        $this->form_validation->set_rules('nisn','NISN','trim|required|is_natural|is_unique[siswa.nisn]',[
			'is_natural' => 'NISN Hanya Berisi Angka',
			'is_unique' => 'NISN Yang Anda Masukkan Sudah Terpakai!'
		]);
		$this->form_validation->set_rules('nama','Nama Siswa','required');
		$this->form_validation->set_rules('addnamaKelas','Kelas Siswa','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('telepon','No Telepon','trim|required|min_length[5]|max_length[14]|is_natural',[
			'is_natural' => 'Input Nomor HP Hanya Berisi Angka'
		]);
		$this->form_validation->set_rules('wali','Orang Tua / Wali','required');


        if ($this->form_validation->run() == false) {           
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/add-siswa', $data);
        $this->load->view('templates/footer');

    }else{
        $data = [

            'nisn' => $this->input->post('nisn'),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'kelas_id' => $this->input->post('addnamaKelas'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => str_replace("-","",$this->input->post('telepon'))

        ];

        $this->db->insert('siswa', $data);

        $id_siswa = $this->db->insert_id();

        $data1 = [

            'siswa_id' => $id_siswa,
            'parent_name' => htmlspecialchars($this->input->post('wali')),
            'no_telp' => str_replace("-","",$this->input->post('telepon'))

        ];

        $this->db->insert('wali', $data1);
       
        $nisn = $this->input->post('nisn');

        $data2 = [
                    'siswa_id' => $id_siswa,
					'name' => $this->input->post('nama'),
					'username' => "siswa$nisn",
					'password' => password_hash($this->input->post('nisn'), PASSWORD_DEFAULT),
                    'level' => 'Siswa',
                    'is_active' => 1,
                    'image ' => 'def.jpg',
                    'role_id' => 4,
                    'date_created ' => time()
        ];

        $this->db->insert('user', $data2);

        $nisn = $this->input->post('nisn');

        $data3 = [
                    'siswa_id' => $id_siswa,
					'name' => $this->input->post('wali'),
					'username' => "wali$nisn",
					'password' => password_hash($this->input->post('nisn'), PASSWORD_DEFAULT),
                    'level' => 'Wali',
                    'is_active' => 1,
                    'image ' => 'def.jpg',
                    'role_id' => 3,
                    'date_created ' => time()
        ];
      
        $this->db->insert('user', $data3);
        $this->session->set_flashdata('flash','Data Siswa Berhasil Ditambahkan');
       redirect('data/siswa');
    }


}

public function edit_guru($id = null){

   
    $data['title'] = 'Edit Guru';
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $data['oneGuru'] = $this->admin_model->getOneGuru($this->encrypt->decode($id)); /*-- Load One Data Administrator --*/


    $this->form_validation->set_rules('nik','NIK','required|trim|is_natural',[
        'is_natural' => 'NIK Hanya Berisi Angka'
    ]);
    $this->form_validation->set_rules('nama','Nama Guru','required');
    $this->form_validation->set_rules('mapel','Mata Pelajaran','required');

    if($this->form_validation->run() == false){

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/edit-guru', $data);
        $this->load->view('templates/footer');

    }else{

        $data = [

            'nik' => $this->input->post('nik'),
            'guru' => $this->input->post('nama'),
            'plajaran' => $this->input->post('mapel')

        ];

        $this->db->where('id', $this->input->post('z'));
        $this->db->update('guru',$data);
        $this->session->set_flashdata('flash','Data Guru Berhasil Diubah');
        redirect('data/index');

    }

}

public function KelasEdit($id = null){

    $data['title'] = 'Edit kelas';
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $data['guruAll'] = $this->admin_model->GetGuru();
    $data['oneKelas'] = $this->admin_model->getOneKelas($this->encrypt->decode($id)); /*-- Load One Data Administrator --*/

    $this->form_validation->set_rules('kelas','Kelas','trim|required');
    $this->form_validation->set_rules('nama','Nama Kelas','trim|required');
    $this->form_validation->set_rules('jumlah','Jumlah Murid','required|trim|is_natural',[
        'is_natural' => 'NIK Hanya Berisi Angka',
    ]);
    $this->form_validation->set_rules('wali','Wali Kelas','required');

    if($this->form_validation->run() == false){

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/edit-kelas', $data);
        $this->load->view('templates/footer');

    }else{

        $data = [

            'kelas' => $this->input->post('kelas'),
            'nama_kls' => $this->input->post('nama'),
            'jumlah' => $this->input->post('jumlah'),
            'nama_wali' => $this->input->post('wali')

        ];

        $this->db->where('id', $this->input->post('z'));
        $this->db->update('kelas',$data);
        $this->session->set_flashdata('flash','Data Kelas Berhasil Diubah');
    redirect('data/kelas');

    }

}

public function SiswaEdit($id = null){

    $data['title'] = 'Edit Siswa';
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $data['oneSiswa'] = $this->admin_model->getOneSiswa($this->encrypt->decode($id)); /*-- Load One Data Administrator --*/

    $this->form_validation->set_rules('nisn','NISN','trim|required|is_natural',[
        'is_natural' => 'NISN Hanya Berisi Angka',
    ]);
    $this->form_validation->set_rules('nama','Nama Siswa','required');
    $this->form_validation->set_rules('addnamaKelas','Kelas Siswa','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $this->form_validation->set_rules('telepon','No Telepon','trim|required|min_length[5]|max_length[14]|is_natural',[
        'is_natural' => 'Input Nomor HP Hanya Berisi Angka'
    ]);
    $this->form_validation->set_rules('wali','Orang Tua / Wali','required');

    if($this->form_validation->run() == false){

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/edit-siswa', $data);
        $this->load->view('templates/footer');

    }else{

        $data = [

            'nisn' => $this->input->post('nisn'),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'kelas_id' => $this->input->post('addnamaKelas'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => str_replace("-","",$this->input->post('telepon'))

        ];

        $this->db->where('id', $this->input->post('z'));
        $this->db->update('siswa',$data);
        $this->db->where('siswa_id', $this->input->post('z'));
        $this->db->update('pelanggaran',['class_id' => $this->input->post('addnamaKelas')]);


        $data1 = [

            'parent_name' => htmlspecialchars($this->input->post('wali')),
            'no_telp' => str_replace("-","",$this->input->post('telepon'))

        ];

        $this->db->where('siswa_id', $this->input->post('z'));
        $this->db->update('wali',$data1);

        $data2 = [
            'class_id' => $this->input->post('addnamaKelas'),
            
        ];
        ($this->db->where('siswa_id', $this->input->post('z')));

        $this->db->where('pelanggaran_id', $this->input->post('z'));
            $this->db->update('pelanggaran',$data2);

        $this->session->set_flashdata('flash','Data Siswa Berhasil Diubah');
    redirect('data/siswa');

    }

}

public function delete_guru($id)
{
    $this->Data_model->delete($id);
    $this->session->set_flashdata('flash','Data Guru Berhasil Dihapus');
    redirect('data');
}

public function delete_kelas($id)
{
    $this->Data_model->delete_kelas($id);
    $this->session->set_flashdata('flash','Data Kelas Berhasil Dihapus');
    redirect('data/kelas');
}

    public function delete_siswa($id)
    {
        $this->Data_model->delete_siswa($id);
        $this->session->set_flashdata('flash','Data Siswa Berhasil Dihapus');
        redirect('data/siswa');
    }
    public function deleteAll()
    {
        $ids = $this->input->post('ids');
     
        $this->db->where_in('id', explode(",", $ids));
        $siswa = $this->db->get('siswa')->result();
     
        foreach ($siswa as $s) {
            // Menghapus file gambar pelanggaran yang terkait
            $this->db->where('siswa_id', $s->id);
            $pelanggaran = $this->db->get('pelanggaran')->result();
    
            foreach ($pelanggaran as $p) {
                if (!empty($p->image)) {
                    $file_path = './assets/upload/images/' . $p->image;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }
    
            // Menghapus data pelanggaran terkait
            $this->db->where('siswa_id', $s->id);
            $this->db->delete('pelanggaran');
        }
     
        $this->db->where_in('id', explode(",", $ids));
        $this->db->delete('siswa');

        $this->db->where_in('siswa_id', explode(",", $ids));
        $this->db->delete('user');
     
        echo json_encode(['success' => "Item Deleted successfully."]);
    }
    

    public function updateAllkelas()
    {
        $ids = $this->input->post('ids');
        $kelas_id = $this->input->post('kelas_id');
        
        $this->db->where_in('siswa_id', explode(",", $ids));
        $this->db->update('pelanggaran',['class_id'=>$kelas_id]);

        $this->db->where_in('id', explode(",", $ids));
        $this->db->update('siswa', ['kelas_id'=>$kelas_id]);
 
        redirect('data/siswa');
    }

    public function import_excel()
    {
        if (isset($_FILES["fileExcel"]["name"])) {
            $path = $_FILES["fileExcel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            $temp_data = array();
            $temp_wali_data = array();
    
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for ($row = 4; $row <= $highestRow; $row++) {
                    $nisn = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $alamat = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $no_telp = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $parent_name = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
    
                    $temp_data[] = array(
                        'kelas_id' => $this->input->post('kelas_id'),
                        'nisn' => $nisn,
                        'nama' => $nama,
                        'alamat' => $alamat,
                        'no_telp' => $no_telp
                    );
    
                    $temp_data1[] = array(
                        'name' => $nama,
                        'username' => "siswa$nisn",
                        'password' => password_hash($nisn, PASSWORD_DEFAULT),
                        'level' => 'Siswa',
                        'is_active' => 1,
                        'image' => 'def.jpg',
                        'role_id' => 4,
                        'date_created' => time(),
                        'siswa_id' => null  // Nilai awal ID siswa
                    );
    
                    $temp_data2[] = array(
                        'name' => $parent_name,
                        'username' => "wali$nisn",
                        'password' => password_hash($nisn, PASSWORD_DEFAULT),
                        'level' => 'Wali',
                        'is_active' => 1,
                        'image' => 'def.jpg',
                        'role_id' => 3,
                        'date_created' => time(),
                        'siswa_id' => null  // Nilai awal ID wali
                    );
    
                    $wali_data = array(
                        'parent_name' => $parent_name,
                        'no_telp' => $no_telp,
                        'siswa_id' => null  // Nilai awal ID siswa
                    );
    
                    $temp_wali_data[] = $wali_data;
                }
            }
    
            $this->form_validation->set_rules('kelas_id', 'Kelas Siswa', 'required');
    
            if ($this->form_validation->run() && !empty($temp_data)) {
                $this->db->trans_start();
    
                $this->db->insert_batch('siswa', $temp_data);
                $inserted_siswa_ids = array();
                $inserted_siswa_data = $this->db->select('id')->from('siswa')->order_by('id', 'DESC')->limit(count($temp_data))->get()->result();
    
                foreach ($inserted_siswa_data as $siswa) {
                    $inserted_siswa_ids[] = $siswa->id;
                }
    
                if (!empty($inserted_siswa_ids)) {
                    foreach ($temp_data1 as $key => &$data1) {
                        $index = count($inserted_siswa_ids) - 1 - $key;
                        $data1['siswa_id'] = $inserted_siswa_ids[$index];
                        $temp_data2[$key]['siswa_id'] = $inserted_siswa_ids[$index];
                        $temp_wali_data[$key]['siswa_id'] = $inserted_siswa_ids[$index];
                    }
    
                    $this->db->insert_batch('user', $temp_data1);
                    $this->db->insert_batch('user', $temp_data2);
                    $this->db->insert_batch('wali', $temp_wali_data);
    
                    $this->db->trans_complete();
    
                    if ($this->db->trans_status()) {
                        $this->session->set_flashdata('flash', 'Data Siswa Berhasil Diimport ke Database');
                    } else {
                        $this->session->set_flashdata('flash', 'Terjadi kesalahan saat menyimpan data');
                    }
                } else {
                    $this->session->set_flashdata('flash', 'Gagal menyimpan data siswa');
                }
            } else {
                $this->session->set_flashdata('flash', 'Gagal memvalidasi data');
            }
    
            redirect('data/siswa');
        }
    }    
}
