<?php 
 
class Model_variabel extends CI_Model{	

	public function data_variabel() {
		$data = $this->db->query('SELECT * FROM tb_variabel ORDER BY id ASC');
		return $data->result();
	}

    public function simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function hapus($table,$where){
        return $this->db->delete($table,$where);
    }

    public function edit($where= "") {
        $data = $this->db->query('SELECT * FROM tb_variabel '.$where);
        return $data->result();
    }

    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('tb_variabel',$data);
    }
}