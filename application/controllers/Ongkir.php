<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ongkir extends CI_Controller {
	public function __construct(){
		parent::__construct();
		/* if(!$this->session->userdata('logged_in')){
			redirect('login');
		} */
		$this->load->model('ongkir_model');
		$this->load->helper('menu');
		$this->load->model('profile_model');
	}
	
	public function index(){
		$data['province'] = $this->ongkir_model->getProvince();
		$this->load->view('ongkir/check', $data);
	}
	
	public function getcity(){
		$data = $this->ongkir_model->getcity();
		$result = json_decode($data);
		echo '<option value="">Pilih Kota</option>';
		if($result->rajaongkir->status->code == 200){
			foreach($result->rajaongkir->results as $res){
				echo '<option value="'.$res->city_id.'">'.$res->city_name.'</option>';
			}
		}
	}
	
	public function getcost(){
		array('jne','tiki','','','','');
		$jne = $this->ongkir_model->getCost('jne');
		$tiki = $this->ongkir_model->getCost('tiki');
		$pos = $this->ongkir_model->getCost('pos');
		$pcp = $this->ongkir_model->getCost('pcp');
		$rpx = $this->ongkir_model->getCost('rpx');
		$esl = $this->ongkir_model->getCost('esl');
		$data = array(
					'jne'	=> $jne,
					'tiki'	=> $tiki,
					'pos'	=> $pos,
					'pcp'	=> $pcp,
					'rpx'	=> $rpx,
					'esl'	=> $esl,
				);
		print_r($result = $data);
	}
	
	public function province(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: da0a4e590649d5ddcf7a46554c7a370a"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}
	
	public function city(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=39&province=5",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: da0a4e590649d5ddcf7a46554c7a370a"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}
	
	public function cost(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
		  ///CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
		  CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: da0a4e590649d5ddcf7a46554c7a370a"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	}
}