<!doctype html>
<html>
    <head>
        <title>Innovation Center Kendari</title>
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
        <h2>Transaksi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Rekanan</th>
		<th>Tanggal</th>
		<th>Deskripsi</th>
		<th>Retasi</th>
        <th>Tonase</th>
		<th>Kubikasi</th>
		<th>Harga Dasar</th>
		<th>Debet</th>
		<th>Kredit</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($transaksi_data as $transaksi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $transaksi->id_rekanan ?></td>
		      <td><?php echo $transaksi->tanggal ?></td>
		      <td><?php echo $transaksi->deskripsi ?></td>
		      <td><?php echo $transaksi->retasi ?></td>
		      <td><?php echo $transaksi->kubikasi ?></td>
		      <td><?php echo $transaksi->harga_dasar ?></td>
		      <td><?php echo $transaksi->debet ?></td>
		      <td><?php echo $transaksi->kredit ?></td>
		      <td><?php echo $transaksi->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>