<?php 
 
class Model_dashboard extends CI_Model{	

	public function total_user() {
		$data = $this->db->query('SELECT * FROM tb_user')->num_rows();
		return $data;
	}

    public function total_variabel() {
        $data = $this->db->query('SELECT * FROM tb_variabel')->num_rows();
        return $data;
    }

    public function total_pertanyaan() {
        $data = $this->db->query('SELECT * FROM tb_pertanyaan')->num_rows();
        return $data;
    }

    public function total_kriteria() {
        $data = $this->db->query('SELECT * FROM tb_kriteria')->num_rows();
        return $data;
    }

    public function total_target() {
        $data = $this->db->query('SELECT * FROM tb_target')->num_rows();
        return $data;
    }

}