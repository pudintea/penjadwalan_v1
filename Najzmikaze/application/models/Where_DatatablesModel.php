<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/**
* Name:  Aplikasi Humas dan IT
*
* Author:  Pudin Saepudin Ilham
* 		   najzmitea@gmail.com
*		WA 083820436185 - 081381729540
*
*
*/

class Where_DatatablesModel extends CI_Model
{
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
     * Datatables server side
     *
     * 
     **/
	function _get_datatables_query($tabel,$column_order,$column_search,$order,$where)
	{
		$this->db->from($tabel);
		//$this->db->join('tb_sub_unit', 'tb_trans_barang.trans_id_sub_unit_bk = tb_sub_unit.id_sub_unit')->join('tb_barang', 'tb_trans_barang.trans_kode_barang = tb_barang.kode_barang');
		$this->db->where($where);
		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
			if( isset($_POST['search']['value'])) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$order = $order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($tabel,$column_order,$column_search,$order,$where)
	{
		$this->_get_datatables_query($tabel,$column_order,$column_search,$order,$where);
		if(isset($_POST['length']) 	? $_POST['length'] 	: '' != -1)
		$this->db->limit(isset($_POST['length']) 	? $_POST['length'] 	: '10', isset($_POST['start']) 	? $_POST['start'] 	: '');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($tabel,$column_order,$column_search,$order,$where)
	{
		
		$this->_get_datatables_query($tabel,$column_order,$column_search,$order,$where);
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all($tabel,$column_order,$column_search,$order,$where)
	{
		
		$this->db->from($tabel,$column_order,$column_search,$order,$where);
		$this->db->where($where);
		return $this->db->count_all_results();
	}
	/* End datatables Server Side */
}