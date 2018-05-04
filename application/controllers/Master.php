<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$this->load->model('master_model');
		$this->load->model('menu_model');
		$this->load->model('custom_model');
		$this->load->model('order_model');
		$this->load->helper('menu');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	
	public function index(){
		$this->barang();
	}
	
	public function barang(){
		$data['judul'] 			= "Daftar Barang";
		$data['data_stock']		= $this->master_model->stock();
		$data['data_nonstock']	= $this->master_model->non_stock();
		$this->load->view('master/barang/stock/v_master_barang',$data);
	}
	
	//====================================================== stock ================================================
	
	public function add_stock(){
		$data['list_supplier']	= $this->master_model->get_supplier();
		$data['list_cabang']	= $this->menu_model->cabang();
		$this->load->view('master/barang/stock/v_add_barang',$data);
	}
	
	public function add_stock_trans(){
		$data['list_supplier']	= $this->master_model->get_supplier();
		$data['list_cabang']	= $this->menu_model->cabang();
		$this->load->view('master/barang/stock/v_add_barang_trans',$data);
	}
	
	public function edit_stock(){
		$id 					= $this->input->get('option');
		$data["judul"]			= "Edit Stock";
		$data['list_supplier']	= $this->master_model->get_supplier();
		$data['list_cabang']	= $this->menu_model->cabang();
		$data['list_stock']		= $this->master_model->list_stock($id);
		$this->load->view('master/barang/stock/v_edit_barang',$data);
	}
	
	public function proses_edit_stock(){
		$id = $this->master_model->proses_edit_stock();
		if($this->input->post('direct') == 'Yes'){
			echo $id;
		}else{
			redirect('master');
		}
	}
	
	public function proses_add_stock(){
		$id = $this->master_model->proses_add_stock();
		if($this->input->post('direct') == 'Yes'){
			echo $id;
		}else{
			redirect('master');
		}
	}
	
	public function proses_add_stock_prop(){
		$this->master_model->proses_add_stock_prop();
	}
	
	public function proses_add_stock_trans(){
		$id = $this->master_model->proses_add_stock_trans();
		echo $id;
	}
	
	public function delete_stock_barang(){
		$this->db->query("delete from j_master_barang where id='".$this->uri->segment(3)."'");
		redirect('master/barang');
	}
	
	//========================================== nonstock ============================================
	
	public function add_nonstock(){
		$data['list_supplier']	= $this->master_model->get_supplier();
		$data['list_cabang']	= $this->menu_model->cabang();
		$this->load->view('master/barang/nonstock/v_add_barang_non_stock',$data);
	}
	
	public function edit_nonstock(){
		$id 					= $this->input->get('option');
		$data["judul"]			= "Edit Stock";
		$data['list_supplier']	= $this->master_model->get_supplier();
		$data['list_cabang']	= $this->menu_model->cabang();
		$data['list_stock']		= $this->master_model->list_nonstock($id);
		$this->load->view('master/barang/nonstock/v_edit_barang_nonstock',$data);
	}
	
	public function proses_add_nonstock(){
		$this->master_model->proses_add_nonstock();
		redirect('master');
	}
	
	public function proses_edit_nonstock(){
		$this->master_model->proses_edit_nonstock();
		redirect('master');
	}
	
	//========================================================== kategori ======================================
	public function add_kategori_paket(){
		$data['list_supplier']	= $this->master_model->get_supplier();
		$data['list_cabang']	= $this->menu_model->cabang();
		$this->load->view('master/paket/v_add_kategori',$data);
	}
	
	public function edit_kategori_paket(){
		$id 					= $this->input->get('option');
		$data["judul"]			= "Edit Stock";
		$data['list_data']		= $this->master_model->get_kategori_paket2($id);
		$this->load->view('master/paket/v_edit_kategori',$data);
	}
	
	public function proses_add_kategori_paket(){
		$this->master_model->proses_add_kategori_paket();
		redirect('master/kategori_paket');
	}
	
	public function proses_edit_kategori_paket(){
		$this->master_model->proses_edit_kategori_paket();
		redirect('master/kategori_paket');
	}
	
	function owner(){
		$data["judul"]			= "Master Owner";
		$data["list_data"]		= $this->master_model->get_owner();
		$this->load->view('v_owner',$data);
	}
	
	function edit_owner(){
		$data["judul"]			= "Edit Master Owner";
		$id 						= $this->input->get('option');
		$data['detail_owner']	= $this->master_model->get_owner1($id);
		$this->load->view('v_edit_owner',$data);
	}
	
	function proses_edit_owner(){
		$data = array(
					'nama'			=>  $this->input->post('nama'),
					'alamat'		=>  $this->input->post('alamat'),
					'no_telfon'		=>  $this->input->post('telfon'),
					'email1'		=>  $this->input->post('email'),
					'kota'			=>  $this->input->post('kota'),
					'provinsi'		=>  $this->input->post('provinsi'),
					'kecamatan'		=>  $this->input->post('kecamatan'),
					'nm_bank'		=>  $this->input->post('bank'),
					'cab_bank'		=>  $this->input->post('cabang'),
					'no_bank'		=>  $this->input->post('norek'),
					'an_bank'		=>  $this->input->post('an')
					);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('dk_master_owner',$data);
		redirect('master/owner');
	}
	//========================================================== supplier ======================================
	
	public function supplier(){
		$data['judul'] 			= "Daftar Supplier";
		$data['data_supplier']		= $this->master_model->supplier();
		$this->load->view('master/supplier/v_list_supplier',$data);
	}
	
	public function detail_supplier(){
		$id 						= $this->input->get('option');
		$data['detail_supplier']	= $this->master_model->detail_supplier($id);
		$this->load->view('master/supplier/v_detail_supplier',$data);
	}
	
	public function add_supplier(){
		$this->load->view('master/supplier/v_add_supplier');
	}
	
	public function add_sup(){
		$this->master_model->proses_add_stock();
		redirect('master');
	}
	
	public function edit_supplier(){
		$id 						= $this->input->get('option');
		$data['detail_supplier']	= $this->master_model->detail_supplier($id);
		$this->load->view('master/supplier/v_edit_supplier',$data);
	}
	
	public function proses_edit_supplier(){
		$this->master_model->proses_edit_supplier();
		redirect('master/supplier');
	}
	
	public function proses_add_supplier(){
		$this->master_model->proses_add_supplier();
		redirect('master/supplier');
	}

