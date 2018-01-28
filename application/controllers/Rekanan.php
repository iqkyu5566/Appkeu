<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekanan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rekanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $rekanan = $this->Rekanan_model->get_all();

        $data = array(
            'rekanan_data' => $rekanan
        );

        $this->template->load('template','rekanan/rekanan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Rekanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rekanan' => $row->id_rekanan,
		'nama_rekanan' => $row->nama_rekanan,
		'key_person' => $row->key_person,
		'alamat' => $row->alamat,
		'no_rek' => $row->no_rek,
		'no_hp' => $row->no_hp,
	    );
            $this->template->load('template','rekanan/rekanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rekanan/create_action'),
	    'id_rekanan' => set_value('id_rekanan'),
	    'nama_rekanan' => set_value('nama_rekanan'),
	    'key_person' => set_value('key_person'),
	    'alamat' => set_value('alamat'),
	    'no_rek' => set_value('no_rek'),
	    'no_hp' => set_value('no_hp'),
	);
        $this->template->load('template','rekanan/rekanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_rekanan' => $this->input->post('nama_rekanan',TRUE),
		'key_person' => $this->input->post('key_person',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_rek' => $this->input->post('no_rek',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Rekanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rekanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rekanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rekanan/update_action'),
		'id_rekanan' => set_value('id_rekanan', $row->id_rekanan),
		'nama_rekanan' => set_value('nama_rekanan', $row->nama_rekanan),
		'key_person' => set_value('key_person', $row->key_person),
		'alamat' => set_value('alamat', $row->alamat),
		'no_rek' => set_value('no_rek', $row->no_rek),
		'no_hp' => set_value('no_hp', $row->no_hp),
	    );
            $this->template->load('template','rekanan/rekanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rekanan', TRUE));
        } else {
            $data = array(
		'nama_rekanan' => $this->input->post('nama_rekanan',TRUE),
		'key_person' => $this->input->post('key_person',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_rek' => $this->input->post('no_rek',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Rekanan_model->update($this->input->post('id_rekanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rekanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rekanan_model->get_by_id($id);

        if ($row) {
            $this->Rekanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rekanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_rekanan', 'nama rekanan', 'trim|required');
	$this->form_validation->set_rules('key_person', 'key person', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_rek', 'no rek', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

	$this->form_validation->set_rules('id_rekanan', 'id_rekanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rekanan.xls";
        $judul = "rekanan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Key Person");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Rek");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");

	foreach ($this->Rekanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_rekanan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->key_person);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_rek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rekanan.doc");

        $data = array(
            'rekanan_data' => $this->Rekanan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('rekanan_doc',$data);
    }

}

/* End of file Rekanan.php */
/* Location: ./application/controllers/Rekanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-02-22 16:23:36 */
/* http://harviacode.com */