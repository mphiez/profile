<?php 
	class Macharone_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		//replay = 0 balasan, 1 pertanyaan //pesan
		//status = 0 belum dibaca. 1 sudah dibaca //pesan
		//status_reading = 0 belum dibaca. 1 sudah dibaca //transaksi
		
		public function onprogres($id = null, $mode = 0){
			$sid = $this->session->userdata('pn_id_macharone');
			$group = "";
			$and = "";
			$order = "";
			if($mode == 0){
				//list dengan id transaksi tertentu dan sudah bayar catatan = 2
				$where = "where user_id = '$sid'";
				if($this->session->userdata('jabatan') == 0){
					$where = "";
				}
				
				$where_id = "";
				if(!empty($where) && !empty($id)){
					$where_id = " and id_transaksi= '$id' and catatan='2'";
				}else if(empty($where) && !empty($id)){
					$where_id = " where id_transaksi= '$id' and catatan='2'";
				}
			}else if($mode == 1){
				//list yg belum dibayar / gantung
				$where = "";
				$where_id = "where catatan = 0";
			}else if($mode == 2){
				//semua transaksi
				$where = "";
				$where_id = "";
			}else if($mode == 3){
				//semua transaksi group by
				$where = "";
				$where_id = "";
				$group = "group by id_transaksi";
			}else if($mode == 4){
				//semua transaksi group by and where catatan = 0
				$where = "where catatan = 0";
				$where_id = "";
				$group = "group by id_transaksi";
				$and = ", sum(total) as jumlah_item, sum(total_bayar) as total_tagihan";
				$order = "desc";
			}else if($mode == 5){
				//semua transaksi group by and where catatan = 0
				$where = "where catatan = 2";
				$where_id = "";
				$group = "group by id_transaksi";
				$and = ", sum(total) as jumlah_item, sum(total_bayar) as total_tagihan";
				$order = "desc";
			}
			
			$query 	= "select * $and from makaroni_transaksi $where $where_id $group ORDER BY id $order";
			
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function transaksi(){
			$sid = $this->session->userdata('pn_id_macharone');
			$where = "where user_id = '$sid'";
			if($this->session->userdata('jabatan') == 0){
				$where = '';
			}
			$query 	= "select * from makaroni_transaksi $where order by selesai";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function tot_message(){
			$sid = $this->session->userdata('pn_id_macharone');
			$where = " and user_id = '$sid' and replay='0'";
			if($this->session->userdata('jabatan') == '0'){
				$where = " and replay='1'";
			}
			$query 	= "select count(id) as tot from makaroni_pesan where status='0' $where";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				$ret = $q->result();
				return $ret[0]->tot;
			}else{
				return 0;
			}
		}
		
		public function tot_notif(){
			$sid = $this->session->userdata('pn_id_macharone');
			$query 	= "select count(id) as tot from makaroni_transaksi where user_id = '$sid' and status_reading != '1'";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				$ret = $q->result();
				return $ret[0]->tot;
			}else{
				return 0;
			}
		}
		
		public function read_notif(){
			$sid = $this->session->userdata('pn_id_macharone');
			$query 	= "update makaroni_transaksi set status_reading = '1' where user_id = '$sid'";
			$q 		= $this->db->query($query);
		}
		
		public function read_mail($sid){
			$rep = "and replay = '0'";
			if($this->session->userdata('jabatan') == '0'){
				$rep = "and replay = '1'";
			}
			$query 	= "update makaroni_pesan set status = '1' where user_id = '$sid' $rep";
			$q 		= $this->db->query($query);
		}
		
		public function notification(){
			$sid = $this->session->userdata('pn_id_macharone');
			$query 	= "select * from makaroni_transaksi where user_id = '$sid' AND  status != 'diterima'";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function paket(){
			$query 	= "select * from makaroni_paket where status = '0' order by id";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function bumbu(){
			$query 	= "select * from makaroni_bumbu where status = '0' order by nama_bumbu";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function mail($sid = null){
			$query 	= "select * from (select a.*, b.pn_name, b.foto from makaroni_pesan a left join dk_user b on a.user_id = b.pn_id where a.user_id = '$sid' order by id desc limit 30) c order by c.id asc";
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
			$query 	= "select * from makaroni_pesan where user_id = '$sid' and status = '0' $where order by id asc";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function list_mail(){
			$query 	= "select a.*, b.pn_name from makaroni_pesan a left join dk_user b on a.user_id = b.pn_id  where a.status = '0' and a.replay != '0' group by a.user_id order by a.datetime desc";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function get_list_user(){
			$query 	= "select pn_id, pn_name from dk_user";
			$q 		= $this->db->query($query);
			if($q->num_rows() > 0){
				return $q->result();
			}else{
				return 0;
			}
		}
		
		public function all_mail(){
			$query 	= "select a.*, b.pn_name from makaroni_pesan a left join dk_user b on a.user_id = b.pn_id  where   a.replay != '0' group by a.user_id order by a.datetime desc";
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
			$this->db->insert('makaroni_pesan',$param);
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
			$this->db->update('makaroni_transaksi',$param);
			$this->db->query("update makaroni_transaksi set bayar = bayar + $bayar where id='$sid'");
			
			$xUser			= $this->db->query("select * from makaroni_transaksi where id='$sid'");
			$ret 			= $xUser->result();
			$user_id		= $ret[0]->user_id;
			$harga		= $ret[0]->harga;
			if($ret[0]->harga <= $ret[0]->bayar){
				$this->db->query("update makaroni_transaksi set status_bayar = 'lunas' where id='$sid'");
				$status_bayar = 'lunas';
			}else{
				$this->db->query("update makaroni_transaksi set status_bayar = 'belum lunas' where id='$sid'");
				$status_bayar = 'belum lunas';
			}
			
			
			$param_act = array(
								'id_transaksi' => $this->db->insert_id(),
								'id_user' => $user_id,
								'bayar' => $param['bayar'],
								'harga' => $harga,
								'status_bayar' => $status_bayar,
								'status_macharone' => $param['status'],
								'create_date' => date("Y-m-d H:i:s"),
								'user' => $this->session->userdata('pn_id_macharone'),
								);
			$this->db->insert('makaroni_timeline',$param_act);
		}
		
		public function save_transaksi($param){
			$bumbu = "";
			if(count($param['bumbu']) > 0){
					$bumbu = implode('<br>',$param['bumbu']);
			}
			
			$data = array(
							'harga' => $param['harga'],
							'total' => $param['total'],
							'total_bayar' => $param['harga'] * $param['total'],
							'jenis' => $param['jenis'],
							'id_transaksi' => $param['transaksi'],
							'create_dtm' => date("Y-m-d H:i:s"),
							'catatan' => 0,
							'bumbu' => $bumbu,
						);
			
			
			$this->db->insert('makaroni_transaksi',$data);
			$id = $this->db->insert_id();
			if(empty($param['transaksi'])){
				$update = array('id_transaksi' => $id);
				$this->db->where(array('id' => $id));
				$this->db->update('makaroni_transaksi',$update);
				
			}
			return $id;
		}
		
		public function hapus_transaksi($id){
			$update = array('catatan' => 1);
			$this->db->where(array('id' => $id));
			$this->db->update('makaroni_transaksi',$update);
			
			return $id;
		}
		
		public function update_list($id){
			$update = array('catatan' => 2);
			$this->db->where(array('id_transaksi' => $id, 'catatan' => 0));
			$this->db->update('makaroni_transaksi',$update);
			
			return $id;
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
							'insert_by'		=> $this->session->userdata('pn_name_macharone'),
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
				'pn_name_macharone' => $pn_name,
				'alamat_macharone' => $alamat
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
					$ses_data['foto_macharone'] = $nmfile;
					//unlink($config['upload_path'].$this->session->userdata('foto_macharone'));
					$gbr = $this->upload->data();
				}
            }
			
			if($this->session->userdata('jabatan') != 0){
				$this->session->set_userdata($ses_data);
			}
			
			$this->db->where('pn_id',$sid);
			$this->db->update("dk_user", $data);
		}
		
	}