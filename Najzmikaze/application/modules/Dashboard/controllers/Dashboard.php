<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
			parent::__construct();
		date_default_timezone_set ('Asia/Jakarta');
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		if ($this->session->userdata('kode_masuk') != md5($keys)){
					redirect(base_url('login/logout'));
		}
	}
	
	public function title()       { return 'Aplikasi Humas dan IT'; }
    public function description() { return 'Modul User'; }
    public function version()     { return '1.3.0'; }
    public function author()      { return 'Pudin Saepudin Ilham'; }
	public function MainModel()   { return 'DashboardModel'; }
    public function contact()     { return 'najzmitea@gmail.com'; }
	public function ActiveMenu()  { return 'dashboard'; }
	
	function index()
	{
		$data[$this->ActiveMenu()] = 'active';
		$this->template->load('lte/tema', 'table', $data);
	}
	
	function data_json()
	{
		$tabel = 'data_member';
		$column_order = array(null, 'member_nama');
		$column_search = array('member_nama');
		$order = array('member_nama' => 'ASC'); // default order
			
			$this->load->model('DatatablesModel' ,'M_najzmi');
			$this->load->model($this->MainModel() ,'M_pDn');
			$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
			$data = array();
			$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
			foreach ($list as $pDn) {

				
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $pDn->member_nama;
				$row[] = $this->M_pDn->hitung($pDn->id_member);

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
	
}