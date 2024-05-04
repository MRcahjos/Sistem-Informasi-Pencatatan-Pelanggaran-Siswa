<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{


public function fetch_subNamakelas($kelas){
		$this->db->where('kelas', $kelas);
		$this->db->order_by('nama', 'ASC');
		$query = $this->db->get('kelas');
		if($query->num_rows() > 0){

			$output = '<option value="A">Pilih Nama Kelas</option>';
			foreach($query->result() as $row){

				$output .= '<option value="'.$row->id.'">'.$row->nama.'</option>';

			}
		}elseif($query->num_rows() == 0){
			$output = '<option value="A" selected="selected">Pilih Kategori Kelas Terlebih Dahulu</option>';
		}

		return $output;
	}
	
	public function getKelas()
    {
       $query = "SELECT `siswa` .*, `kelas`.`nama_kls`
       FROM `siswa` JOIN `kelas`
       ON   `siswa`.`kelas_id` = `kelas`.`id`
	   ";
	   
	   
		return $this->db->query($query)->result_array();
				
	}
	
	public function delete($id)
    {
        $this->db->where('id', $id);

        $this->db->delete('guru');
    }
	
	public function delete_kelas($id)
    {
        $this->db->where('id', $id);

        $this->db->delete('kelas');
	}
	
	public function delete_siswa($id)
	{
		// Mendapatkan informasi siswa berdasarkan ID
		$siswa = $this->db->get_where('siswa', ['id' => $id])->row();
	
		if ($siswa) {
			// Mendapatkan semua pelanggaran siswa berdasarkan siswa_id
			$pelanggaran = $this->db->get_where('pelanggaran', ['siswa_id' => $siswa->id])->result();
	
			// Menghapus file gambar pelanggaran dan data pelanggaran terkait
			foreach ($pelanggaran as $p) {
				// Menghapus file gambar
				if (!empty($p->image)) {
					$file_path = './assets/upload/images/' . $p->image;
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
			
				// Menghapus data pelanggaran
				$this->db->delete('pelanggaran', ['pelanggaran_id' => $p->pelanggaran_id]);
			}
	
			// Menghapus data siswa
			$this->db->delete('siswa', ['id' => $id]);
	
			// Menghapus data wali siswa (jika ada)
			$this->db->delete('wali', ['siswa_id' => $id]);

			$this->db->delete('user', ['siswa_id' => $id]);
		}
	}
	
}