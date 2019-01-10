<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Welcome extends MX_Controller {
	
		/**
	 * Aplication Jadwal / Agenda Kegiatan Revisi 04-November-2015
	 */
	
	private $limit 			= 20;
	private $unit 			= 20;
	private $ypia 			= 'Yayasan Pesantren Islam Al Azhar';
	private $jadwal_siapa 	= 'JADWAL KEGIATAN BAGIAN KEUANGAN';
	
	function __construct() {
		parent::__construct();
		date_default_timezone_set ('Asia/Jakarta');
		$this->load->helper('pdn_tgl_indo');
		//$keys = 'HumasDanITYPIAlazharAplikasiTeknisiBuatanPudin_SaepudinIlham1234567890-najzmitea@gmail.com-07/05/2018'.date('d-m-Y');
		//if ($this->session->userdata('kode_masuk') != md5($keys)){
		//			redirect(base_url('Login/logout'));
		//}
		
		$this->load->helper('url','html');
		$this->load->model('database','J_Najzmi');
		$this->load->helper(array('form'));
			
	}
	
	public function title()       { return 'Aplikasi Jadwal'; }
    public function description() { return 'Modul Jadwal'; }
    public function version()     { return '1.2'; }
    public function author()      { return 'Pudin Saepudin Ilham'; }
    public function contact()     { return 'najzmitea@gmail.com'; }
	
	
			 
	public function index($offset=0, $order_type='desc') {
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		if(empty($order_type)) $order_type='desc';
		$data['in'] = $this->ypia;
		$data['jadwal_siapa'] = $this->jadwal_siapa;
		$data['lihatjadwal'] = 'active';

		$this->template->load('lte/tema', 'content', $data);
	}
	
	public function jadwal() {	
		for ($i = 0;$i < 7; $i++){
			$data['tb'][$i] = $this->J_Najzmi->by_date('jadwal_kode_hari', $i+1)->result();
		}
		$data['in'] = $this->ypia;
		$data['jadwal_siapa'] = $this->jadwal_siapa;

		$this->load->view('konten_jadwal', $data);
	}
	
	

	public function add() {
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		
		$data['in'] = $this->ypia;
		$data['jadwal_siapa'] = $this->jadwal_siapa;
		$data['tambahjadwal'] = 'active';
		
		$data['input_member'] = $this->J_Najzmi->input_member();

		$this->template->load('lte/tema', 'add', $data);
	}
	
	
	public function save(){
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		
		$posTanggal = $this->input->post('tanggal');
		$namaHari = date('l', strtotime($posTanggal));
		switch($namaHari){
			case 'Monday':
				$kodeHari = '1';
				break;
			case 'Tuesday':
				$kodeHari = '2';
				break;
			case 'Wednesday':
				$kodeHari = '3';
				break;
			case 'Thursday':
				$kodeHari = '4';
				break;
			case 'Friday':
				$kodeHari = '5';
				break;
			case 'Saturday':
				$kodeHari = '6';
				break;
			case 'Sunday':
				$kodeHari = '7';
				break;
		}
		
		$tanggal_post = explode('-', $posTanggal);
		$tgl = $tanggal_post[2]."-".$tanggal_post[1]."-".$tanggal_post[0];
		
		
		$wkt 	= $this->input->post('waktu');
		$tmp 	= $this->input->post('tempat');
		$kgtn 	= $this->input->post('kegiatan');
		$member = $this->input->post('member');
		if (empty($posTanggal) || empty($kgtn) || empty($member) ){
			$message = "Data Tidak boleh kosong";
            $this->session->set_flashdata('error', $message);
			redirect(base_url('welcome'), 'refresh');
		}
		/*
		$query = "INSERT INTO jadwal (kode_hari , tanggal, waktu, tempat, kegiatan)
		VALUES ('$kodeHari', '$tgl', '$wkt', '$tmp', '$kgtn')";
		$input = $this->database->kueri($query);
		*/
		
		$simpan['jadwal_kode_hari'] 	= $kodeHari;
		$simpan['jadwal_tanggal'] 		= $tgl;
		$simpan['jadwal_waktu'] 		= $wkt;
		$simpan['jadwal_tempat'] 		= $tmp;
		$simpan['jadwal_kegiatan'] 		= $kgtn;
		$simpan['jadwal_id_member'] 	= $member;
		$simpan['jadwal_tgl_input'] 	= date('Y-m-d H:i:s');
		
		$input = $this->J_Najzmi->save($simpan);
		if ($input){
			$message = "Data berhasil ditambahkan";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "Data GAGAL ditambahkan";
            $this->session->set_flashdata('error', $message);
		}
		
		redirect(base_url('welcome'), 'refresh');
	}


	function edit(){
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		
		$data['in'] = $this->ypia;
		$data['jadwal_siapa'] = $this->jadwal_siapa;
		
		$kode = $this->uri->segment(3);
		$kode_id =  base64_decode($kode);
		
		$data['jad'] = $this->J_Najzmi->edit($kode_id);
		
		$data['lihatjadwal'] = 'active';
		$data['input_member'] = $this->J_Najzmi->input_member();
		
		$this->template->load('lte/tema', 'edit', $data);
	}

	
	function update(){
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		
		$kode = $this->input->post('kode_id');
		$kode_id = base64_decode($kode);
		$posTanggal = $this->input->post('tanggal');
		$namaHari = date('l', strtotime($posTanggal));
		switch($namaHari){
			case 'Monday':
				$kodeHari = '1';
				break;
			case 'Tuesday':
				$kodeHari = '2';
				break;
			case 'Wednesday':
				$kodeHari = '3';
				break;
			case 'Thursday':
				$kodeHari = '4';
				break;
			case 'Friday':
				$kodeHari = '5';
				break;
			case 'Saturday':
				$kodeHari = '6';
				break;
			case 'Sunday':
				$kodeHari = '7';
				break;
		}
		
		$tanggal_post = explode('-',$posTanggal);
		$tgl = $tanggal_post[2]."-".$tanggal_post[1]."-".$tanggal_post[0];		
		
		$wkt = $this->input->post('waktu');
		$tmp = $this->input->post('tempat');
		$kgtn = $this->input->post('kegiatan');
		
		$edit['jadwal_kode_hari'] 	= $kodeHari;
		$edit['jadwal_tanggal'] 	= $tgl;
		$edit['jadwal_waktu'] 		= $wkt;
		$edit['jadwal_tempat'] 		= $tmp;
		$edit['jadwal_kegiatan'] 	= $kgtn;
		$edit['jadwal_id_member'] 	= $this->input->post('member');
		
		if (empty($posTanggal) || empty($kgtn) || empty($edit['jadwal_id_member']) ){
			$message = "Data Tidak boleh kosong";
            $this->session->set_flashdata('error', $message);
			redirect(base_url('welcome'), 'refresh');
		}

		$edit = $this->J_Najzmi->update($edit, $kode_id);
		
		if ($edit){
			$message = "Data berhasil diupdate";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "Data GAGAL diupdate";
            $this->session->set_flashdata('error', $message);
		}
		
		redirect(base_url('welcome'), 'refresh');
	}
	
	
	function hapus(){
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		$kode = $this->uri->segment(3);
		$kode_id =  base64_decode($kode);
		
		$hapus_qry = $this->J_Najzmi->delete($kode_id);
		
		if ($hapus_qry){
			$message = "Data berhasil dihapus";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "Data GAGAL dihapus";
            $this->session->set_flashdata('error', $message);
		}
		
		redirect(base_url('welcome'), 'refresh');
	}
	
	function data_json()
	{
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		
		$tabel = 'data_view_jadwal';
		$column_order = array(null, 'jadwal_tanggal', 'jadwal_kegiatan', 'jadwal_tempat', 'jadwal_waktu','member_nama');
		$column_search = array('jadwal_tanggal', 'jadwal_kegiatan', 'jadwal_tempat', 'jadwal_waktu','member_nama');
		$order = array('jadwal_tanggal' => 'Desc'); // default order
			
			$this->load->model('DatatablesModel' ,'M_najzmi');
			$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
			$data = array();
			$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
			$hari = array('','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Ahad');
			foreach ($list as $pDn) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $pDn->member_nama;
				$row[] = $hari[$pDn->jadwal_kode_hari];
				$row[] = tgl_indo($pDn->jadwal_tanggal);
				$row[] = $pDn->jadwal_waktu;
				$row[] = $pDn->jadwal_kegiatan;
				$row[] = $pDn->jadwal_tempat;
				$row[] = anchor('welcome/edit/'.base64_encode($pDn->id_jadwal),' ',array('title'=>'Review', 'class'=>'glyphicon glyphicon-edit')).' | '.
						anchor('welcome/hapus/'.base64_encode($pDn->id_jadwal),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;
				$data[] = $row;
			}

			$output = array(
							"draw" => isset($_POST['draw']) 	? $_POST['draw'] 	: 'null',
							"recordsTotal" => $this->M_najzmi->count_all($tabel,$column_order,$column_search,$order),
							"recordsFiltered" => $this->M_najzmi->count_filtered($tabel,$column_order,$column_search,$order),
							"data" => $data,
					);
			//output to json format
			header('Content-type: application/json');
			echo json_encode($output);
		// End Json
	}

	public function front_print($offset=0, $order_type='desc') {
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		if(empty($order_type)) $order_type='desc';
		$data['in'] = $this->ypia;
		$data['jadwal_siapa'] = $this->jadwal_siapa;
		$data['cetakjadwal'] = 'active';

		$this->template->load('lte/tema', 'content_print', $data);
	}

	function json_print()
	{
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		
		$tabel = 'data_view_jadwal';
		$column_order = array(null, 'jadwal_tanggal', 'jadwal_kegiatan', 'jadwal_tempat', 'jadwal_waktu','member_nama');
		$column_search = array('jadwal_tanggal', 'jadwal_kegiatan', 'jadwal_tempat', 'jadwal_waktu','member_nama');
		$order = array('jadwal_tanggal' => 'Desc'); // default order
			
			$this->load->model('DatatablesModel' ,'M_najzmi');
			$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
			$data = array();
			$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
			$hari = array('','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Ahad');
			foreach ($list as $pDn) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $pDn->member_nama;
				$row[] = $hari[$pDn->jadwal_kode_hari];
				$row[] = tgl_indo($pDn->jadwal_tanggal);
				$row[] = $pDn->jadwal_waktu;
				$row[] = $pDn->jadwal_kegiatan;
				$row[] = $pDn->jadwal_tempat;
				$data[] = $row;
			}

			$output = array(
							"draw" => isset($_POST['draw']) 	? $_POST['draw'] 	: 'null',
							"recordsTotal" => $this->M_najzmi->count_all($tabel,$column_order,$column_search,$order),
							"recordsFiltered" => $this->M_najzmi->count_filtered($tabel,$column_order,$column_search,$order),
							"data" => $data,
					);
			//output to json format
			header('Content-type: application/json');
			echo json_encode($output);
		// End Json
	}
	
	function cetak()
	{
		// status login 
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
		// end status login
		
		$d_tgl	= $this->input->post('dari_tgl');
		$s_tgl	= $this->input->post('sampai_tgl');
		
		if ( empty($d_tgl) || empty($s_tgl) ){
			$message = "Tidak boleh Kosong";
            $this->session->set_flashdata('error', $message);
			redirect(base_url('welcome'), 'refresh');
		}
		
		$dari_tgl	= date('Y-m-d',strtotime($d_tgl));
		$sampai_tgl	= date('Y-m-d',strtotime($s_tgl));
		
		
		
		
		$data['data_diprint'] = $this->J_Najzmi->d_print($dari_tgl, $sampai_tgl);
		$data['ypia'] 		= $this->ypia;
		$data['dari_tgl'] 	= $dari_tgl;
		$data['sampai_tgl'] = $sampai_tgl;
		$data['jadwal_siapa'] = $this->jadwal_siapa;
		
		$this->load->view('print', $data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
