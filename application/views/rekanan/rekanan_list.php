
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                
                  <h3 class='box-title'> <div class='col-xs-12'><b>DATA REKANAN</b></div></h3>   

                   <div class='box-header' align="right">
                    <?php echo anchor('rekanan/create/','Create',array('class'=>'btn btn-success btn-sm'));?>
                    <?php echo anchor(site_url('rekanan/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?php echo anchor(site_url('rekanan/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                    <?php echo anchor(site_url('rekanan/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                   </div><!-- /.box-header -->
                   
                   
    <div class='col-xs-13'>
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list"></i> Daftar Rekanan CV. Joneeta Group

            </div>
        </div>

        <div class="panel-body">

        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Nama Rekanan</th>
		    <th>Key Person</th>
		    <th>Alamat</th>
		    <th>No Rek</th>
		    <th>No Hp</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
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
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('rekanan/read/'.$rekanan->id_rekanan),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-success btn-xs')); 
			echo '  '; 
			echo anchor(site_url('rekanan/update/'.$rekanan->id_rekanan),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-primary btn-xs')); 
			echo '  '; 
			echo anchor(site_url('rekanan/delete/'.$rekanan->id_rekanan),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                

              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->