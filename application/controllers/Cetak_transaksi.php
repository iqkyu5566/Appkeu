<?php 
/**
* 
*/
class Cetak_transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Transaksi_model');
	}
	function index()
	{
                        $data['rekanan'] = $this->Transaksi_model->get_option2();
            
                        $this->template->load('template','transaksi/report_transaksi', $data);
        
	}

	function report()
    {
        if (isset($_POST['submit']))
        {
        	echo "proses";

        }
        else {

          	$report_transaksi = $this->Transaksi_model->get_all_query();

        	$data = array(
            'report_transaksi_data' => $report_transaksi
        	);

		 	$this->template->load('template','transaksi/hasil_filter', $data);

            // $this->load->library('datatables');
            // if($this->input->get('rekanan')) $this->datatables->where('r.id_rekanan = t.id_rekanan', $this->input->get('rekanan'));

            // $this->datatables->select ('transaksi.id_transaksi, transaksi.id_rekanan, transaksi.tanggal, transaksi.deskripsi, transaksi.retasi, transaksi.tonase, transaksi.kubikasi, transaksi.harga_dasar');
            // $this->datatables->from('transaksi');
            // $this->datatables->group_by('transaksi.id_rekanan');
            // echo $this->datatables->generate();



        }
    }

}

 ?>