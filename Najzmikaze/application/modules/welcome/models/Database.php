<?php
defined('__NAJZMI_PUDINTEA__') OR exit('No direct script access allowed');
/**
* Anibar Akan selalu dihati
* Diciptakan dengan sepenuh hati, untuk para pecinta kopi.
*
* Author:  Pudin Saepudin Ilham
* 		   najzmitea[et]gmail.com
*
*/


class Database extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	private $tb_jadwal = 'data_jadwal';
	private $id_jadwal = 'id_jadwal';
	private $tb_hari = 'tb_hari';
	
	/**
     * return _retval
     *
     * @var Boolean
     **/
    private $_retval = NULL;

    /**
     * return _result
     *
     * @var Boolean
     **/
    private $_result = FALSE;

    /**
     * return _retarr
     *
     * @var Array
     **/
    private $_retarr = array();
	
	/**
     * SIMPAN
    **/
	function save($kirim)
    {
        if (empty ($kirim['jadwal_tanggal']) || empty($kirim['jadwal_waktu']) || empty($kirim['jadwal_tempat'])) {
            return false;
        }

        $this->_result = $this->db->insert($this->tb_jadwal, $kirim);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
	/**
     * Edit
    **/
	
	function edit($id)
	{
		if (empty ($id)) {
            return false;
        }

		$this->db->where($this->id_jadwal,$id);
		$this->_result = $this->db->get('data_view_jadwal')->row();
		
		if ($this->_result) {
            return $this->_result;
        }
	}

    /**
     * Edit
    **/
    
    function input_member()
    {

        $this->_result = $this->db->get('data_member')->result();
        
        if ($this->_result) {
            return $this->_result;
        }
    }
	
	/**
     * Update ( Prosess Edit )
    **/

    function update($data, $_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where($this->id_jadwal, $_id_);
        $this->_result = $this->db->update($this->tb_jadwal, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
	/**
     * Datatables server side
    **/
	
	function delete($_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where($this->id_jadwal, $_id_);
        $this->_result = $this->db->delete($this->tb_jadwal);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
	function by_date ($coll, $id){		
		$date = date('Y-m-d');
		//mktime(hour,minute,second,month,day,year,is_dst);
		$next7day = mktime(0,0,0,date("n"),date("j")+14,date("Y"));
		$day7 = date("Y-m-d", $next7day);
		$query = $this->db
        ->select('*')->from('data_view_jadwal')
        ->where(array(
            $coll => $id,
            'jadwal_tanggal >= ' => $date,
			'jadwal_tanggal <=' => $day7
        ))
        ->get();
		return $query;
		
	}
	
	function kueri($array) {
		return $this->db->query($array);		
	}
	
	/**
     * Data yang ditampilkan untuk print
     *
     * 
     **/

    function d_print($tgl_awal, $tgl_akhir)
	{
		
		$this->db->order_by("jadwal_tanggal","DESC");
		$this->db->where(array(
            'jadwal_tanggal >=' => $tgl_awal,
			'jadwal_tanggal <=' => $tgl_akhir
        ));
		
		$abc = $this->db->get($this->tb_jadwal);
		if ($abc) {
	        return $abc->result();
	    }
		
	}
	
	
}

/* End of file database.php */
/* Location: ./application/model/database.php */