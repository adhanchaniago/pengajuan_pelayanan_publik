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
		$data['data_kriteria']  = $this->model_pengajuan->data_kriteria();
		$data['data_kecamatan'] = $this->model_pengajuan->data_kecamatan();
		$this->load->view('user/pengajuan/pengajuan', $data);
	}

	public function simpan(){
		$email = $this->session->email;

		$config['max_size']=10048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'assets/pengajuan';

        $this->load->library('upload');
        $this->upload->initialize($config);
    	$this->upload->do_upload('file');
        $data = array('upload_data' => $this->upload->data());
        $filename=$data['upload_data']['file_name'];
	    $pathinfo = 'assets/pengajuan/'.$filename;

  		$data = array(
		      'email' => $email,
		      'foto' => $pathinfo,
		      'kode_kecamatan' => $this->input->post('kode_kecamatan'),
		      'kode_kriteria' => $this->input->post('kode_kriteria'),
		      'lokasi' => $this->input->post('lokasi'),
		      'lat' => $this->input->post('lat'),
		      'lng' => $this->input->post('lng'),
		      'deskripsi' => $this->input->post('deskripsi'),
		);

		$simpan  = $this->model_pengajuan->simpan('tb_pengajuan', $data);
		if($simpan){
			header('location:'.base_url().'user/pengajuan');
		    $this->session->set_flashdata("pesan", "tambah");
		}
  	}

  	public function status()
	{
		$email = $this->session->email;
		$data['data_pengajuan']  = $this->model_pengajuan->data_pengajuan("WHERE tb_user.email = '$email'");

		$this->load->view('user/pengajuan/status', $data);
	}

	public function lihat($id = 0){
	    $data['data_pengajuan'] = $this->model_pengajuan->data_pengajuan("WHERE tb_pengajuan.id = '$id'");
	    $data['data_pesan']     = $this->model_pengajuan->data_pesan("WHERE tb_pesan.`id_pengajuan` = '$id'");

        $this->load->view('user/pengajuan/lihat',$data);
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
			header('location:'.base_url().'user/pengajuan/lihat/'.$id_pengajuan);
		    $this->session->set_flashdata("pesan", "kirim");
		}
  	}
}
