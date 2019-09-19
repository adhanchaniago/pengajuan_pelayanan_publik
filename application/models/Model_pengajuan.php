<?php 
 
class Model_pengajuan extends CI_Model{	

    public function data_kecamatan() {
        $data = $this->db->query('SELECT * FROM tb_kecamatan ORDER BY id ASC');
        return $data->result();
    }

    public function data_kriteria() {
        $data = $this->db->query('SELECT * FROM tb_kriteria ORDER BY id ASC');
        return $data->result();
    }

    public function all_data_pengajuan() {
        $data = $this->db->query('SELECT tb_user.`nama_lengkap`, tb_pengajuan.*, tb_kecamatan.`kecamatan`, tb_kriteria.`kriteria` FROM tb_pengajuan
            JOIN tb_user ON tb_pengajuan.`email` = tb_user.`email`
            JOIN tb_kecamatan ON tb_pengajuan.`kode_kecamatan` = tb_kecamatan.`kode_kecamatan`
            JOIN tb_kriteria ON  tb_pengajuan.`kode_kriteria` = tb_kriteria.`kode_kriteria` ');
        return $data->result();
    }

    public function data_pengajuan($where= "") {
        $data = $this->db->query('SELECT tb_user.`nama_lengkap`, tb_pengajuan.*, tb_kecamatan.`kecamatan`, tb_kriteria.`kriteria` FROM tb_pengajuan
            JOIN tb_user ON tb_pengajuan.`email` = tb_user.`email`
            JOIN tb_kecamatan ON tb_pengajuan.`kode_kecamatan` = tb_kecamatan.`kode_kecamatan`
            JOIN tb_kriteria ON  tb_pengajuan.`kode_kriteria` = tb_kriteria.`kode_kriteria` '.$where);
        return $data->result();
    }

    public function data_pesan($where= "") {
        $data = $this->db->query('SELECT tb_admin.`nama_lengkap` AS nama_admin, tb_user.`nama_lengkap` AS nama_user, tb_pesan.* FROM tb_pesan
            LEFT JOIN tb_admin ON tb_pesan.`user` = tb_admin.`username`
            LEFT JOIN tb_user ON tb_pesan.`user` = tb_user.`email` '.$where.' ORDER BY tb_pesan.`id` ASC');
        return $data->result();
    }

    public function simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function hapus($table,$where){
        return $this->db->delete($table,$where);
    }

    public function edit($where= "") {
        $data = $this->db->query('SELECT * FROM tb_pengajuan '.$where);
        return $data->result();
    }

    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('tb_pengajuan',$data);
    }

}