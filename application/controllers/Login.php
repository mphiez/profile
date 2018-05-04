<?php if(!defined('BASEPATH')) exit('No directed script access allowed');
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('all_model');
		if($this->session->userdata('logged_in')){
			redirect('dashboard');
		}
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
			redirect('dashboard');
		}
		else{
			$this->error_massage = 'Wrong email or password!';
			$this->index();
		}
	}
		
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}