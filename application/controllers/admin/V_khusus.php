<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_khusus extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_v_khusus');
		
	}

	public function index()
	{
		$data['data_v_khusus'] = $this->model_v_khusus->data_v_khusus();
		$this->load->view('admin/v_khusus/v_khusus', $data); 
	}

	public function simpan(){
  		$data = array(
		      'variabel' => $this->input->post('v_khusus'),
		      'inisialisasi' => $this->input->post('inisialisasi'),
		      'jawaban' => $this->input->post('jawaban'),
		);

		$simpan  = $this->model_v_khusus->simpan('tb_variabel_khusus', $data);
		if($simpan){
			header('location:'.base_url().'admin/v_khusus');
		    $this->session->set_flashdata("pesan", "tambah");
		}
  	}

	public function edit($id = 0){
	    $data['data_v_khusus'] = $this->model_v_khusus->edit("WHERE id = '$id'");
        $this->load->view('admin/v_khusus/edit',$data);
  	}

  	public function update(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'variabel' => $this->input->post('v_khusus'),
	      'inisialisasi' => $this->input->post('inisialisasi'),
	      'jawaban' => $this->input->post('jawaban'),
	    );
	    $res = $this->model_v_khusus->update($data);
	    if($res=1){
		      header('location:'.base_url().'admin/v_khusus');
		      $this->session->set_flashdata("pesan", "update");
	    }
	}

}
