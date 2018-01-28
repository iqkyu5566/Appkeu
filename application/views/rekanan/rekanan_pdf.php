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
        <h2>Rekanan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Rekanan</th>
		<th>Key Person</th>
		<th>Alamat</th>
		<th>No Rek</th>
		<th>No Hp</th>
		
            </tr><?php
            foreach ($rekanan_data as $rekanan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rekanan->nama_rekanan ?></td>
		      <td><?php echo $rekanan->key_person ?></td>
		      <td><?php echo $rekanan->alamat ?></td>
		      <td><?php echo $rekanan->no_rek ?></td>
		      <td><?php echo $rekanan->no_hp ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>