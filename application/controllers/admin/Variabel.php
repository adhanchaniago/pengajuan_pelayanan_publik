<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Variabel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_variabel');
		
	}

	public function index()
	{
		$data['data_variabel'] = $this->model_variabel->data_variabel();
		$this->load->view('admin/variabel/variabel', $data);
	}

	public function tambah()
	{
		$this->load->view('admin/variabel/tambah');
	}

	public function simpan(){
  		$data = array(
		      'kode_variabel' => $this->input->post('kode_variabel'),
		      'variabel' => $this->input->post('variabel'),
		      'inisialisasi' => $this->input->post('inisialisasi'),
		      'jawaban' => $this->input->post('jawaban'),
		);

		$simpan  = $this->model_variabel->simpan('tb_variabel', $data);
		if($simpan){
			header('location:'.base_url().'admin/variabel');
		    $this->session->set_flashdata("pesan", "tambah");
		}
  	}

  	public function hapus($kode_id = 0){
	    $result = $this->model_variabel->hapus('tb_variabel',array('id' => $kode_id));

	    if($result ==  1){
	    header('location:'.base_url().'admin/variabel');
	    $this->session->set_flashdata("pesan", "hapus");
		}
	}

	public function edit($id = 0){
	    $data['data_variabel'] = $this->model_variabel->edit("WHERE id = '$id'");
        $this->load->view('admin/variabel/edit',$data);
  	}

  	public function update(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kode_variabel' => $this->input->post('kode_variabel'),
	      'variabel' => $this->input->post('variabel'),
	      'inisialisasi' => $this->input->post('inisialisasi'),
	      'jawaban' => $this->input->post('jawaban'),
	    );
	    $res = $this->model_variabel->update($data);
	    if($res=1){
		      header('location:'.base_url().'admin/variabel');
		      $this->session->set_flashdata("pesan", "update");
	    }
	}

}
