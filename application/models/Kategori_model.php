<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    public function getKategoriPelanggaran(){

		$query = "SELECT * FROM ketegori";
		return $this->db->query($query)->result();

	}


    public function getGuru(){

		$query = "SELECT * FROM guru";
		return $this->db->query($query)->result();

	}

    public function getOneKategoriPelanggaran($id){

		$query = "SELECT * FROM ketegori WHERE id = '$id' ";
		return $this->db->query($query)->row();

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

    public function getOneWali($id){

		$query = "SELECT * FROM wali WHERE siswa_id = '$id' ";
		return $this->db->query($query)->row();

	}


	function get_all_pelanggaran_data($pelanggran_id = null) {
		$this->db->select('*');
		$this->db->select('siswa.id as id_siswa');
		$this->db->select('kelas.id as id_kelas');
		// $this->db->select('pelanggaran.id as id_pelanggaran');
		$this->db->from('pelanggaran');			
		$this->db->join('kelas', 'kelas.id = pelanggaran.class_id');
		$this->db->join('siswa', 'pelanggaran.siswa_id = siswa.id');		
		if($pelanggran_id != null) {
			$this->db->where('id_pelanggaran', $pelanggran_id);
		}
		$query = $this->db->get();
		return $query->result_array();		

	}

	function get_pelanggaran(){

		$query = "SELECT * FROM pelanggaran";
		return $this->db->query($query)->result_array();

		

	}

	public function getSiswa(){

		$query = "SELECT * FROM siswa";
		return $this->db->query($query)->result();

	}

	public function getKelas(){

		$query = "SELECT * FROM kelas ";
		return $this->db->query($query)->result();

	}

	public function edit_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
	}
	
	public function delete($id)
    {
        $this->db->where('id', $id);
		
        $this->db->delete('ketegori');
    }

	
}