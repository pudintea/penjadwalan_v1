<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/**
* Name:  Aplikasi Humas dan IT
*
* Author	:  	Pudin Saepudin Ilham
* 		   		najzmitea@gmail.com
* Facebook 	: 	Najzmi Al Zailani
*
*
*
*/

class LoginModel extends CI_Model
{
	/* nama databases */
	//protected 
	private $_dtable = 'data_user';
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
	
	
	function periksa($data){
	
		if (empty ($data['user_username'])) {
            return false;
        }
		if (empty ($data['user_password'])) {
            return false;
        }
		
		$this->db->where('user_username',$data['user_username']);
		$this->db->where('user_password',$data['user_password']);
		
		$this->_result = $this->db->get($this->_dtable);
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
	function save($data)
    {
        if (empty ($data['nama_level'])) {
            return false;
        }

        $this->_result = $this->db->insert($this->_dtable, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
	function edit($id)
	{
		if (empty ($id)) {
            return false;
        }

		$this->db->where('id_level',$id);
		$this->_result = $this->db->get($this->_dtable)->result();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
    function update($data, $_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where('id_level', $_id_);
        $this->_result = $this->db->update($this->_dtable, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
	function delete($_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where('id_level', $_id_);
        $this->_result = $this->db->delete($this->_dtable);

        if ($this->_result) {
            return $this->_result;
        }
    }
}