//================================================ customer =======================================
	
	public function customer(){
		$data["judul"]			= "List Customer";
		$select = "*";
		$table 	= "j_master_customer";
		$where 	= "";
		$data['list_customer']	= $this->custom_model->get($select,$table,$where);
		$this->load->view('master/customer/v_list_customer',$data);
	}
	
	public function add_customer(){
		$data["judul"]		= "Add Customer";
		$data['no_cust']	= $this->master_model->get_id_cust();
		$data['data_salesman']	= $this->master_model->get_salesman();
		$this->load->view('master/customer/v_add_customer',$data);
	}
	
	public function edit_customer(){
		$data["judul"]		= "Add Customer";
		$id				= $this->uri->segment(3);
		$data['data_salesman']	= $this->master_model->get_salesman();
		$data['data_customer']	= $this->master_model->get_customer($id);
		$this->load->view('master/customer/v_edit_customer',$data);
	}
	
	public function proses_add_customer(){
		$id = $this->master_model->proses_add_customer();
		if($this->input->post('direct') == 'Yes'){
			echo $id;
		}else{
			redirect("master/customer");
		}
	}
	
	public function proses_edit_customer(){
		$this->master_model->proses_edit_customer();
		redirect("master/customer");
	}
	
//================================================ master paket dan kategori paket ===================================

	public function master_paket(){
		$data["judul"]			= "List Paket";
		$select = "*";
		$table 	= "dk_master_paket";
		$where 	= "";
		$data['list_paket']		= $this->custom_model->get($select,$table,$where);
		$this->load->view('master/paket/v_list_paket',$data);
	}
	
	public function add_paket(){
		$data['data_gedung']	= $this->master_model->list_gedung();
		$this->load->view('master/paket/v_add_paket',$data);
	}
	
	public function edit_paket(){
		$data['judul']			= "Edit Paket";
		$id						= $this->uri->segment(3);
		$id						= str_replace("_","|",$id);
		$data['id_paket']		= str_replace("_","|",$id);
		$data['data_paket']		= $this->master_model->get_paket($id);
		$data['data_gedung']	= $this->master_model->list_gedung();
		$this->load->view('master/paket/v_edit_paket',$data);
	}
	
	public function add_kategori(){
		$data["judul"]			= "Tambah Kategori";
		$select = "id,nm_barang";
		$table 	= "j_master_barang";
		$where 	= "where sts = '1' order by nm_barang";
		$select1 	= "id_paket,nm_paket";
		$table1 	= "dk_master_paket";
		$where1 	= "where sts = '1'";
		$data['list_kategori']	= $this->custom_model->get($select,$table,$where);
		$data['list_paket']	= $this->custom_model->get($select1,$table1,$where1);
		$this->load->view('master/paket/v_add_kategori',$data);
	}
	
	function proses_add_paket(){
		$this->master_model->proses_add_paket();
		redirect("master/master_paket");
	}
	
	function proses_edit_paket(){
		$this->master_model->proses_edit_paket();
		redirect("master/master_paket");
	}
	
	function proses_add_kategori(){
		$this->master_model->proses_add_kategori();
		redirect("master/master_paket");
	}
	
	public function edit_kategori(){//edit 
		$id2 		= $this->input->get('option');
		$id2a 		= $this->input->get('option2');
		$data["judul"]			= "Add Kategori";
		$select	 	= "id,nm_barang";
		$table 		= "j_master_barang";
		$where 		= "where sts = '1' order by nm_barang";
		$select1 	= "id_paket,nm_paket";
		$table1 	= "dk_master_paket";
		$where1 	= "where sts = '1'";
		//$id1 = "1610";
		//$id2 = 1;
		if(strlen($id2)==1){
		$kdadd		= "0000";
		}else if(strlen($id2)==2){
			$kdadd		= "000";
		}else if(strlen($id2)==3){
			$kdadd		= "00";
		}else if(strlen($id2)==4){
			$kdadd		= "0";
		}else{
			$kdadd		= '0';
		}
		$iaaad			= "K".$id2a."|".$kdadd.$id2;
		$data['list_kategori']	= $this->custom_model->get($select,$table,$where);
		$data['list_paket']	= $this->custom_model->get($select1,$table1,$where1);
		$data['kategori_detail']	= $this->master_model->kategori_detail($iaaad);
		echo $this->db->last_query();echo "<br>";
		$data['data_kategori']	= $this->master_model->data_kategori($iaaad);
		echo $this->db->last_query();
		$this->load->view('master/paket/v_edit_kategori',$data);
	}
	
	public function detail_kategori(){//info kategori
		$id2 		= $this->input->get('option');
		$id2a 		= $this->input->get('option2');
		$data["judul"]			= "Add Kategori";
		$select	 	= "id,nm_barang";
		$table 		= "j_master_barang";
		$where 		= "where sts = '1' order by nm_barang";
		$select1 	= "id_paket,nm_paket";
		$table1 	= "dk_master_paket";
		$where1 	= "where sts = '1'";
		//$id1 = "1610";
		//$id2 = 1;
		if(strlen($id2)==1){
		$kdadd		= "0000";
		}else if(strlen($id2)==2){
			$kdadd		= "000";
		}else if(strlen($id2)==3){
			$kdadd		= "00";
		}else if(strlen($id2)==4){
			$kdadd		= "0";
		}else{
			$kdadd		= '0';
		}
		$iaaad			= "K".$id2a."|".$kdadd.$id2;
		$data['kategori_detail']	= $this->master_model->kategori_detail($iaaad);
		$data['data_kategori']	= $this->master_model->data_kategori($iaaad);
		$data['list_kategori']	= $this->custom_model->get($select,$table,$where);
		$data['list_paket']	= $this->custom_model->get($select1,$table1,$where1);
		$this->load->view('master/paket/v_info_kategori',$data);
	}
		
	public function delete_barang(){
		$id2 		= $this->input->get('option');
		$this->master_model->delete_barang($id2);
	}
	
	function proses_edit_kategori(){
		$this->master_model->proses_edit_kategori();
		redirect("master/master_paket");
	}
	
	function detail_paket(){
		$id1 		= $this->input->get('option');
		$id2 		= $this->input->get('option2');
		if(strlen($id2)==1){
		$kdadd		= "0000";
		}else if(strlen($id2)==2){
			$kdadd		= "000";
		}else if(strlen($id2)==3){
			$kdadd		= "00";
		}else if(strlen($id2)==4){
			$kdadd		= "0";
		}else{
			$kdadd		= '0';
		}
		$iaaad			= "P".$id1."|".$kdadd.$id2;
		$data['data_paket']			= $this->master_model->get_paket($iaaad);
		$data['data_kategori']		= $this->master_model->get_kategori($iaaad);
		$id_gedung					= $this->master_model->get_id_ged($iaaad);
		$data['id_paketnya']		= $iaaad;
		$data['data_gedung']		= $this->master_model->get_data_ged($id_gedung);
		$this->load->view("master/paket/v_info_paket",$data);
	}

