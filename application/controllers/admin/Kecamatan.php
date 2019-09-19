<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_kecamatan');
		
	}

	public function index()
	{
		$cek_kode = $this->db->query("SELECT max(kode_kecamatan) as maxKode FROM tb_kecamatan");
		foreach ($cek_kode ->result_array() as $row){
	        $kode   = $row['maxKode'];
	        $noUrut = (int) substr($kode, 3, 2);
				$noUrut++;
			$kode_karakter = "KCT";
			$kode 		   = $kode_karakter . sprintf("%02s", $noUrut);
			$data['kode_kecamatan'] = $kode;

			$data['data_kecamatan'] = $this->model_kecamatan->data_kecamatan();
			$this->load->view('admin/kecamatan/kecamatan', $data);
	    }   
	}

	public function simpan(){
  		$data = array(
		      'kode_kecamatan' => $this->input->post('kode_kecamatan'),
		      'kecamatan' => $this->input->post('kecamatan'),
		);

		$simpan  = $this->model_kecamatan->simpan('tb_kecamatan', $data);
		if($simpan){
			header('location:'.base_url().'admin/kecamatan');
		    $this->session->set_flashdata("pesan", "tambah");
		}
  	}

  	public function hapus($kode_id = 0){
	    $result = $this->model_kecamatan->hapus('tb_kecamatan',array('id' => $kode_id));

	    if($result ==  1){
	    header('location:'.base_url().'admin/kecamatan');
	    $this->session->set_flashdata("pesan", "hapus");
		}
	}

	public function edit($id = 0){
	    $data['data_kecamatan'] = $this->model_kecamatan->edit("WHERE id = '$id'");
        $this->load->view('admin/kecamatan/edit',$data);
  	}

  	public function update(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kode_kecamatan' => $this->input->post('kode_kecamatan'),
	      'kecamatan' => $this->input->post('kecamatan'),
	    );
	    $res = $this->model_kecamatan->update($data);
	    if($res=1){
		      header('location:'.base_url().'admin/kecamatan');
		      $this->session->set_flashdata("pesan", "update");
	    }
	}

}
