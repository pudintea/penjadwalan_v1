<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');

class Member extends CI_Controller {
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
	public function MainModel()   { return 'MemberModel'; }
    public function contact()     { return 'najzmitea@gmail.com'; }
	public function ActiveMenu()  { return 'member'; }
	
	function index()
	{
		$data[$this->ActiveMenu()] = 'active';
		$this->template->load('lte/tema', 'table', $data);
	}
	
	function add()
	{
		$data['membertambah'] = 'active';
		$this->template->load('lte/tema', 'add', $data);
	}
	
	function save()
	{
		
		$data['member_nama'] = $this->input->post('nama');
		$data['member_jabatan'] = $this->input->post('jabatan');
		$data['member_tgl_input'] = date('Y-m-d H:i:s');
		
		
		if (empty($data['member_nama']) || empty($data['member_jabatan'])){
			$message = "Tidak boleh kosong";
            $this->session->set_flashdata('error', $message);
            redirect(base_url('Member/add'), 'refresh');
		}

		
		$this->load->model($this->MainModel(), 'M_najzmi');
		$adagak = $this->M_najzmi->periksa($data);
		if ($adagak > 1){
			$message = "Data sudah digunakan, silahkan ganti dengan yang lain";
			$this->session->set_flashdata('error', $message);
            redirect(base_url('Member/add'), 'refresh');
		}
		
		$input = $this->M_najzmi->save($data);
		
		if ($input){
			$message = "Member berhasil ditambahkan";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "Member GAGAL ditambahkan";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url('Member'), 'refresh');
        
	}
	
	function edit()
	{
		$kode = $this->uri->segment(3);
		$_id_ = base64_decode($kode);
		
		$data[$this->ActiveMenu()] = 'active';
		$this->load->model($this->MainModel(), 'M_najzmi');
		$data['edit_member'] = $this->M_najzmi->edit($_id_);
		
		$this->template->load('lte/tema', 'edit', $data);

	}
	
	function update()
	{	
		$kode 		= $this->input->post('id_member');
		$nama_asal 	= $this->input->post('nama_asal');
		$_id_ = base64_decode($kode);
		$this->load->model($this->MainModel(), 'M_najzmi');

		
		$data['member_nama'] = $this->input->post('nama');
		$data['member_jabatan'] = $this->input->post('jabatan');
		
		
		if (empty($data['member_nama']) || empty($data['member_jabatan'])){
			$message = "Username dan Nama Tidak boleh kosong";
            $this->session->set_flashdata('error', $message);
            redirect(base_url('Member/edit/'.$kode), 'refresh');
		}
		
		if ($nama_asal != $data['member_jabatan']){
			$adagak = $this->M_najzmi->periksa($data);
			if ($adagak > 1){
				$message = "Data sudah digunakan, silahkan ganti dengan yang lain";
				$this->session->set_flashdata('error', $message);
				redirect(base_url('Member/edit/'.$kode), 'refresh');
			}
		}
		
		
		$input = $this->M_najzmi->update($data, $_id_);
		
		if ($input){
			$message = "Member berhasil diupdate";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "Member GAGAL diupdate";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url('Member'), 'refresh');
        
	}
	
	
	// Hapus
	function delete(){
		$kode = $this->uri->segment(3);
		$_id_ = base64_decode($kode);

		$this->load->model($this->mainModel() ,'M_najzmi');
		
		$_result = $this->M_najzmi->delete($_id_);
			
			if ($_result) {
				$message = 'Data sudah berhasil dihapus';
				$this->session->set_flashdata('success', $message);
			} else {
				$message = 'Data tidak berhasil dihapus';
				$this->session->set_flashdata('error', $message);
			}
			
			redirect(base_url('Member'), 'refresh');
	}
	
	function data_json()
	{
		$tabel = 'data_member';
		$column_order = array(null, 'member_nama', 'member_jabatan');
		$column_search = array('member_nama', 'member_jabatan');
		$order = array('member_nama' => 'ASC'); // default order
			
			$this->load->model('DatatablesModel' ,'M_najzmi');
			$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
			$data = array();
			$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
			foreach ($list as $pDn) {

				
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $pDn->member_nama;
				$row[] = $pDn->member_jabatan;
				$row[] = anchor('Member/edit/'.base64_encode($pDn->id_member),' ',array('title'=>'Edit', 'class'=>'glyphicon glyphicon-edit')).' | '.
						anchor('Member/delete/'.base64_encode($pDn->id_member),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;

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