//============================================== SALESMAN =================================================
	function salesman(){
		$data["judul"]	= "Daftar Karyawan";
		$data['data_salesman']	= $this->master_model->get_salesman();
		$this->load->view('master/salesman/v_daftar_salesman',$data);
	}
	
	function add_salesman(){
		$data["judul"]	= "Tambah Salesman";
		$data['id_salesman']	= $this->master_model->id_salesman();
		$this->load->view('master/salesman/v_add_salesman',$data);
	}
	
	function proses_add_sales(){
		$data["judul"]	= "Add Salesman";
		$data['id_salesman']	= $this->master_model->proses_add_sales();
		redirect("master/salesman");
	}
	
	function edit_sales(){
		$data["judul"]			= "Edit Salesman";
		$id						= $this->uri->segment(3);
		$data['data_salesman']	= $this->master_model->get_sales_id($id);
		$this->load->view('master/salesman/v_edit_salesman',$data);
	}
	
	function proses_edit_sales(){
		$data['id_salesman']	= $this->master_model->proses_edit_sales();
		redirect("master/salesman");
	}
//============================================== GEDUNG ==================================================
	function master_gedung(){
		$data['judul']			= "Daftar Gedung";
		$data['list_gedung']	= $this->master_model->list_gedung();
		$this->load->view("master/komisi_gedung/v_list_gedung",$data);
	}
	
	function add_gedung(){
		$data['judul']		= "Tambah Gedung";
		$data['id_gedung']	= $this->master_model->kd_gedung();
		$this->load->view("master/komisi_gedung/v_add_gedung",$data);
	}
	
	public function proses_add_gedung(){
		$this->master_model->proses_add_gedung();
		redirect("master/master_gedung");
	}
	
	public function edit_gedung(){
		$data['judul']		= "Edit Gedung";
		$id					= $this->uri->segment(3);
		$id					= str_replace("_","|",$id);
		$data['id_gedung']	= $id;
		$data['data_gedung']= $this->master_model->get_gedung($id);
		$this->load->view("master/komisi_gedung/v_edit_gedung",$data);
	}
	
	public function proses_edit_gedung(){
		$this->master_model->proses_edit_gedung();
		redirect("master/master_gedung");
	}

