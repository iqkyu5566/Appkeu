<?php 
/**
* 
*/
class Report_model extends CI_Model
{
	
	public function getRekanan()
	{
		# code...
		$query = $this->db->get('rekanan');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getRecords($rekanan)
	{
		$this->db->select(['transaksi.id_transaksi', 'rekanan.nama_rekanan',  'transaksi.tanggal', 'transaksi.deskripsi', 
			'transaksi.retasi', 'transaksi.tonase', 'transaksi.kubikasi', 'transaksi.harga_dasar', 'transaksi.debet', 
			'transaksi.kredit', 'transaksi.keterangan']);
		$this->db->from('transaksi, rekanan');
		//$this->db->join('rekanan', 'rekanan.id_rekanan=transaksi.id_rekanan');
		$this->db->where('rekanan.id_rekanan=transaksi.id_rekanan'); 
		//$this->db->group_by(['id_rekanan' => $rekanan]);
		$query = $this->db->get();
		return $query->result();


	}

	function show_combobox(){
		
	}

	
}
 ?>