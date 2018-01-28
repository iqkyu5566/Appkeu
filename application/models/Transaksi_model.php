<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_query()
    {
        $sql = "SELECT t.id_transaksi, r.nama_rekanan, t.tanggal, t.deskripsi, t.retasi, t.tonase, t.kubikasi, t.harga_dasar, 
                t.debet, t.kredit, t.keterangan 
                FROM rekanan as r, transaksi as t 
                WHERE r.id_rekanan = t.id_rekanan";

        return $this->db->query($sql)->result();
    }


    function get_all_transaksi_detail()
    {
        $sql = "SELECT t.id_transaksi, r.nama_rekanan, t.tanggal, t.deskripsi, t.retasi, t.tonase, t.kubikasi, t.harga_dasar, 
                t.debet, t.kredit, t.keterangan 
                FROM rekanan as r, transaksi as t 
                WHERE r.id_rekanan = t.id_rekanan";

        return $this->db->query($sql)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('id_rekanan', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('retasi', $q);
    $this->db->or_like('tonase', $q);
	$this->db->or_like('kubikasi', $q);
	$this->db->or_like('harga_dasar', $q);
	$this->db->or_like('debet', $q);
	$this->db->or_like('kredit', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_transaksi', $q);
	$this->db->or_like('id_rekanan', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('retasi', $q);
    $this->db->or_like('tonase', $q);
	$this->db->or_like('kubikasi', $q);
	$this->db->or_like('harga_dasar', $q);
	$this->db->or_like('debet', $q);
	$this->db->or_like('kredit', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function report($id)
    {
        //Sudah Lumayan
        $condition = "id_rekanan =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('rekanan');
        $this->db->where($condition);
        // $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
        

    }

    function get_option() {
    
        $sql = "SELECT t.id_transaksi, r.nama_rekanan, t.tanggal, t.deskripsi, t.retasi, t.tonase, t.kubikasi, t.harga_dasar, 
                t.debet, t.kredit, t.keterangan 
                FROM rekanan as r, transaksi as t 
                WHERE r.id_rekanan = t.id_rekanan";

        return $this->db->query($sql);
}

     function get_option2($rekanan='') {
    
        // $sql = "SELECT r.nama_rekanan
        //         FROM rekanan as r
        //         WHERE r.id_rekanan";

        // return $this->db->query($sql);

        if($rekanan!='')
        {
            $where='where `r.id_rekanan = t.id_rekanan`='.$rekanan;
        } 
        else
        {
            $where = '';
        }
        $query = $this->db->query('SELECT t.id_transaksi, r.nama_rekanan, t.tanggal, t.deskripsi, t.retasi, t.tonase, t.kubikasi, t.harga_dasar, 
                t.debet, t.kredit, t.keterangan  FROM rekanan as r, transaksi as t  '.$where.' order by nama_rekanan asc');
        $dropdown[''] = '-- Semua --';
        foreach ($query->result() as $row) {
            $dropdown[$row->nama_rekanan] = $row->nama_rekanan;
        }
        
        return $dropdown;

}

 // get data dropdown
    function get_rekanan()
    {
        // ambil data dari db
        $this->db->order_by('transaksi', 'asc');
        $result = $this->db->get('rekanan');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $rekanan[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $rekanan[$row->id_rekanan] = $row->rekanan;
            }
        }
        return $rekanan;
    }

}


/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-02-21 10:28:50 */
/* http://harviacode.com */