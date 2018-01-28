<?php 
/**
* 
*/
class Laporan_model extends CI_Model
{
	function __construct(){
		parent::__construct();
	}

	
	function getRekanan()
	{
		$query = $this->db->query('SELECT nama_rekanan FROM `rekanan` order by id_rekanan asc');
        $dropdown['all'] = '-- Semua --';
        foreach ($query->result() as $row) {
            $dropdown[$row->nama_rekanan]; 
            // = $row->periode;
        }
        return $dropdown;
	}
}