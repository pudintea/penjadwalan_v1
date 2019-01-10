<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/**
* Name:  Aplikasi Humas dan IT
*
* Author:  Pudin Saepudin Ilham
* 		   najzmitea@gmail.com
*
*/

class MemberModel extends CI_Model
{
	/* nama databases */
	//protected 
	private $_dtable = 'data_member';
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
		$this->db->where('member_nama',$data['member_nama']);
		return $this->db->get($this->_dtable)->num_rows();
	}


	/**
     * Simpan
     *
     * 
     **/
	
	function save($data)
    {
        if (empty ($data['member_nama'])) {
            return false;
        }

        $this->_result = $this->db->insert($this->_dtable, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }
	

    /**
     * Edit
     *
     * 
     **/
	
	function edit($id)
	{
		if (empty ($id)) {
            return false;
        }

		$this->db->where('id_member',$id);
		//$this->_result = $this->db->get($this->_dtable)->result();
        $this->_result = $this->db->get($this->_dtable)->row();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
	/**
     * Update ( Prosess Edit )
     *
     * 
     **/

    function update($data, $_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where('id_member', $_id_);
        $this->_result = $this->db->update($this->_dtable, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }


    /**
     * Delete
     *
     * 
     **/
	
	function delete($_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where('id_member', $_id_);
        $this->_result = $this->db->delete($this->_dtable);

        if ($this->_result) {
            return $this->_result;
        }
    }
}