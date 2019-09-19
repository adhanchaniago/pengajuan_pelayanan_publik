<?php 
 
class Model_kriteria extends CI_Model{	

	public function data_kriteria() {
		$data = $this->db->query('SELECT * FROM tb_kriteria ORDER BY id ASC');
		return $data->result();
	}

    public function simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function hapus($table,$where){
        return $this->db->delete($table,$where);
    }

    public function edit($where= "") {
        $data = $this->db->query('SELECT * FROM tb_kriteria '.$where);
        return $data->result();
    }

    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('tb_kriteria',$data);
    }

    public function kode_variabel() {
        $data = $this->db->query('SELECT DISTINCT(kode_variabel) AS kode FROM tb_variabel ORDER BY kode_variabel ASC');
        return $data->result();
    }
}