<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Hasil_transaksi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Rekanan</th>
		<th>Total Debet</th>
		<th>Total Kredit</th>
		<th>Sisa Bayar</th>
		
            </tr><?php
            foreach ($hasil_transaksi_data as $hasil_transaksi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $hasil_transaksi->nama_rekanan ?></td>
		      <td><?php echo $hasil_transaksi->total_debet ?></td>
		      <td><?php echo $hasil_transaksi->total_kredit ?></td>
		      <td><?php echo $hasil_transaksi->sisa_bayar ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>