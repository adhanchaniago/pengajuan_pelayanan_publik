<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->model('model_user');
		// $this->load->model('model_dashboard');
	}

	public function index()
	{
		$ambil_jawaban = $this->db->query("SELECT * FROM tb_coba");
		foreach ($ambil_jawaban ->result_array() as $row){
	        $A = $row['A'];
			$B = $row['B'];
			$C = $row['C'];
			$D = $row['D'];
			$E = $row['E'];
			$F = $row['F'];
			$G = $row['G'];
			$H = $row['H'];
			$I = $row['I'];
			$J = $row['J'];
			$K = $row['K'];
			$L = $row['L'];
			$M = $row['M'];
			$N = $row['N'];
			$O = $row['O'];
			$P = $row['P'];
			$Q = $row['Q'];
			$R = $row['R'];
			$S = $row['S'];
			$T = $row['T'];

			// kriteria Kualitas Baik
			// rule 1
			if($A != "" && $K != "" && $Q != ""){
				$E = 'E'; 
			}

			// rule 2
			if($C != "" && $M != "" && $O != ""){
				$G = 'G';
			}

			// rule 3
			if($L != "" && $I != ""){
				$S = 'S';
			}

			// rule 2
			if($M != "" && $S != "" && $K != ""){
				$Q = 'Q';
			}

			// rule 2
			if($E != "" && $G != "" && $S != "" && $K != ""){
				$X = 'X';
				echo "Kualitas Baik <br>";
			}
		}


		$ambil_jawaban = $this->db->query("SELECT * FROM tb_coba");
		foreach ($ambil_jawaban ->result_array() as $row){
	        $A = $row['A'];
			$B = $row['B'];
			$C = $row['C'];
			$D = $row['D'];
			$E = $row['E'];
			$F = $row['F'];
			$G = $row['G'];
			$H = $row['H'];
			$I = $row['I'];
			$J = $row['J'];
			$K = $row['K'];
			$L = $row['L'];
			$M = $row['M'];
			$N = $row['N'];
			$O = $row['O'];
			$P = $row['P'];
			$Q = $row['Q'];
			$R = $row['R'];
			$S = $row['S'];
			$T = $row['T'];

			// kriteria Kualitas Sedang
			// rule 1
			if($A != "" && $K != "" && $Q != ""){
				$E = 'E'; 
			}

			// rule 2
			if($C != "" && $M != "" && $O != ""){
				$G = 'G';
			}

			// rule 3
			if($K != "" && $I != ""){
				$S = 'S';
			}

			// rule 2
			if($M != "" && $S != "" && $K != ""){
				$Q = 'Q';
			}

			// rule 2
			if($E != "" OR $G != "" OR $S != "" OR $K != ""){
				$X = 'X';
				echo "Kualitas Sedang <br>";
			}
		}


		$ambil_jawaban = $this->db->query("SELECT * FROM tb_coba");
		foreach ($ambil_jawaban ->result_array() as $row){
	        $A = $row['A'];
			$B = $row['B'];
			$C = $row['C'];
			$D = $row['D'];
			$E = $row['E'];
			$F = $row['F'];
			$G = $row['G'];
			$H = $row['H'];
			$I = $row['I'];
			$J = $row['J'];
			$K = $row['K'];
			$L = $row['L'];
			$M = $row['M'];
			$N = $row['N'];
			$O = $row['O'];
			$P = $row['P'];
			$Q = $row['Q'];
			$R = $row['R'];
			$S = $row['S'];
			$T = $row['T'];
			// kriteria Kualitas Biasa
			// rule 1
			if($B != "" && $L != "" && $R != ""){
				$F = 'F'; 
			}

			// rule 2
			if($D != "" && $N != "" && $P != ""){
				$H = 'H';
			}

			// rule 3
			if($L != "" && $J != ""){
				$T = 'T';
			}

			// rule 2
			if($N != "" && $T != "" && $L != ""){
				$R = 'R';
			}

			// rule 2
			if($F != "" && $H != "" && $T != "" && $R != ""){
				echo "Kualitas Biasa";
			}
	    }  
	}

}
