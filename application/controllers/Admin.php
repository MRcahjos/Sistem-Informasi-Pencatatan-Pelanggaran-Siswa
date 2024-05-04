<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Admin extends CI_Controller
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
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['ttlSiswa'] = $this->admin_model->getCountSiswa();
		$data['ttlTipePelanggaran'] = $this->admin_model->getCountTipePelanggaran();
		$data['ttlUsers'] = $this->admin_model->getCountUsers();
		$data['ttlGuru'] = $this->admin_model->getCountGuru();

		$data['murid'] = $this->admin_model->TopMurid();
		$data['pelanggaran'] = $this->admin_model->TopPelanggaran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function dashboardDetail($id){

		if (count($this->uri->segment_array()) > 3) {
			redirect('admin');
		}
		if (!isset($id)) {
			$this->toastr->error('Data yang Anda Inginkan Tidak Mempunyai ID');
			redirect('admin');
		}
		if (is_numeric($id)) {
			$this->toastr->error('Hanya Bisa Menggunakan Enkripsi');
			redirect('admin');
		} 

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$data['onePelanggaranAll'] = $this->admin_model->getOnePelanggaranByID($this->encrypt->decode($id));
		$data['oneSiswa'] = $this->admin_model->getOneSiswa($this->encrypt->decode($id));
		$data['pelanggaranTotal'] = $this->admin_model->getCountPelanggaran($this->encrypt->decode($id));
		$data['pelanggaran'] = $this->admin_model->getPelanggaranByID($this->encrypt->decode($id));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboardDetail', $data);
        $this->load->view('templates/footer');

    }
    
    public function pengguna(){

        $data['title'] = 'Pengguna';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

         $data['pengguna'] = $this->db->get('user')->result_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengguna', $data);
        $this->load->view('templates/footer');
	}


	public function penggunaAdd(){

		$data['title'] = 'Pengguna';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$data['usersAll'] = $this->admin_model->getUsers();

		$data['guruAll'] = $this->admin_model->getGuru();
		$data['siswaAll'] = $this->admin_model->getSiswa();
        $data['roleAll'] = $this->admin_model->getRole();


		if($this->input->post('level') == 'Admin'){

			$this->form_validation->set_rules('fullnameAdmin','FullName','required');
			// $this->form_validation->set_rules('emailAdmin','Email','trim|required|valid_email');
			$this->form_validation->set_rules('usernameAdmin','Username','required|is_unique[user.username]',[
				'is_unique' => 'Username Sudah Dipakai!'
			]);
            $this->form_validation->set_rules('passwordAdmin','Password','required');
            // $this->form_validation->set_rules('role','Role','required');

		}elseif($this->input->post('level') == 'Guru'){

			$this->form_validation->set_rules('fullnameGuru','FullName','required');
			// $this->form_validation->set_rules('emailGuru','Email','trim|required|valid_email');
			$this->form_validation->set_rules('usernameGuru','Username','required|is_unique[user.username]',[
				'is_unique' => 'Username Sudah Dipakai!'
			]);
            $this->form_validation->set_rules('passwordGuru','Password','required');
            // $this->form_validation->set_rules('role','Role','required');

		}elseif($this->input->post('level') == 'Wali'){
			$this->form_validation->set_rules('fullnameWali','FullName','required');
			// $this->form_validation->set_rules('emailWali','Email','trim|required|valid_email');
			$this->form_validation->set_rules('usernameWali','Username','required|is_unique[user.username]',[
				'is_unique' => 'Username Sudah Dipakai!'
			]);
            $this->form_validation->set_rules('passwordWali','Password','required');
            // $this->form_validation->set_rules('role','Role','required');

		}elseif($this->input->post('level') == 'Siswa'){
			$this->form_validation->set_rules('fullnameSiswa','FullName','required');
			// $this->form_validation->set_rules('emailSiswa','Email','trim|required|valid_email');
			$this->form_validation->set_rules('usernameSiswa','Username','required|is_unique[user.username]',[
				'is_unique' => 'Username Sudah Dipakai!'
			]);
            $this->form_validation->set_rules('passwordSiswa','Password','required');
            // $this->form_validation->set_rules('role','Role','required');
		

        }elseif($this->input->post('level') == 'Guru_Bk'){
            $this->form_validation->set_rules('fullnameGuruBk','FullName','required');
            // $this->form_validation->set_rules('emailBk','Email','trim|required|valid_email');
            $this->form_validation->set_rules('usernameGuruBk','Username','required|is_unique[user.username]',[
                'is_unique' => 'Username Sudah Dipakai!'
            ]);
            $this->form_validation->set_rules('passwordBk','Password','required');
            // $this->form_validation->set_rules('role','Role','required');

        }

        $this->form_validation->set_rules('level','Level','required');
        // $this->form_validation->set_rules('role','Role','required');


		if($this->form_validation->run() == false){

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/penggunaAdd', $data);
            $this->load->view('templates/footer');

		}else{

			if($this->input->post('level') == 'Admin'){

				$data = [

					'name' => $this->input->post('fullnameAdmin'),
					'username' => $this->input->post('usernameAdmin'),
					'password' => password_hash($this->input->post('passwordAdmin'), PASSWORD_DEFAULT),
                    'level' => $this->input->post('level'),
                    'is_active' => 1,
                    'image ' => 'def.jpg',
                    'role_id' => 1,
                    'date_created ' => time()

				];

			}elseif($this->input->post('level') == 'Guru'){

				$data = [

					'name' => $this->input->post('fullnameGuru'),
					'username' => $this->input->post('usernameGuru'),
					'password' => password_hash($this->input->post('passwordGuru'), PASSWORD_DEFAULT),
                    'level' => $this->input->post('level'),
                    'is_active' => 1,
                    'image ' => 'def.jpg',
                    'role_id' => 2,
                    'date_created ' => time()

				];

			}elseif($this->input->post('level') == 'Wali'){

				$data = [

					'name' => $this->input->post('fullnameWali'),
					'username' => $this->input->post('usernameWali'),
					'password' => password_hash($this->input->post('passwordWali'), PASSWORD_DEFAULT),
                    'level' => $this->input->post('level'),
                    'is_active' => 1,
                    'image ' => 'def.jpg',
                    'role_id' => 3,
                    'date_created ' => time()

				];

			}elseif($this->input->post('level') == 'Siswa'){

				$data = [

					'name' => $this->input->post('fullnameSiswa'),
					'username' => $this->input->post('usernameSiswa'),
					'password' => password_hash($this->input->post('passwordSiswa'), PASSWORD_DEFAULT),
                    'level' => $this->input->post('level'),
                    'is_active' => 1,
                    'image ' => 'def.jpg',
                    'role_id' => 4,
                    'date_created ' => time()

				];

			

            }elseif($this->input->post('level') == 'GuruBk'){

            $data = [

                'name' => $this->input->post('fullnameGuruBk'),
                'username' => $this->input->post('usernameGuruBk'),
                'password' => password_hash($this->input->post('passwordGuruBk'), PASSWORD_DEFAULT),
                'level' => $this->input->post('level'),
                'is_active' => 1,
                'image ' => 'def.jpg',
                'role_id' => 5,
                'date_created ' => time()

            ];

        }

			$this->db->insert('user', $data);
            $this->session->set_flashdata('flash','Data Pengguna Berhasil Ditambahkan');
             redirect('admin/pengguna');

		}

	}

    public function role()
    {
        $data['title'] = 'Role';
       $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('flash','Role Baru Berhasil Ditambahkan');
            redirect('admin/role');
        }
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('flash','Role Access Berhasil Diubah');
    }


    public function edit()
    {

        $id = $this->input->post('id');
        $role = $this->input->post('role');

        $data = array(
            'role' => $role
        );

        $where = array(
            'id' => $id
        );

        $this->admin_model->edit($where, $data, 'user_role');


        $this->session->set_flashdata('flash','Role Berhasil Diubah');

        redirect('admin/role');
    }
    public function delete($id)
    {
        $this->Admin_model->delete($id);
        $this->session->set_flashdata('flash','Role Berhasil Dihapus');
        redirect('admin/role');
    }

    public function website()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['oneWeb'] = $this->admin_model->getOneWebsite($this->session->userdata('school_name'));

        $this->form_validation->set_rules('sekolah','Nama Sekolah','required');
		$this->form_validation->set_rules('point','Point','trim|required|is_natural',[
			'is_natural' => 'Point Hanya Berisi Angka'
		]);

		if($this->form_validation->run() == false){

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/website', $data);
        $this->load->view('templates/footer');
        }else{
            $data = [

				'school_name' => $this->input->post('sekolah'),
				'point' => $this->input->post('point'),

			];

			$this->db->where('id', $this->input->post('z'));
			$this->db->update('website',$data);
            $this->session->set_flashdata('flash','Pengaturan Website Berhasil Diubah');
			redirect('admin/website');

        }
    }
    public function pengguna_edit($id = null){

        $data['title'] = 'Pengguna Edit';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();


		$data['oneUsers'] = $this->admin_model->getOneUsers($this->encrypt->decode($id)); /*-- Load One Data Administrator --*/

		$this->form_validation->set_rules('fullname','FullName','required');
		$this->form_validation->set_rules('username','Userame','required');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
		$this->form_validation->set_rules('level','Level','required');


		if($this->form_validation->run() == false){

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pengguna_edit', $data);
            $this->load->view('templates/footer');

        } else {
            $newPassword = $this->input->post('password');
    
            // Cek apakah password baru diisi
            if (empty($newPassword)) {
                // Jika tidak diisi, gunakan password yang ada dalam database
                $data = [
                    'name' => $this->db->escape_str($this->input->post('fullname', true)),
                    'username' => $this->db->escape_str($this->input->post('username', true)),
                    'level' => $this->db->escape_str($this->input->post('level', true))
                ];
            } else {
                // Jika diisi, gunakan password baru yang diinput oleh pengguna
                $data = [
                    'name' => $this->db->escape_str($this->input->post('fullname', true)),
                    'username' => $this->db->escape_str($this->input->post('username', true)),
                    'password' => $this->db->escape_str(password_hash($newPassword, PASSWORD_DEFAULT)),
                    'level' => $this->db->escape_str($this->input->post('level', true))
                ];
            }
    
            // Update data pengguna di database
            $this->db->where('id', $this->input->post('z'));
            $this->db->update('user', $data);
            $this->session->set_flashdata('flash', 'Data Pengguna Berhasil Diubah');
            redirect('admin/pengguna');
        }
    }
    
    public function PenggunaDelete($id){

        $this->Admin_model->penggunadelete($id);
        $this->session->set_flashdata('flash', 'Data Pengguna Berhasil Dihapus');
        redirect('admin/pengguna');
	

	}

}
