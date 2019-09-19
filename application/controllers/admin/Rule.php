<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_rule');
		
	}

	public function index()
	{
		$data['data_rule'] = $this->model_rule->data_rule();
		$this->load->view('admin/rule/rule', $data);
	}

	public function tambah()
	{
		$cek_kode = $this->db->query("SELECT max(kode_rule) as maxKode FROM tb_rule");
		foreach ($cek_kode ->result_array() as $row){
	        $kode   = $row['maxKode'];
	        $noUrut = (int) substr($kode, 1, 2);
				$noUrut++;
			$kode_karakter = "R";
			$kode 		   = $kode_karakter . sprintf("%02s", $noUrut);
			$data['kode_rule'] = $kode;

			$data['data_variabel']        = $this->model_rule->data_variabel();
			$data['data_variabel_khusus'] = $this->model_rule->data_variabel_khusus();
			$this->load->view('admin/rule/tambah', $data);
		}
	}


	public function simpan(){
  // 		$data = array(
		//       'kode_rule' => $this->input->post('kode_rule'),
		//       'rule' => $this->input->post('new_rule'),
		//       'target' => $this->input->post('kategori_target'),
		// );

		// $rule = $this->input->post('new_rule')

  		$rule        = "if B and D or E then R";
  		$jumlah      = strlen($rule);
  		$sub_kalimat = substr($rule, $jumlah-1, 1);
  		$simbol = "$";
  		$then   = "$simbol$sub_kalimat= '$sub_kalimat'";
  		$then1  = "{";
  		$then2  = "};";

  		$maka   = $then1.$then.$then2; 

  		$rule = str_replace(" ", "", $rule);
  		$rule = str_replace("if", "if( $", $rule);
  		$rule = str_replace("and", " != '' and $", $rule);
  		$rule = str_replace("or", " != '' or $", $rule);
  		$rule = str_replace("then", " != '')", $rule);

  		$rule_sebagian = $rule;
  		$jumlah_2      = strlen($rule_sebagian);

  		$sub_kalimat2 = substr($rule_sebagian, 0, $jumlah_2-1);

  		$rule_lengkap = $sub_kalimat2.$maka;

  		echo "rule awal: if B and D or E then R <br>";
  		echo "rule akhir: $rule_lengkap <br>";

  		// echo "harus nya : if(A != '')M 'E'";

  		// if($A != "" && $K != "" && $Q != ""){ $E = 'E'; }

		// $simpan  = $this->model_rule->simpan('tb_rule', $data);
		// if($simpan){
		// 	header('location:'.base_url().'admin/rule');
		//     $this->session->set_flashdata("pesan", "tambah");
		// }
  	}

  	public function hapus($kode_id = 0){
	    $result = $this->model_rule->hapus('tb_rule',array('id' => $kode_id));

	    if($result ==  1){
	    header('location:'.base_url().'admin/rule');
	    $this->session->set_flashdata("pesan", "hapus");
		}
	}

	public function edit($id = 0){
	    $data['data_rule'] = $this->model_rule->edit("WHERE id = '$id'");
        $this->load->view('admin/rule/edit',$data);
  	}

  	public function update(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'kode_rule' => $this->input->post('kode_rule'),
	      'rule' => $this->input->post('rule'),
	    );
	    $res = $this->model_rule->update($data);
	    if($res=1){
		      header('location:'.base_url().'admin/rule');
		      $this->session->set_flashdata("pesan", "update");
	    }
	}

}
