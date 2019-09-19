<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('model_login');
		$this->load->model('model_user');	}

	public function index()
	{
		$data['data_kriteria']   = $this->model_login->data_kriteria();
		$this->load->view('user/dashboard/index', $data);
	}

	public function admin()
	{
		$this->load->view('login');
	}

	public function cek_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$enc_password = md5($password); 
		$where = array(
			'username' => $username,
			'password' => $enc_password
		);

		$cek = $this->model_login->cek_user("tb_admin", $where)->num_rows();
		if($cek > 0){
			$data_user = $this->db->query("SELECT * FROM tb_admin WHERE username = '$username' AND password = '$enc_password';");
			foreach ($data_user ->result_array() as $row){
	       		$username      = $row['username'];
	       		$nama          = $row['nama_lengkap'];

				$data_session = array(
					'username' => $username,
					'nama' => $nama,
					'status' => "login"
				);
			}
 			
 			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata($data_session);
			redirect(base_url("admin/dashboard"));
 
		}else{
			header('location:'.base_url().'login');
			$this->session->set_flashdata("pesan","gagal");
		}
	}

	public function cek_login_user()
	{
		$email    = $this->input->post('email');
		$password = $this->input->post('password');
		$enc_password = md5($password); 
		$where = array(
			'email' => $email,
			'password' => $enc_password
		);

		$cek = $this->model_login->cek_user("tb_user", $where)->num_rows();
		if($cek > 0){
			$data_user = $this->db->query("SELECT * FROM tb_user WHERE email = '$email' AND password = '$enc_password';");
			foreach ($data_user ->result_array() as $row){
	       		$email   = $row['email'];
	       		$nama    = $row['nama_lengkap'];

				$data_session = array(
					'email' => $email,
					'nama' => $nama,
					'status' => "login"
				);
			}
 			
 			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata($data_session);
			redirect(base_url("user/dashboard"));
 
		}else{
			header('location:'.base_url().'login');
			$this->session->set_flashdata("pesan","gagal");
		}
	}

	public function proses_daftar(){
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		$this->form_validation->set_rules('konf_password','Konfirmasi Password','required|min_length[6]|matches[password]');
 
		if($this->form_validation->run() != false){
			$nama 	  = $this->input->post('nama');
			$email    = $this->input->post('email');
			$password = md5($this->input->post('password'));

			$cek_email = $this->db->query("SELECT * FROM tb_user WHERE email = '$email';")->num_rows();
			if($cek_email > 0){
				header('location:'.base_url().'login');
				$this->session->set_flashdata("pesan", "email_ada");
			}else{
				$data = array(
			      'nama_lengkap' => $nama,
			      'email' => $email,
			      'password' => $password,
			    );
				$simpan  = $this->model_login->simpan('tb_user', $data);

			    if($simpan){
					header('location:'.base_url().'login');
				    $this->session->set_flashdata("pesan", "daftar_suskes");
				}
			}

		}else{
			$this->load->view('user/dashboard/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url());
	}

	public function logout_user()
	{
		$this->session->sess_destroy();
		header('location:'.base_url());
	}
}
