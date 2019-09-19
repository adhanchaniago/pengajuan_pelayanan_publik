<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_user');
		
	}

	public function index()
	{
		$data['data_user'] = $this->model_user->data_user();
		$this->load->view('admin/user/user', $data);
	}

	public function simpan(){
  		$data = array(
		      'kode_user' => $this->input->post('kode_user'),
		      'user' => $this->input->post('user'),
		);

		$simpan  = $this->model_user->simpan('tb_user', $data);
		if($simpan){
			header('location:'.base_url().'admin/user');
		    $this->session->set_flashdata("pesan", "tambah");
		}
  	}

  	public function hapus($kode_id = 0){
	    $result = $this->model_user->hapus('tb_user',array('id' => $kode_id));

	    if($result ==  1){
	    header('location:'.base_url().'admin/user');
	    $this->session->set_flashdata("pesan", "hapus");
		}
	}

	public function edit($id = 0){
	    $data['data_user'] = $this->model_user->edit("WHERE id = '$id'");
        $this->load->view('admin/user/edit',$data);
  	}

  	public function update(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kode_user' => $this->input->post('kode_user'),
	      'user' => $this->input->post('user'),
	    );
	    $res = $this->model_user->update($data);
	    if($res=1){
		      header('location:'.base_url().'admin/user');
		      $this->session->set_flashdata("pesan", "update");
	    }
	}

}
