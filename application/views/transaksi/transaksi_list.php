        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>

        <!-- Main content -->
        <section class='content'>
                <div class='box'>
                    <div class='row'>
                        <div class='col-xs-offset-1 col-xs-6'>
                            <h3 class='box-title'>
                            <b>LIST TRANSAKSI</b>
                            </h3> 
                        </div>
                        <div class="col-xs-5">
                            <div class='box-header' align="right">
                                <?php echo anchor('transaksi/create/','Create',array('class'=>'btn btn-success btn-sm'));?>
                                <?php echo anchor(site_url('transaksi/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                                <?php echo anchor(site_url('transaksi/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                            </div>
                        </div>
                    </div>      
           </div>
                
        <div class="row">
        <div class='col-xs-12'>
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-8 ">
                            <i class="fa fa-external-link-square"></i>
                            <b>Data Detail Transaksi Rekanan</b>
                        </div>
                        <div class="col-sm-offset-1 col-xs-3">
                            <?php echo anchor('transaksi/create/','Upload Data Transaksi by Excel',array('class'=>'btn btn-success btn-xs'));?>
                        </div>
                    </div>
                </div>

            <div class="panel-body">
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
            		    <th>Nama Rekanan</th>
            		    <th>Tanggal</th>
            		    <th>Deskripsi</th>
            		    <th>Harga Dasar</th>
            		    <th>Debet</th>
            		    <th>Kredit</th>
            		    <th>Action</th>
                            </tr>
                        </thead>
	                   <tbody>
                        <?php   
                        $start = 0;
                        foreach ($transaksi_data as $transaksi)
                        {
                            ?>
                            <tr>
            		    <td><?php echo ++$start ?></td>
            		    <td><?php echo $transaksi->nama_rekanan ?></td>
            		    <td><?php echo tgl_indo($transaksi->tanggal) ?></td>
            		    <td><?php echo $transaksi->deskripsi ?></td>
            		    <td><?php echo rupiah($transaksi->harga_dasar, $pecahan = 0) ?></td>
            		    <td><?php echo rupiah($transaksi->debet, $pecahan = 0) ?></td>
            		    <td><?php echo rupiah($transaksi->kredit, $pecahan = 0) ?></td>
            		    <td style="text-align:center" width="140px">
            			<?php 
            			echo anchor(site_url('transaksi/read/'.$transaksi->id_transaksi),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-success btn-xs')); 
            			echo '  '; 
            			echo anchor(site_url('transaksi/update/'.$transaksi->id_transaksi),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-xs')); 
            			echo '  '; 
            			echo anchor(site_url('transaksi/delete/'.$transaksi->id_transaksi),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            			?>
            		    </td>
            	        </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
         </section><!-- /.content -->
      
       