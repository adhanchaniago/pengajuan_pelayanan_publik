<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Pengajuan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_pengajuan');
		
	}

	public function index()
	{
		$data['data_pengajuan'] = $this->model_pengajuan->all_data_pengajuan();
		$this->load->view('admin/pengajuan/pengajuan', $data);  
	}

	public function lihat($id = 0){
	    $data['data_pengajuan'] = $this->model_pengajuan->data_pengajuan("WHERE tb_pengajuan.id = '$id'");
	    $data['data_pesan']     = $this->model_pengajuan->data_pesan("WHERE tb_pesan.`id_pengajuan` = '$id'");

        $this->load->view('admin/pengajuan/lihat',$data);
  	}

  	public function download($id = ""){
  		$ambil_jawaban = $this->db->query("SELECT foto FROM tb_pengajuan WHERE id = $id");
		foreach ($ambil_jawaban ->result_array() as $row){
	        $foto = $row['foto'];
	    	force_download($foto, NULL);
	    }
  	}

  	public function kirim(){
  		$tanggal      = date('Y-m-d H:i:s');
  		$id_pengajuan = $this->input->post('id_pengajuan');
  		$data = array(
		      'id_pengajuan' => $this->input->post('id_pengajuan'),
		      'user' => $this->input->post('user'),
		      'pesan' => $this->input->post('pesan'),
		      'date_time' => $tanggal,
		);

		$simpan  = $this->model_pengajuan->simpan('tb_pesan', $data);
		if($simpan){
			header('location:'.base_url().'admin/pengajuan/lihat/'.$id_pengajuan);
		    $this->session->set_flashdata("pesan", "kirim");
		}
  	}

  	public function semua()
	{
		$data['data_pengajuan'] = $this->model_pengajuan->all_data_pengajuan();
		$this->load->view('admin/pengajuan/semua', $data);  
	}

}
