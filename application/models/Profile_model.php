<?php 
	class Profile_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function load_message(){
			$query 	= "select * from tbl_comment where view = '0' and private = '0'";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function load_message_all(){
			$query 	= "select * from tbl_comment order by private, view desc";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function new_message(){
			$query 	= "select * from tbl_comment where view = '1'";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function save($param){
			$this->db->insert('tbl_comment',($param));
		}
	}