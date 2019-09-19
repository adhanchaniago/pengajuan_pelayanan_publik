<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_dashboard');
	}

	public function index()
	{
		$data['total_user']       = $this->model_dashboard->total_user();
		$data['total_variabel']   = $this->model_dashboard->total_variabel();
		$data['total_pertanyaan'] = $this->model_dashboard->total_pertanyaan();
		$data['total_kriteria']   = $this->model_dashboard->total_kriteria();
		$data['total_target']     = $this->model_dashboard->total_target();

		$this->load->view('user/dashboard/home', $data);
	}

}
