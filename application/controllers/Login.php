<?php if(!defined('BASEPATH')) exit('No directed script access allowed');
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('all_model');
	}
	public function index(){
		if(isset($this->error_massage)){
			$data = array(
			   'message' => $this->error_massage
			);
		}
		else {
			$data = array(
			   'message' => ''
			);
		}
		$this->load->view('viewLogin', $data);
	}
	
	public function laundry(){
		if(isset($this->error_massage)){
			$data = array(
			   'message' => $this->error_massage
			);
		}
		else {
			$data = array(
			   'message' => ''
			);
		}
		$this->load->view('viewLoginLaundry', $data);
	}
	
	public function macharone(){
		if(isset($this->error_massage)){
			$data = array(
			   'message' => $this->error_massage
			);
		}
		else {
			$data = array(
			   'message' => ''
			);
		}
		$this->load->view('viewLoginMacharone', $data);
	}
	
	public function login_kas(){
		if(isset($this->error_massage)){
			$data = array(
			   'message' => $this->error_massage
			);
		}
		else {
			$data = array(
			   'message' => ''
			);
		}
		$this->load->view('viewLoginKas', $data);
	}
	
	function login_check(){
		$data = array(
			'pn_uname' => $this->input->post('pn_name'),
			'pn_pass' => md5($this->input->post('pn_pass'))
		);
		$query = $this->login_model->check_login($data);
		//echo $this->db->last_query();exit;
		if($query->num_rows() > 0){
			$row = $query->row();
			$data = array(
				'pn_id' 	=> $row->pn_id,
				'pn_uname' 	=> $row->pn_uname,
				'pn_name' 	=> $row->pn_name,
				'pn_jabatan'=> $row->pn_jabatan,
				'pn_wilayah'=> $row->pn_wilayah,
				'pn_akses'	=> $row->pn_akses,
				'marketing'	=> $row->sts_marketing,
				'logged_in' => TRUE
			);  
			$this->session->set_userdata($data);
			$this->all_model->log_login($row->pn_id,$row->pn_uname,$row->pn_jabatan,$row->pn_wilayah);
			redirect('profile');
		}
		else{
			$this->error_massage = 'Wrong email or password!';
			$this->index();
		}
	}
	
	function login_check_laundry(){
		
		$data = array(
			'pn_uname' => $this->input->post('pn_name'),
			'pn_pass' => md5($this->input->post('pn_pass'))
		);
		$query = $this->login_model->check_login($data);
		if($query->num_rows() > 0){
			$row = $query->row();
			$data = array(
				'pn_id_laundry' 	=> $row->pn_id,
				'pn_uname_laundry' 	=> $row->pn_uname,
				'pn_name_laundry' 	=> $row->pn_name,
				'jabatan'  			=> $row->pn_jabatan,
				'pn_wilayah_laundry'=> $row->pn_wilayah,
				'pn_akses_laundry'	=> $row->pn_akses,
				'marketing_laundry'	=> $row->sts_marketing,
				'foto_laundry'	=> $row->foto,
				'alamat_laundry'	=> $row->alamat,
				'logged_in_laundry' => TRUE
			);  
			$this->session->set_userdata($data);
			$this->all_model->log_login($row->pn_id,$row->pn_uname,$row->pn_jabatan,$row->pn_wilayah);
			redirect('laundry');
		}
		else{
			$this->error_massage = 'Wrong email or password!';
			redirect('login/laundry');
		}
	}
	
	function login_check_macharone(){
		
		$data = array(
			'pn_uname' => $this->input->post('pn_name'),
			'pn_pass' => md5($this->input->post('pn_pass'))
		);
		$query = $this->login_model->check_login($data);
		if($query->num_rows() > 0){
			$row = $query->row();
			$data = array(
				'pn_id_macharone' 	=> $row->pn_id,
				'pn_uname_macharone' 	=> $row->pn_uname,
				'pn_name_macharone' 	=> $row->pn_name,
				'jabatan_macharone'  			=> $row->pn_jabatan,
				'pn_wilayah_macharone'=> $row->pn_wilayah,
				'pn_akses_macharone'	=> $row->pn_akses,
				'marketing_macharone'	=> $row->sts_marketing,
				'foto_macharone'	=> $row->foto,
				'alamat_macharone'	=> $row->alamat,
				'logged_in_macharone' => TRUE
			);  
			$this->session->set_userdata($data);
			$this->all_model->log_login($row->pn_id,$row->pn_uname,$row->pn_jabatan,$row->pn_wilayah);
			redirect('macharone');
		}
		else{
			$this->error_massage = 'Wrong email or password!';
			redirect('login/macharone');
		}
	}
	
	function login_check_kas(){
		
		$data = array(
			'pn_uname' => $this->input->post('pn_name'),
			'pn_pass' => md5($this->input->post('pn_pass'))
		);
		$query = $this->login_model->check_login($data);
		if($query->num_rows() > 0){
			$row = $query->row();
			$data = array(
				'pn_id_kas' 	=> $row->pn_id,
				'pn_uname_kas' 	=> $row->pn_uname,
				'pn_name_kas' 	=> $row->pn_name,
				'jabatan'  			=> $row->pn_jabatan,
				'pn_wilayah_kas'=> $row->pn_wilayah,
				'pn_akses_kas'	=> $row->pn_akses,
				'marketing_kas'	=> $row->sts_marketing,
				'foto_kas'	=> $row->foto,
				'alamat_kas'	=> $row->alamat,
				'logged_in_kas' => TRUE
			);  
			$this->session->set_userdata($data);
			$this->all_model->log_login($row->pn_id,$row->pn_uname,$row->pn_jabatan,$row->pn_wilayah);
			redirect('kas');
		}
		else{
			$this->error_massage = 'Wrong email or password!';
			redirect('login/kas');
		}
	}
		
	public function logout_laundry(){
		$this->session->sess_destroy();
		redirect('login/laundry');
	}
		
	public function logout_macharone(){
		$this->session->sess_destroy();
		redirect('login/macharone');
	}
		
	public function logout_kas(){
		$this->session->sess_destroy();
		redirect('login/kas');
	}
		
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}