<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		/* if(!$this->session->userdata('logged_in')){
			redirect('login');
		} */
		$this->load->model('order_model');
		$this->load->helper('menu');
		$this->load->model('profile_model');
	}
	
	public function index(){
		$data['judul']				= "My Profile";
		$data['data_message']			= $this->profile_model->load_message();
		$data['new_message']			= $this->profile_model->new_message();
		$this->load->view('profile/index',$data);
	}
	
	public function load(){
		$data['judul']				= "My Profile";
		$data['data_message']			= $this->profile_model->load_message_all();
		$this->load->view('profile/load',$data);
	}
	
	public function save(){
		$param = $this->input->post();
		$param['datetime'] = date('Y-m-d H:i:s');
		$param['view'] = 1;
		$this->profile_model->save($param);
		$param['datetime'] = date('d M Y H:i:s',strtotime($param['datetime']));
		echo json_encode($param);
	}
	
	public function experience(){
		$this->load->view('profile/experience' );
	}
	
	public function education(){
		$this->load->view('profile/education' );
	}
	
	public function skills(){
		$this->load->view('profile/skills' );
	}
	
	public function galery(){
		$this->load->view('profile/galery' );
	}
	
	public function draw1(){
		$this->load->view('profile/draw1' );
	}
	
	public function draw2(){
		$this->load->view('profile/draw2' );
	}
	
	public function draw3(){
		$this->load->view('profile/draw3' );
	}
	
	public function draw4(){
		$this->load->view('profile/draw4' );
	}
	
	public function draw5(){
		$this->load->view('profile/draw5' );
	}
}