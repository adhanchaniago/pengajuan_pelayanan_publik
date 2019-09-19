<?php 
 
class Model_v_khusus extends CI_Model{	

	public function data_v_khusus() {
		$data = $this->db->query('SELECT * FROM tb_variabel_khusus ORDER BY id ASC');
		return $data->result();
	}

    public function edit($where= "") {
        $data = $this->db->query('SELECT * FROM tb_variabel_khusus '.$where);
        return $data->result();
    }

    public function simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('tb_variabel_khusus',$data);
    }
}