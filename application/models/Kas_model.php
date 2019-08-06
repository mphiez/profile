<?php 
	class Kas_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		//replay = 0 balasan, 1 pertanyaan //pesan
		//status = 0 belum dibaca. 1 sudah dibaca //pesan
		//status_reading = 0 belum dibaca. 1 sudah dibaca //transaksi
		
		public function onprogres(){
			$sid = $this->session->userdata('pn_id_laundry');
			$query 	= "select * from tbl_transaksi where user_id = '$sid' and status != 'diterima' or status_reading = '0' order by selesai";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function transaksi(){
			$sid = $this->session->userdata('pn_id_laundry');
			$where = "where user_id = '$sid'";
			if($this->session->userdata('jabatan') == 0){
				$where = '';
			}
			$query 	= "select * from tbl_transaksi $where order by selesai";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function tot_message(){
			$sid = $this->session->userdata('pn_id_laundry');
			$where = " and user_id = '$sid' and replay='0'";
			if($this->session->userdata('jabatan') == '0'){
				$where = " and replay='1'";
			}
			$query 	= "select count(id) as tot from tbl_pesan where status='0' $where";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				$ret = $q->result();
				return $ret[0]->tot;
			}else{
				return 0;
			}
		}
		
		public function tot_notif(){
			$sid = $this->session->userdata('pn_id_laundry');
			$query 	= "select count(id) as tot from tbl_transaksi where user_id = '$sid' and status_reading != '1'";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				$ret = $q->result();
				return $ret[0]->tot;
			}else{
				return 0;
			}
		}
		
		public function read_notif(){
			$sid = $this->session->userdata('pn_id_laundry');
			$query 	= "update tbl_transaksi set status_reading = '1' where user_id = '$sid'";
			$q 		= $this->db->query($query);
		}
		
		public function read_mail($sid){
			$rep = "and replay = '0'";
			if($this->session->userdata('jabatan') == '0'){
				$rep = "and replay = '1'";
			}
			$query 	= "update tbl_pesan set status = '1' where user_id = '$sid' $rep";
			$q 		= $this->db->query($query);
		}
		
		public function notification(){
			$sid = $this->session->userdata('pn_id_laundry');
			$query 	= "select * from tbl_transaksi where user_id = '$sid' AND  status != 'diterima'";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function paket(){
			$query 	= "select * from tbl_paket where status = '0' order by id";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function mail($sid = null){
			$query 	= "select * from (select a.*, b.pn_name from tbl_pesan a left join dk_user b on a.user_id = b.pn_id where a.user_id = '$sid' order by id desc limit 30) c order by c.id asc";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function new_mail($sid = null){
			$where = "and replay != '1'";
			if($this->session->userdata('jabatan') == 0){
				$where = "and replay != '0'";
			}
			$query 	= "select * from tbl_pesan where user_id = '$sid' and status = '0' $where order by id asc";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function list_mail(){
			$query 	= "select a.*, b.pn_name from tbl_pesan a left join dk_user b on a.user_id = b.pn_id  where a.status = '0' and a.replay != '0' group by a.user_id order by a.datetime desc";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function all_mail(){
			$query 	= "select a.*, b.pn_name from tbl_pesan a left join dk_user b on a.user_id = b.pn_id  where   a.replay != '0' group by a.user_id order by a.datetime desc";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function user($sid = null, $name = null){
			$where = "";
			if(!empty($sid)){
				$where = " where pn_id = '$sid'";
			}
			$query 	= "select pn_name, insert_date, pn_uname, pn_id, alamat, foto, hutang, no_hp, email from dk_user $where";
			if(!empty($name)){
				$query 	= "select pn_name, insert_date, pn_uname, pn_id, alamat, foto, hutang, no_hp, email from dk_user where pn_name like '%$name%'";
			}
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function send_message($param){
			$this->db->insert('tbl_pesan',$param);
		}
		
		public function update_transaksi($param){
			$bayar = 0;
			if(isset($param['bayar']) && $param['bayar'] != ''){
				$bayar = $param['bayar'];
			}
			$sid = $param['id'];
			unset($param['id']);
			unset($param['bayar']);
			if($param['status'] == 'diterima'){
				$param['status_reading'] = '1';
			}
			$this->db->where('id',$sid);
			$this->db->update('tbl_transaksi',$param);
			$this->db->query("update tbl_transaksi set bayar = bayar + $bayar where id='$sid'");
		}
		
		public function save_transaksi($param){
			$this->db->insert('tbl_transaksi',$param);
		}
		
		public function save_user($param){
			$q_user			= $this->db->query("select c_barang from dk_counter where id='1'");
			$ret 			= $q_user->result();
			$kd_barang		= $ret[0]->c_barang + 1;
			$thnbln			= date("ym");
			$id				= '1'.$thnbln.$kd_barang;
			$param['pn_uname'] 	= $id;
			$param['pn_id'] 	= $id;
			$param['pn_pass'] 	= md5($id);
			$this->db->insert('dk_user',$param);
			$this->db->query("update dk_counter set c_barang ='$kd_barang' where id='1'");
			
			return $id;
		}
		
		public function proses_add_nonstock(){	
			$nm_barang	= $this->input->post('nm_barang');
			$supplier	= $this->input->post('supplier');
			$supplier	= explode("+^",$supplier);
			$asal		= $this->input->post('asal');
			$detail		= $this->input->post('detail');
			$harga		= $this->input->post('harga');
			$pn_wilayah	= $this->input->post('pn_wilayah');
			$cabang		= explode("+^",$pn_wilayah);
			$sts		= $this->input->post('sts');
			$q_user			= $this->db->query("select c_barang from dk_counter where id='1'");
			$ret 			= $q_user->result();
			$kd_barang		= $ret[0]->c_barang + 1;
			$thnbln			= date("ym");
			$id				= '1'.$thnbln.$kd_barang;
			
			$nmfile="";
			$ekstensi_file	= '.jpg';
			$this->load->library('upload');
			$nmfile = $id.$ekstensi_file; //nama file + fungsi time
			$config['upload_path'] = './gambar_barang/'; //Folder untuk menyimpan hasil upload
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '3072'; //maksimum besar file 3M
			$config['max_width']  = '5000'; //lebar maksimum 5000 px
			$config['max_height']  = '5000'; //tinggi maksimum 5000 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya

			$this->upload->initialize($config);
			
			if($_FILES['filefoto']['name'])
			{
				$file = './gambar_barang/'.$nmfile;
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
				}
            }
			
			$data	= array(
							'id'			=> $id,
							'nm_barang'		=> strtoupper($nm_barang),
							'id_cabang'		=> $cabang[0],
							'nm_cabang'		=> $cabang[1],
							'produk_asal'	=> strtoupper($asal),
							'detail'		=> $detail,
							'id_supplier'	=> $supplier[0],
							'nm_supplier'	=> $supplier[1],
							'harga'			=> $harga,
							'barang_stock'	=> "N",
							'insert_by'		=> $this->session->userdata('pn_name'),
							'insert_date'	=> date("Y-m-d"),
							'sts'			=> $sts			
						);
			$this->db->insert('j_master_barang',$data);
			$this->db->query("update dk_counter set c_barang ='$kd_barang' where id='$pn_wilayah'");
		}
		
		public function save_edit(){	
			$pn_name	= $this->input->post('pn_name');
			$alamat		= $this->input->post('alamat');
			$sid 		= $this->input->post('pn_id');
			$id			= $sid.'-'.date('YmdHis');
			
			$data	= array(
							'pn_name' => $pn_name,		
							'alamat' => $alamat,		
							'no_hp' =>  $this->input->post('no_hp'),		
							'email' =>  $this->input->post('email'),		
						);
			
			$ses_data = array(
				'pn_name_laundry' => $pn_name,
				'alamat_laundry' => $alamat
			);
			
			$nmfile="";
			$ekstensi_file	= '.jpg';
			$this->load->library('upload');
			$nmfile = $id.$ekstensi_file; //nama file + fungsi time
			$config['upload_path'] = './assets/'; //Folder untuk menyimpan hasil upload
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '3072'; //maksimum besar file 3M
			$config['max_width']  = '5000'; //lebar maksimum 5000 px
			$config['max_height']  = '5000'; //tinggi maksimum 5000 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya

			$this->upload->initialize($config);
			
			if($_FILES['filefoto']['name'])
			{
				$file = './assets/'.$nmfile;
				if ($this->upload->do_upload('filefoto'))
				{
					$data['foto'] = $nmfile;
					$ses_data['foto_laundry'] = $nmfile;
					//unlink($config['upload_path'].$this->session->userdata('foto_laundry'));
					$gbr = $this->upload->data();
				}
            }
			
			if($this->session->userdata('jabatan') != 0){
				$this->session->set_userdata($ses_data);
			}
			
			$this->db->where('pn_id',$sid);
			$this->db->update("dk_user", $data);
		}
		
		public function tes_transaction(){
			$this->db->trans_begin();
			$data = array(
				'id'	=> 5,
				'nama_paket'	=> 2,
				'harga'	=> 2,
				'kuota'	=> 2,
			);
			$this->db->insert('tbl_paket', $data);
			$this->db->where('id', 2);
			$this->db->update('tbl_paket', $data);
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return "gagal";
			}else{
				$this->db->trans_commit();
				return "sukses";
			}
		}
		
	}