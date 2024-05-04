<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
    public function getTambahGuru()
    {
        $query = "SELECT `kelas` .*, `guru`.`guru`
       FROM `kelas` JOIN `guru`
       ON   `kelas`.`wali_id` = `guru`.`id`
       ";

        return $this->db->query($query)->result_array();
    }
}