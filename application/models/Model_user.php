<?php 
 
class Model_user extends CI_Model{	

	public function data_admin($where= "") {
		$data = $this->db->query('SELECT * From tb_admin '.$where);
		return $data->result();
	}

	public function ubah_profil($data){
        $this->db->where('username',$data['username']);
        $this->db->update('admin',$data);
    }

    public function ubah_password($data){
        $this->db->where('username',$data['username']);
        $this->db->update('admin',$data);
    }

    /// USER
    public function data_user($where= "") {
        $data = $this->db->query('SELECT * From tb_user '.$where);
        return $data->result();
    }
}