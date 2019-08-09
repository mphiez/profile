<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Macharone extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_macharone')){
			redirect('login/macharne');
		}
		$this->load->model('order_model');
		$this->load->helper('menu');
		$this->load->model('macharone_model');
	}
	
	public function index(){
		$data['judul']				= "My Profile";
		//$data['data_message']			= $this->profile_model->load_message();
		//$data['new_message']			= $this->profile_model->new_message();
		$this->load->view('macharone/index',$data);
	}
	
	public function onprogres(){
		$data['onprogres']			= $this->macharone_model->onprogres();
		$this->load->view('macharone/onprogres',$data);
	}
	
	public function load_transaksi(){
		$id = $this->input->post('id');
		$data = $this->macharone_model->onprogres($id);
		echo json_encode($data);
	}
	
	public function information(){
		$data['onprogres']			= $this->macharone_model->onprogres();
		$this->load->view('macharone/information',$data);
	}
	
	public function setting(){
		$sid = $this->session->userdata('pn_id_macharone');
		if($this->input->post('pn_id')){
			$sid = $this->input->post('pn_id');
		}
		$data['onprogres']			= $this->macharone_model->user($sid);
		$this->load->view('macharone/setting',$data);
	}
	
	public function mail(){
		$sid = $this->session->userdata('pn_id_macharone');
		if($this->input->post('pn_id')){
			$sid = $this->input->post('pn_id');
		}
		$data['onprogres']			= $this->macharone_model->mail($sid);
		$this->macharone_model->read_mail($sid);
		//echo $this->db->last_query();
		$this->load->view('macharone/mail',$data);
	}
	
	public function new_mail(){
		$sid = $this->session->userdata('pn_id_macharone');
		if($this->input->post('pn_id')){
			$sid = $this->input->post('pn_id');
		}
		$data['onprogres']			= $this->macharone_model->new_mail($sid);
		$this->macharone_model->read_mail($sid);
		echo json_encode($data);
	}
	
	public function list_mail(){
		$data['onprogres']			= $this->macharone_model->list_mail();
		$data['all']			= $this->macharone_model->all_mail();
		$this->load->view('macharone/list_mail',$data);
	}
	
	public function create_new_mail(){
		$data['user']			= $this->macharone_model->get_list_user();
		$this->load->view('macharone/new_mail',$data);
	}
	
	public function notification(){
		$data['onprogres']			= $this->macharone_model->notification();
		$this->macharone_model->read_notif();
		$this->load->view('macharone/notification',$data);
	}
	
	public function paket(){
		$data['onprogres']			= $this->macharone_model->paket();
		$this->load->view('macharone/paket',$data);
	}
	
	public function transaksi(){
		$data['onprogres']			= $this->macharone_model->transaksi();
		$this->load->view('macharone/transaksi',$data);
	}
	
	public function user(){
		$data['onprogres']			= $this->macharone_model->user();
		$this->load->view('macharone/user',$data);
	}
	
	public function create(){
		$data['onprogres']			= $this->macharone_model->paket();
		$this->load->view('macharone/create',$data);
	}
	
	public function timeline(){
		$data['onprogres']			= $this->macharone_model->transaksi();
		$this->load->view('macharone/timeline',$data);
	}
	
	public function create_user(){
		$this->load->view('macharone/timeline',$data);
	}
	
	public function update_user(){
		$sid = $this->input->post('id');
		$data['onprogres']			= $this->macharone_model->transaksi();
		$this->load->view('macharone/timeline',$data);
	}
	
	public function do_user(){
		$data['onprogres']			= $this->macharone_model->transaksi();
		$this->load->view('macharone/timeline',$data);
	}
	
	public function do_transaksi(){
		$data['onprogres']			= $this->macharone_model->transaksi();
		$this->load->view('macharone/timeline',$data);
	}	
	
	public function send_message(){
		$param = $this->input->post();
		$param['user_id'] = $this->session->userdata('pn_id_macharone');
		$param['datetime'] = date('Y-m-d H:i:s');
		$param['status'] = 0;
		$param['perihal'] = 'pertanyaan';
		$param['replay'] = 1;
		if($this->input->post('pn_id')){
			$param['user_id'] = $this->input->post('pn_id');
			$param['status'] = 0;
			$param['perihal'] = 'jawaban';
			$param['replay'] = 0;
		}
		unset($param['pn_id']);
		$this->macharone_model->send_message($param);
		echo json_encode($param);
	}
	
	public function tot_message(){
		echo $this->macharone_model->tot_message();
	}
	
	public function tot_notif(){
		$pesan = $this->macharone_model->tot_message();
		$notif = $this->macharone_model->tot_notif();
		
		$data = array(
			'pesan' => $pesan,
			'notif' => $notif
		);
		
		echo json_encode($data);
	}
	
	public function save_edit(){
		$this->macharone_model->save_edit();
		redirect('macharne');
	}
	
	public function search_user(){
		$name = $this->input->post('pn_name');
		$datax = $this->macharone_model->user(null,$name);
		$list = array();
		$temp = array();
		if($datax > 0){
			foreach($datax as $row){
				$list[$row->pn_id] = $row;
			}
			
			$return = array(
				'data' => $datax,
				'user_list' => $list,
				'code' => 0
			);
			
		}else{
			$return = array(
				'data' => $datax,
				'user_list' => $list,
				'code' => 1
			);
		}
		echo json_encode($return);
	}
	
	public function save_user(){
		$param = $this->input->post();
		$sid = $this->macharone_model->save_user($param);
		echo $sid;
	}
	
	public function save_transaksi(){
		$param = $this->input->post();
		$param['terima'] = date('Y-m-d',strtotime($param['terima']));
		$param['selesai'] = date('Y-m-d',strtotime($param['selesai']));
		$param['insert'] = date('Y-m-d H:i:s');
		$name = explode(' - ',$param['user_name']);
		if(count($name) > 2){
			$param['user_name'] = $name[1];
		}
		$param['status_bayar'] = 'belum lunas';
		if($param['bayar'] >= $param['harga']){
			$param['status_bayar'] = 'lunas';
		}
		$sid = $this->macharone_model->save_transaksi($param);
		echo $sid;
	}
	
	public function estimasi(){
		$hari = $this->input->post('hari');
		$terima = $this->input->post('terima');
		
		echo date('d-m-Y', strtotime('+ '.$hari.'days',strtotime($terima)));
		
	}
	
	public function update_transaksi(){
		$param = $this->input->post();
		$param['tanggal_diterima'] = date('Y-m-d',strtotime($param['tanggal_diterima']));
		$sid = $this->macharone_model->update_transaksi($param);
		
	}
	
	public function notif_mobile(){
		// API access key from Google API's Console
		define( 'API_ACCESS_KEY', 'AIzaSyAb32zuD-C3LpazBlaI7ceig7OpSt1adsU' );
		$registrationIds = array( $_GET['id'] );
		// prep the bundle
		$msg = array
		(
			'message' 	=> 'here is a message. message',
			'title'		=> 'This is a title. title',
			'subtitle'	=> 'This is a subtitle. subtitle',
			'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
			'vibrate'	=> 1,
			'sound'		=> 1,
			'largeIcon'	=> 'large_icon',
			'smallIcon'	=> 'small_icon'
		);
		$fields = array
		(
			'registration_ids' 	=> $registrationIds,
			'data'			=> $msg
		);
		 
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result;
	}
}