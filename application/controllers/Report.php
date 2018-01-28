<!--Controller-->
<?php 
/**
* 
*/
class Report extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//$this->load->model('Report_model');

        $this->load->library('ssp');
 
	}


	public function index()
	{
		//$getRekanan = $this->Report_model->getRekanan();
		
		$this->template->load('template', 'report/report_transaksi');
	}

	public function getRecords(){

		// Yang lama
		// $this->load->model('Report_model');
		// $rekanan = $this->input->post('id_rekanan');
		// $getRekanan = $this->Report_model->getRekanan();
		// $records = $this->Report_model->getRecords($rekanan);
		// $this->template->load('template', 'report/getRecords',['getRekanan'=>$getRekanan, 'records'=>$records]);

	}

	function load_transaksi_by_rekanan()
	{

		$rekanan = $_GET['rekanan'];
		echo "<table class ='table table-bordered'>
               
                    <th>No</th>
                    <th>Nama Rekanan</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Retasi</th>
                    <th>Tonase</th>
                    <th>Kubikasi</th>
                    <th>Harga Dasar</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Keterangan</th>
                   </tr>";
        $no =1;
        $total_retasi = 0;
  		
        
        $this->db->where('nama_rekanan',$rekanan);
        $this->db->select('*'); //memeilih semua field
    	$this->db->from('transaksi'); //memeilih tabel
    	$this->db->join('rekanan', 'transaksi.id_rekanan = rekanan.id_rekanan');
       

        $transaksi = $this->db->get();

        foreach ($transaksi->result() as $row) {
        	# code...
        	echo "<tr>
        	<td>$no</td>
        	<td>$row->nama_rekanan</td>
        	<td>$row->tanggal</td>
        	<td>$row->deskripsi</td>
        	<td>$row->retasi</td>
        	<td>$row->tonase</td>
        	<td>$row->kubikasi</td>
        	<td>$row->harga_dasar</td>
        	<td>$row->debet</td>
        	<td>$row->kredit</td>
        	<td>$row->keterangan</td>
        	</tr>";
        	$no++;
        }
        echo"</table>";

	}

	function report_excel_by_rekanan()
	{
		$this->load->library('CPHP_excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'NO');
        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'TANGGAL');
        $objPHPExcel->getActiveSheet()->setCellValue('C3', 'DESKRIPSI');
        $objPHPExcel->getActiveSheet()->setCellValue('D3', 'RETASI');
        $objPHPExcel->getActiveSheet()->setCellValue('E3', 'TONASE');
        $objPHPExcel->getActiveSheet()->setCellValue('F3', 'KUBIKASI');
        $objPHPExcel->getActiveSheet()->setCellValue('G3', 'HARGA DASAR');
        $objPHPExcel->getActiveSheet()->setCellValue('H3', 'DEBET');
        $objPHPExcel->getActiveSheet()->setCellValue('I3', 'KREDIT');
        $objPHPExcel->getActiveSheet()->setCellValue('J3', 'TOTAL');
        $objPHPExcel->getActiveSheet()->setCellValue('K3', 'KETERANGAN');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize (true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize (true);

        $objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('H3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('K3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //Fungsi Style
	        $default_border = array(
			    'style' => PHPExcel_Style_Border::BORDER_THIN,
			    'color' => array('rgb'=>'1006A3')
			);
			$style_main_header = array(
	
			    'fill' => array(
			        'type' => PHPExcel_Style_Fill::FILL_SOLID,
			        'color' => array('rgb'=>'ffffff'),

			    ),
			    'font' => array(
			        'bold' => true,
			        'size' => 20,

			    )
			);

			$style_total = array(
	
			    'fill' => array(
			        'type' => PHPExcel_Style_Fill::FILL_SOLID,
			        'color' => array('rgb'=>'ffff11'),

			    ),
			    'font' => array(
			        'bold' => true,
			        'size' => 14,
			    )
			);

			$style_header = array(
			    'borders' => array(
			        'bottom' => $default_border,
			        'left' => $default_border,
			        'top' => $default_border,
			        'right' => $default_border,
			    ),
			    'fill' => array(
			        'type' => PHPExcel_Style_Fill::FILL_SOLID,
			        'color' => array('rgb'=>'47AF5C'),
			    ),
			    'font' => array(
			        'bold' => true,
			    )
			);


			$objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray( $style_main_header );
			$objPHPExcel->getActiveSheet()->getStyle('A1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('A3:K3')->applyFromArray( $style_header );
			//$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray( $style_header );
			//$objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray( $style_header );

			$bar = 3;
			$kol = 0;

			foreach ($view AS $row) {
			    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($kol, $bar, $row->id);
			    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($kol+1, $bar, $row->data);
			    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($kol+2, $bar, $row->nilai);
			    $bar++;
			}

			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="01simple.xlsx"');
			header('Cache-Control: max-age=0');

			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0


        
       $rekanan = $_POST['rekanan'];
       $this->db->where('nama_rekanan',$rekanan);
        $this->db->select('*'); //memeilih semua field
    	$this->db->from('transaksi'); //memeilih tabel
    	$this->db->join('rekanan', 'transaksi.id_rekanan = rekanan.id_rekanan');
       

        $transaksi = $this->db->get();
        $start = 1;
        $no=4;
        $retasi=0;
        $total_all =0;
        $objPHPExcel->getActiveSheet()->mergeCells('A1:K1');

        foreach ($transaksi->result() as $row){

        	$objPHPExcel->getActiveSheet()->setCellValue('A1', $row->nama_rekanan);

            $objPHPExcel->getActiveSheet()->setCellValue('A'.$no, $start);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$no, $row->tanggal);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$no, $row->deskripsi);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$no, $row->retasi);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$no, $row->tonase);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$no, $row->kubikasi);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$no, $row->harga_dasar);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$no, rupiah($row->debet, $pecahan=0)); 
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$no, rupiah($row->kredit, $pecahan=0));
            
            
            $objPHPExcel->getActiveSheet()->setCellValue('J'.$no, $total_rinci = ($row->kredit - $row->debet));
            $objPHPExcel->getActiveSheet()->setCellValue('K'.$no, $row->keterangan);
            $objPHPExcel->getActiveSheet()->setCellValue('J'.$no, rupiah($total_all = $total_all +$total_rinci, $pecahan = 0));
            $objPHPExcel->getActiveSheet()->getStyle('J'.$no)->applyFromArray( $style_total );
            
           	
            $no++;
            $start++;
        }

        
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
        $objWriter->save("data-transaksi.xlsx");
        $this->load->helper('download');
        force_download('data-transaksi.xlsx', NULL);
	}
}

 ?>