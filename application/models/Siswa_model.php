<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {


	public function website(){

		$query = "SELECT * FROM website";
		return $this->db->query($query)->row()->school_name;

	}


	public function getOneSiswa($nisn){

		$this->db->select('*');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('kelas.id as id_kelas');
		$this->db->select('wali.id as id_wali');
		$this->db->select('wali.no_telp as phone_number_wali');
		$this->db->from('siswa');
		$this->db->join('kelas','siswa.kelas_id = kelas.id');
		$this->db->join('wali','siswa.id = wali.siswa_id');
		$this->db->where('siswa.nisn', $nisn);
		$query = $this->db->get();
		return $query->row();
	}

	public function getPelanggaranByNiSN($nisn = null){


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
		if($nisn != null) {
		$this->db->where('siswa.nisn', $nisn);
		}
		$query = $this->db->get();
		return $query->result();

	}

	public function getCountPelanggaran($id){

		$query = "SELECT COUNT(tipe_id) AS total_pelanggaran, SUM(point) AS total_point FROM pelanggaran WHERE siswa_id = $id";
		return $this->db->query($query)->row();

	}

	public function getOnePelanggaran($id){


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
	
}