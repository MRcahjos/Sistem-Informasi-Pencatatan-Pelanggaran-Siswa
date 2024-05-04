<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function edit($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);

        $this->db->delete('user_role');
	}
	
	public function penggunadelete($id)
    {
        $this->db->where('id', $id);

        $this->db->delete('user');
    }

    // =============================================================================================================================================


	public function get_point(){
		$query = "SELECT * FROM website";
		return $this->db->query($query)->row()->point;
	}

    public function website(){

		$query = "SELECT * FROM website";
		return $this->db->query($query)->row()->school_name;

	}

	public function getCountSiswa(){

		$query = "SELECT COUNT(nama) as siswa FROM siswa";
		return $this->db->query($query)->row()->siswa;

	}

	public function getCountTipePelanggaran(){

		$query = "SELECT COUNT(pelanggaran) as nmPelanggaran FROM ketegori";
		return $this->db->query($query)->row()->nmPelanggaran;

	}

	public function getCountUsers(){

		$query = "SELECT COUNT(username) as username FROM user";
		return $this->db->query($query)->row()->username;

	}

	public function getCountPelanggaranDashboard(){

		$query = "SELECT COUNT(pelanggaran_id) as pelanggaran FROM pelanggaran";
		return $this->db->query($query)->row()->pelanggaran;

	}

	public function getCountGuru(){

		$query = "SELECT COUNT(nik) as nik FROM guru";
		return $this->db->query($query)->row()->nik;

	}

	public function TopMurid(){

		$this->db->select('SUM(pelanggaran.point) as total_poin');
		$this->db->select('count(pelanggaran_id) as total_pelanggaran');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('pelanggaran.tipe_id');
		$this->db->select('siswa.nama');
		$this->db->select('siswa.nisn');
		$this->db->from('pelanggaran');
		$this->db->join('siswa','pelanggaran.siswa_id = siswa.id', 'left');
		$this->db->group_by('pelanggaran.siswa_id');
		$this->db->order_by('total_poin', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();

	}

	public function TopPelanggaran(){

		$this->db->select('pelanggaran_id');
		$this->db->select('count(pelanggaran_id) as total_pelanggaran');
		$this->db->select('pelanggaran.tipe_id');
		$this->db->select('ketegori.pelanggaran');
		$this->db->from('pelanggaran');
		$this->db->join('ketegori','pelanggaran.tipe_id = ketegori.id');
		$this->db->group_by('pelanggaran.tipe_id');
		$this->db->order_by('total_pelanggaran', 'desc');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();

	}

	public function getPelanggaranByID($id){

		$this->db->select('*');
		$this->db->select('pelanggaran_id as id_pelanggaran');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('kelas.id as id_kelas');
		// $this->db->select('guru.id as id_guru');
		$this->db->select('wali.id as id_wali');
		$this->db->select('ketegori.id as id_tipe_pelanggaran');
		$this->db->from('pelanggaran');
		$this->db->join('siswa','pelanggaran.siswa_id = siswa.id');
		$this->db->join('kelas','pelanggaran.class_id = kelas.id');
		// $this->db->join('guru','pelanggaran.guru_id = guru.id');
		$this->db->join('wali','pelanggaran.wali_id = wali.id');
		$this->db->join('ketegori','pelanggaran.tipe_id =ketegori.id');
		$this->db->where('siswa.id', $id);
		$query = $this->db->get();
		return $query->result();

	}
	public function getOnePelanggaranByID($id){


		$this->db->select('*');
		$this->db->select('pelanggaran_id as id_pelanggaran');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('kelas.id as id_kelas');
		// $this->db->select('guru.id as id_guru');
		$this->db->select('wali.id as id_wali');
		$this->db->select('ketegori.id as id_tipe_pelanggaran');
		$this->db->from('pelanggaran');
		$this->db->join('siswa','pelanggaran.siswa_id = siswa.id');
		$this->db->join('kelas','pelanggaran.class_id = kelas.id');
		// $this->db->join('guru','pelanggaran.guru_id = guru.id');
		$this->db->join('wali','pelanggaran.wali_id = wali.id');
		$this->db->join('ketegori','pelanggaran.tipe_id = ketegori.id');
		$this->db->where('siswa.id', $id);
		$query = $this->db->get();
		return $query->row();

	}

	public function getCountPelanggaran($id){

		$query = "SELECT COUNT(type_id) AS total_pelanggaran, SUM(point) AS total_point FROM tb_pelanggaran WHERE student_id = $id";
		return $this->db->query($query)->row();

	}


	public function getKategoriPelanggaran(){

		$query = "SELECT * FROM ketegori";
		return $this->db->query($query)->result();

	}

	public function getOneKategoriPelanggaran($id){

		$query = "SELECT * FROM ketegori WHERE id = '$id' ";
		return $this->db->query($query)->row();

	}

	public function getKelas(){

		$query = "SELECT * FROM kelas ";
		return $this->db->query($query)->result();

	}

	public function getOneKelas($id){

		$query = "SELECT * FROM kelas WHERE id = '$id'";
		return $this->db->query($query)->row();

	}

	public function getSiswa(){

		$query = "SELECT * FROM siswa";
		return $this->db->query($query)->result();

	}

	public function getOneSiswa($id){

		$this->db->select('*');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('kelas.id as id_kelas');
		$this->db->select('wali.id as id_wali');
		$this->db->select('wali.no_telp as phone_number_wali');
		$this->db->from('siswa');
		$this->db->join('kelas','siswa.kelas_id = kelas.id');
		$this->db->join('wali','siswa.id = wali.siswa_id');
		$this->db->where('siswa.id', $id);
		$query = $this->db->get();
		return $query->row();

	}

	public function getGuru(){

		$query = "SELECT * FROM guru";
		return $this->db->query($query)->result();

	}

	public function getOneGuru($id){

		$query = "SELECT * FROM guru WHERE id = '$id' ";
		return $this->db->query($query)->row();

	}

	public function getOneWali($id){

		$query = "SELECT * FROM wali WHERE siswa_id = '$id' ";
		return $this->db->query($query)->row();

	}

	public function getOnePelanggaran($pelanggaran_id) {

		$this->db->select('*');
		$this->db->select('pelanggaran.pelanggaran_id as id_pelanggaran');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('kelas.id as id_kelas');
		$this->db->select('pelanggaran.image as images');
		// $this->db->select('guru.id as id_guru');
		$this->db->select('wali.id as id_wali');
		$this->db->select('ketegori.id as id_tipe_pelanggaran');
		$this->db->from('pelanggaran');
		$this->db->join('siswa','pelanggaran.siswa_id = siswa.id');
		$this->db->join('kelas','pelanggaran.class_id = kelas.id');
		// $this->db->join('guru','pelanggaran.guru_id = guru.id');
		$this->db->join('wali','pelanggaran.wali_id = wali.id');
		$this->db->join('ketegori','pelanggaran.tipe_id = ketegori.id');
		
		$this->db->where('pelanggaran.pelanggaran_id', $pelanggaran_id);
		
		$query = $this->db->get();
		return $query->row();

	}

	public function getOnePelanggaranimage($pelanggaran_id) {

		$this->db->select('*');
		$this->db->select('pelanggaran.pelanggaran_id as id_pelanggaran');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('kelas.id as id_kelas');
		$this->db->select('pelanggaran.image as images');
		// $this->db->select('guru.id as id_guru');
		$this->db->select('wali.id as id_wali');
		$this->db->select('ketegori.id as id_tipe_pelanggaran');
		$this->db->from('pelanggaran');
		$this->db->join('siswa','pelanggaran.siswa_id = siswa.id');
		$this->db->join('kelas','pelanggaran.class_id = kelas.id');
		// $this->db->join('guru','pelanggaran.guru_id = guru.id');
		$this->db->join('wali','pelanggaran.wali_id = wali.id');
		$this->db->join('ketegori','pelanggaran.tipe_id = ketegori.id');
		
		$this->db->where('pelanggaran.pelanggaran_id', $pelanggaran_id);
		
		$query = $this->db->get();
		return $query->row();

	}

	public function getUsers(){

		$query = "SELECT * FROM user";
		return $this->db->query($query)->result();

	}

	public function getRole(){

		$query = "SELECT * FROM user_role";
		return $this->db->query($query)->result();

	}


	public function getOneUsers($id){

		$query = "SELECT * FROM user WHERE id = '$id' ";
		return $this->db->query($query)->row();

	}

	public function getOneWebsite($id){

		$query = "SELECT * FROM website WHERE id = '$id' ";
		return $this->db->query($query)->row();

	}

	public function updatePelanggaran($pelanggaran_id, $data)
    {
        $this->db->where('pelanggaran_id', $pelanggaran_id);
        $this->db->update('pelanggaran', $data);
    }

    public function getImageName($pelanggaran_id)
    {
        $this->db->select('image');
        $this->db->from('pelanggaran');
        $this->db->where('pelanggaran_id', $pelanggaran_id);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            return $result->image;
        }

        return false;
    }
}
