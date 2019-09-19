<?php 
 
class Model_profil extends CI_Model{	

    public function data_profil($where= "") {
        $data = $this->db->query('SELECT * From tb_admin '.$where);
        return $data->result();
    }

    public function ubah_password($data){
        $this->db->where('username',$data['username']);
        $this->db->update('tb_admin',$data);
    }

    public function ubah_profil($data){
        $this->db->where('username',$data['username']);
        $this->db->update('tb_admin',$data);
    }
}