<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_pertanyaan');
		
	}

	public function index()
	{
		$data['data_pertanyaan'] = $this->model_pertanyaan->data_pertanyaan();
		$data['kode_variabel'] = $this->model_pertanyaan->kode_variabel();
		$this->load->view('admin/pertanyaan/pertanyaan', $data);
	}

	public function simpan(){
  		$data = array(
		      'kode_pertanyaan' => $this->input->post('kode_pertanyaan'),
		      'pertanyaan' => $this->input->post('pertanyaan'),
		      'inisialisasi' => $this->input->post('inisialisasi'),
		      'jawaban' => $this->input->post('jawaban'),
		);

		$simpan  = $this->model_pertanyaan->simpan('tb_pertanyaan', $data);
		if($simpan){
			header('location:'.base_url().'admin/pertanyaan');
		    $this->session->set_flashdata("pesan", "tambah");
		}
  	}

  	public function hapus($kode_id = 0){
	    $result = $this->model_pertanyaan->hapus('tb_pertanyaan',array('id' => $kode_id));

	    if($result ==  1){
	    header('location:'.base_url().'admin/pertanyaan');
	    $this->session->set_flashdata("pesan", "hapus");
		}
	}

	public function edit($id = 0){
	    $data['data_pertanyaan'] = $this->model_pertanyaan->edit("WHERE id = '$id'");
        $this->load->view('admin/pertanyaan/edit',$data);
  	}

  	public function update(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kode_variabel' => $this->input->post('kode_variabel'),
	      'pertanyaan' => $this->input->post('pertanyaan'),
	    );
	    $res = $this->model_pertanyaan->update($data);
	    if($res=1){
		      header('location:'.base_url().'admin/pertanyaan');
		      $this->session->set_flashdata("pesan", "update");
	    }
	}

}
