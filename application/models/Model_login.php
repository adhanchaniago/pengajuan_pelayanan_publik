<?php 
 
class Model_login extends CI_Model{	

	public function cek_user($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function data_user($where= "") {
		$data = $this->db->query('SELECT * From user '.$where);
		return $data->result();
	}

	public function simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function data_kriteria() {
        $data = $this->db->query('SELECT * From tb_kriteria');
        return $data->result();
    }
}