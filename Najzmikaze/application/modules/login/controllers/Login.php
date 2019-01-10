<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();

		date_default_timezone_set ('Asia/Jakarta');
		  
		$this->load->library('session');
		  
    }
	
	public function title()       { return 'Aplikasi Penjadwalan'; }
    public function description() { return 'Modul Login'; }
    public function version()     { return '1.3'; }
    public function author()      { return 'Pudin Saepudin Ilham'; }
    public function contact()     { return 'najzmitea@gmail.com'; }
    public function mainModel()   { return 'LoginModel'; }
    public function create()      { return '06 Juli 2018'; }
	
	function index(){
		$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
		 if ($this->session->userdata('kode_masuk') != md5($keys)){
				// jika tidak sama session
				// hapus jika masih ada session
				$this->session->sess_destroy();

				$this->load->view('login');
				
			}else{
				// jika session sama
				redirect(base_url('welcome'));
			}
		
	}
	
	function masuk(){
		$this->load->model($this->mainModel(),'M_najzmi');
		$data['user_username'] = $this->input->post('username');
		$data['user_password'] = md5($this->input->post('password'));

		if (empty($data['user_username']) || empty($data['user_password']) ){
			// kalau KOSONG
			$message = 'Form tidak boleh kosong';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('login'), 'refresh');
		}
		
		$periksa = $this->M_najzmi->periksa($data);
		
		if ($periksa->num_rows() > 0 ){
			// kalau user ada
			foreach ($periksa->result() as $usr){
						$id_user				= $usr->id_user;
						$nama_user 				= $usr->user_nama_user;
						$username 				= $usr->user_username;
					}
							// membuat session
							$keys = 'HumasDanITYPIAlazharAplikasiPenayanganBuatanPudin_SaepudinIlham1234567890najzmitea@gmail.com'.date('d-m-Y');
							$sess_data['id_user'] 		= $id_user;
							$sess_data['nama_user'] 	= $nama_user;
							$sess_data['username'] 		= $username;
							$sess_data['kode_masuk'] 	= md5($keys);

							$this->session->set_userdata($sess_data);
							// end membuat session

							redirect(base_url('welcome'), 'refresh');

		}else{
			// kalau user tidak ada
			$message = 'Anda belum terdaftar';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('login'), 'refresh');
		}
	
	}
	
    function logout()
    {
			$this->session->sess_destroy();
			redirect(base_url('login'), 'refresh');
    }

}
