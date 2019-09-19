<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_kriteria');
		
	}

	public function index()
	{
		$cek_kode = $this->db->query("SELECT max(kode_kriteria) as maxKode FROM tb_kriteria");
		foreach ($cek_kode ->result_array() as $row){
	        $kode   = $row['maxKode'];
	        $noUrut = (int) substr($kode, 2, 2);
				$noUrut++;
			$kode_karakter = "KT";
			$kode 		   = $kode_karakter . sprintf("%02s", $noUrut);
			$data['kode_kriteria'] = $kode;

			$data['data_kriteria'] = $this->model_kriteria->data_kriteria();
			$this->load->view('admin/kriteria/kriteria', $data);
	    }   
	}

	public function simpan(){
  		$data = array(
		      'kode_kriteria' => $this->input->post('kode_kriteria'),
		      'kriteria' => $this->input->post('kriteria'),
		);

		$simpan  = $this->model_kriteria->simpan('tb_kriteria', $data);
		if($simpan){
			header('location:'.base_url().'admin/kriteria');
		    $this->session->set_flashdata("pesan", "tambah");
		}
  	}

  	public function hapus($kode_id = 0){
	    $result = $this->model_kriteria->hapus('tb_kriteria',array('id' => $kode_id));

	    if($result ==  1){
	    header('location:'.base_url().'admin/kriteria');
	    $this->session->set_flashdata("pesan", "hapus");
		}
	}

	public function edit($id = 0){
	    $data['data_kriteria'] = $this->model_kriteria->edit("WHERE id = '$id'");
        $this->load->view('admin/kriteria/edit',$data);
  	}

  	public function update(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kode_kriteria' => $this->input->post('kode_kriteria'),
	      'kriteria' => $this->input->post('kriteria'),
	    );
	    $res = $this->model_kriteria->update($data);
	    if($res=1){
		      header('location:'.base_url().'admin/kriteria');
		      $this->session->set_flashdata("pesan", "update");
	    }
	}

}
