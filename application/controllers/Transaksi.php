<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $transaksi = $this->Transaksi_model->get_all_query();

        $data = array(
            'transaksi_data' => $transaksi
        );

        $this->template->load('template','transaksi/transaksi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaksi' => $row->id_transaksi,
		'id_rekanan' => $row->id_rekanan,
		'tanggal' => $row->tanggal,
		'deskripsi' => $row->deskripsi,
		'retasi' => $row->retasi,
        'tonase' => $row->tonase,
		'kubikasi' => $row->kubikasi,
		'harga_dasar' => $row->harga_dasar,
		'debet' => $row->debet,
		'kredit' => $row->kredit,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','transaksi/transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'id_transaksi' => set_value('id_transaksi'),
	    'id_rekanan' => set_value('id_rekanan'),
	    'tanggal' => set_value('tanggal'),
	    'deskripsi' => set_value('deskripsi'),
	    'retasi' => set_value('retasi'),
        'tonase' => set_value('tonase'),
	    'kubikasi' => set_value('kubikasi'),
	    'harga_dasar' => set_value('harga_dasar'),
	    'debet' => set_value('debet'),
	    'kredit' => set_value('kredit'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','transaksi/transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_rekanan' => $this->input->post('id_rekanan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'retasi' => $this->input->post('retasi',TRUE),
        'tonase' => $this->input->post('tonase',TRUE),
		'kubikasi' => $this->input->post('kubikasi',TRUE),
		'harga_dasar' => $this->input->post('harga_dasar',TRUE),
		'debet' => $this->input->post('debet',TRUE),
		'kredit' => $this->input->post('kredit',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
		'id_rekanan' => set_value('id_rekanan', $row->id_rekanan),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'retasi' => set_value('retasi', $row->retasi),
        'tonase' => set_value('tonase', $row->tonase),
		'kubikasi' => set_value('kubikasi', $row->kubikasi),
		'harga_dasar' => set_value('harga_dasar', $row->harga_dasar),
		'debet' => set_value('debet', $row->debet),
		'kredit' => set_value('kredit', $row->kredit),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','transaksi/transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'id_rekanan' => $this->input->post('id_rekanan',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'retasi' => $this->input->post('retasi',TRUE),
        'tonase' => $this->input->post('tonase',TRUE),
		'kubikasi' => $this->input->post('kubikasi',TRUE),
		'harga_dasar' => $this->input->post('harga_dasar',TRUE),
		'debet' => $this->input->post('debet',TRUE),
		'kredit' => $this->input->post('kredit',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_rekanan', 'id rekanan', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('retasi', 'retasi', 'trim|required');
    $this->form_validation->set_rules('tonase', 'tonase', 'trim|required');
	$this->form_validation->set_rules('kubikasi', 'kubikasi', 'trim|required');
	$this->form_validation->set_rules('harga_dasar', 'harga dasar', 'trim|required');
	$this->form_validation->set_rules('debet', 'debet', 'trim|required|numeric');
	$this->form_validation->set_rules('kredit', 'kredit', 'trim|required|numeric');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaksi.xls";
        $judul = "transaksi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Rekanan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Retasi");
    xlsWriteLabel($tablehead, $kolomhead++, "tonase");
	xlsWriteLabel($tablehead, $kolomhead++, "Kubikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Dasar");
	xlsWriteLabel($tablehead, $kolomhead++, "Debet");
	xlsWriteLabel($tablehead, $kolomhead++, "Kredit");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Transaksi_model->get_all_query() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_rekanan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->retasi);
        xlsWriteNumber($tablebody, $kolombody++, $data->tonase);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kubikasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_dasar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->debet);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kredit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=transaksi.doc");

        $data = array(
            'transaksi_data' => $this->Transaksi_model->get_all_query(),
            'start' => 0
        );
        
        $this->load->view('transaksi_doc',$data);
    }

    function report()
    {
        // if (isset($_POST['submit']))
        // {
        //     echo "proses";
        // }else
        // {

        //     $report_transaksi = $this->Transaksi_model->report_default();

        //     $data = array(
        //         'report_transaksi_data' => $hasil_transaksi
        //     );

        //     $this->template->load('template','hasil_transaksi/report_transaksi', $data);

        // }

        $rekanan=$this->input->get('rekanan');
        
        $data['hasil'] = $this->Transaksi_model->get_option2($rekanan)->result_array();
        $this->load->view("transaksi/report_transaksi",$data); // ini view menampilkan hasil pencarian
    }

  
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-02-21 10:28:50 */
/* http://harviacode.com */