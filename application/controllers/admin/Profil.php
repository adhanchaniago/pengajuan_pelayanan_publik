<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_profil');
		
	}

	public function index($id = 1){
	    $data['data_profil'] = $this->model_profil->data_profil("WHERE id = '$id'");
        $this->load->view('admin/profil/profil',$data);
  	}

  	public function update_password(){
	    $username            = $this->session->username;
	    $password_lama       = md5($this->input->post('password_lama'));
	    $password_baru       = $this->input->post('password_baru');
	    $konfirmasi_password = $this->input->post('konfirmasi_password');

	    $enc_password_baru  = md5($password_baru); 
	    //cek password
	    $data_password = $this->db->query("SELECT password FROM tb_admin WHERE username = '$username';");
		foreach ($data_password ->result_array() as $row){
	        $password      = $row['password'];
			
			if($password == $password_lama){
				if($password_baru == $konfirmasi_password){
		    		$data = array(
				      'username' => $username,
				      'password' => $enc_password_baru,
				    );

				    $res = $this->model_profil->ubah_password($data);
				    if($res=1){
					    header('location:'.base_url().'login');
					    $this->session->set_flashdata("pesan", "ubah_password");
				    }
				}else{
					header('location:'.base_url().'admin/profil');
					$this->session->set_flashdata("pesan", "konfirmasi_salah");
				}
		    }else{
		    	header('location:'.base_url().'admin/profil');
				$this->session->set_flashdata("pesan", "tidak_sama");
		    }

	    }
	}


	public function update_profil(){
	    $username            = $this->session->username;
	    $username_lama       = $this->input->post('username_lama');
	    $username_baru       = $this->input->post('username_baru');
	    $nama_lengkap        = $this->input->post('nama_lengkap');

		if($username_lama == $username_baru){
    		$data = array(
		      'username' => $username_lama,
		      'nama_lengkap' => $nama_lengkap,
		    );

		    $res = $this->model_profil->ubah_profil($data);
		    if($res=1){
			    header('location:'.base_url().'login');
			    $this->session->set_flashdata("pesan", "ubah_profil");
		    }
	    }else{
	    	$data = array(
		      'username' => $username_baru,
		      'nama_lengkap' => $nama_lengkap,
		    );

		    $res = $this->model_profil->ubah_profil($data);
		    if($res=1){
			    header('location:'.base_url().'login');
			    $this->session->set_flashdata("pesan", "ubah_profil");
		    }
	    }
	}

}
