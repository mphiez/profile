<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes_logika extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		for ($i=1;$i<=7;$i++){
			echo $i*$i; echo "<br>";
		}
	}
	
}