//================================================= Master Vendor ========================================
	function vendor(){
		$data['judul']			= "Master Vendor";
		$data['data_vendor']	= $this->master_model->get_vendor();
		$this->load->view("master/kontraktor/v_list_vendor",$data);
	}
	
	function tambah_vendor(){
		$data['judul']			= "Tambah Vendor";
		$data['jenis_vendor']	= $this->master_model->get_jenis();
		$this->load->view("master/kontraktor/v_add_vendor",$data);
	}
	
	function proses_add_vendor(){
		$this->master_model->proses_add_vendor();
		redirect("master/vendor");
	}
	
	function edit_vendor(){
		$data['judul']			= "Tambah Vendor";
		$id1 					= $this->input->get('option1');
		$id2 					= $this->input->get('option2');
		if(strlen($id2)==1){
				$kdadd		= "0000";
			}else if(strlen($id2)==2){
				$kdadd		= "000";
			}else if(strlen($id2)==3){
				$kdadd		= "00";
			}else if(strlen($id2)==4){
				$kdadd		= "0";
			}else{
				$kdadd		= "";
			}
		$idaa					= $id1."|".$kdadd.$id2;
		$data['idaa']				= $idaa;
		$data['jenis_vendor']	= $this->master_model->get_jenis();
		$data['data_vendor']	= $this->master_model->get_data_vendor($idaa);
		$this->load->view("master/kontraktor/v_edit_vendor2",$data);
	}
	
	function proses_edit_vendor(){
		$this->master_model->proses_edit_vendor();
		redirect("master/vendor");
	}
	
	function create_paket(){
		$data['judul']		= "Tambah Paket";
		$data['data_gedung']	= $this->master_model->list_gedung();
		$this->load->view("master/paket/v_add_paket",$data);
	}
	
	function search(){
		/* $dbHost = 'localhost';
		$dbUsername = 'root';
		$dbPassword = '';
		$dbName = 'db_master';
		$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
		//get search term */
		$searchTerm = $_GET['term'];
		//get matched data from skills table
		$query = $this->db->query("SELECT * FROM dk_master_kategori WHERE nm_keterangan LIKE '%".$searchTerm."%' ORDER BY id ASC");
		$query = $query->result();
		/* if($query->num_rows() > 0){ */
			foreach ($query as $row) {
				$data[] = $row->nm_keterangan;
			}
		/* } */
		echo json_encode($data);
	}
	
	function cari_harga(){
		$nama = $this->input->get('option');
		$id = $this->input->get('option2');
		$id2 = $this->input->get('option3');
		$harga = $this->master_model->get_harga_barang($nama);
		echo "<input type='text' class='form-control' readonly  value='".number_format($harga)."' onkeypress='return isNumber(event)'>";
		echo "<input type='hidden' class='form-control' id='harganya_$id2' value='$harga' onkeypress='return isNumber(event)' name='area_".$id."_harga[]'>";
		//echo $this->db->last_query();
	}
	
	function kategori_paket(){
		$data['judul']			= "Master Kategori";
		$data['list_Kategori']	= $this->master_model->get_kategori_paket();
		$this->load->view("master/paket/v_list_kategori",$data);
	}
	
	function tambah_master_kategori(){
		$data['judul']			= "Tambah Master Kategori";
		$this->load->view("master/paket/v_add_kategori",$data);
	}
	
	function save_paket(){
		$id				= $this->input->post('id_paket');
		$nm_paket		= $this->input->post('nm_paket');
		$sts			= $this->input->post('sts');
		$gedung			= $this->input->post('gedung');
		$harga			= str_replace(",","",str_replace(".","",$this->input->post('harga')));
		$note			= $this->input->post('note');
		$gedung2		= explode("+^",$gedung);
		if($gedung == ""){
			$gedung2_nm	= "";
			$gedung2_id = "";
		}else{
			$gedung2_nm	= $gedung2[1];
			$gedung2_id = $gedung2[0];
		}
		$data		= array(
						'id_paket'		=> $id,
						'nm_paket'		=> $nm_paket,
						'note'			=> $note,
						'sts'			=> $sts,
						'harga'			=> $harga,
						'id_gedung'		=> $gedung2_id,
						'nm_gedung'		=> $gedung2_nm
		);
		$this->db->insert('dk_master_paket',$data);
		$id_ex = explode("|",$id);
		$id_ex = $id_ex[1] + 0;
		$this->db->query("update dk_counter set c_paket ='$id_ex'");
		
		$jum 			= $this->input->post('jum_area');
		for($i=1;$i<=$jum;$i++){
			$nm_ket		= $this->input->post('area_'.$i.'_ket');
			$sfc		= $this->input->post('area_'.$i.'_sfc');
			$harga		= $this->input->post('area_'.$i.'_harga');
			$nama		= $this->input->post('area_'.$i.'_nama');
			for($j=0;$j<7;$j++){
				if(empty($nm_ket[$j])){
					$nm_ket[$j] = "";
				}
				if(empty($sfc[$j])){
					$sfc[$j] = "";
				}
				if(empty($harga[$j])){
					$harga[$j] = "";
				}
				$data_d	= array(
					'id_area'			=> $i,
					'nm_area'			=> $nama[0],
					'nm_keterangan'		=> $nm_ket[$j],
					'nm_sfesifikasi'	=> $sfc[$j],
					'jumlah'			=> $harga[$j],
					'no'				=> $j+1,
					'id_paket'			=> $this->input->post('id_paket')
				);
				$this->db->insert("dk_kategori_detail",$data_d);
			}
		}
		redirect('master/master_paket');
	}
	
	function save_paket_edit(){
		$id				= $this->input->post('id_paket');
		$nm_paket		= $this->input->post('nm_paket');
		$sts			= $this->input->post('sts');
		$gedung			= $this->input->post('gedung');
		$harga			= str_replace(",","",str_replace(".","",$this->input->post('harga')));
		$note			= $this->input->post('note');
		$gedung2		= explode("+^",$gedung);
		if($gedung == ""){
			$gedung2_nm	= "";
			$gedung2_id = "";
		}else{
			$gedung2_nm	= $gedung2[1];
			$gedung2_id = $gedung2[0];
		}
		$data		= array(
						'id_paket'		=> $id,
						'nm_paket'		=> $nm_paket,
						'note'			=> $note,
						'sts'			=> $sts,
						'harga'			=> $harga,
						'id_gedung'		=> $gedung2_id,
						'nm_gedung'		=> $gedung2_nm
		);
		$this->db->where('id_paket',$id);
		$this->db->update('dk_master_paket',$data);
		
		$this->db->query("delete from dk_kategori_detail where id_paket='$id'");
		$jum 			= $this->input->post('jum_area');
		for($i=1;$i<=$jum;$i++){
			$nm_ket		= $this->input->post('area_'.$i.'_ket');
			$sfc		= $this->input->post('area_'.$i.'_sfc');
			$harga		= $this->input->post('area_'.$i.'_harga');
			$nama		= $this->input->post('area_'.$i.'_nama');
			for($j=0;$j<7;$j++){
				if(empty($nm_ket[$j])){
					$nm_ket[$j] = "";
				}
				if(empty($sfc[$j])){
					$sfc[$j] = "";
				}
				if(empty($harga[$j])){
					$harga[$j] = "";
				}
				$data_d	= array(
					'id_area'			=> $i,
					'nm_area'			=> $nama[0],
					'nm_keterangan'		=> $nm_ket[$j],
					'nm_sfesifikasi'	=> $sfc[$j],
					'jumlah'			=> $harga[$j],
					'no'				=> $j+1,
					'id_paket'			=> $this->input->post('id_paket')
				);
				$this->db->insert("dk_kategori_detail",$data_d);
			}
		}
		redirect('master/master_paket');
	}
	
	function discount(){
		$data['judul']		= "Master Discount";
		$data['list_jabatan']	= $this->master_model->get_jabatan();
		$this->load->view("master/discount/v_list_discount",$data);
	}
	
	function edit_discount(){
		$data['judul']			= "Edit Discount";
		$id					= $this->uri->segment(3);
		$data['list_jabatan']	= $this->master_model->get_jabatan_id($id);
		$this->load->view("master/discount/v_edit_discount",$data);
	}
	
	function save_discount(){
		$id 		= $this->input->post('id');
		$discount 	= $this->input->post('discount');
		$this->db->query("update dk_jabatan set discount='$discount' where id='$id'");
		redirect('master/discount');
	}
	
	function area(){
		$data['judul']			= "Master Kategori";
		$data['list_Kategori']	= $this->master_model->get_kategori_area();
		$this->load->view("master/paket/v_list_area",$data);
	}
	
	public function add_area(){
		$this->load->view('master/paket/v_add_area',$data);
	}
	
	public function edit_area(){
		$data['id'] = $this->input->get('option');
		$id = $this->input->get('option');
		$data['area_data'] = $this->master_model->get_date_area($id);
		$this->load->view('master/paket/v_edit_area',$data);
	}
	
	public function proses_add_area(){
		$this->master_model->proses_add_area();
		redirect('master/area');
	}
	
	public function hapus_area(){
		$id = $this->uri->segment(3);
		$this->db->query("update dk_area set `use`='1' where id='$id'");
		$this->db->query("update dk_kategori_detail set `nm_keterangan`='', `jumlah`='',`nm_sfesifikasi`='' where id_area='$id'");
		redirect('master/area');
	}
	
	public function proses_edit_area(){
		$nama = $this->input->post('nm_area');
		$id = $this->input->post('id');
		$this->db->query("update dk_area set nm_area='$nama' where id='$id'");
		redirect('master/area');
	}
}