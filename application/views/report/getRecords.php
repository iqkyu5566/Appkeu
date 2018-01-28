<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                  <h3 class='box-title'><b>REPORT LAPORAN TRANSAKSI</b></h3>
                
                <div class='box-header'>

		<?php echo anchor(site_url('hasil_transaksi/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('hasil_transaksi/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		
                </div><!-- /.box-header -->

    <?php echo form_open("Report/getRecords"); ?>
    <select name="rekanan">
        <option value="">Pilih Nama Rekanan Anda</option>
        <?php if(count($getRekanan)): ?>
            <?php foreach ($getRekanan as $r ):?>
                <option value=<?php echo $r->id_rekanan;?>><?php echo $r->nama_rekanan;?></option>
        <?php endforeach; ?>
        <?php else: ?>
        <?php endif; ?>   
    </select>
    <?php echo form_submit(['name'=>'submit', 'value'=>'Records']); ?>
    <?php echo form_close(); ?>

    
    <div class="widget-body" style="padding: 10px 0 0;">
    <table class="dynamicTable table table-striped table-bordered table-primary table-condensed">
             <thead>
                <tr class="success">
                    <th width="5px">No</th>
            <th>Nama Rekanan</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Retasi</th>
            <th>Tonase</th>
            <th>Kubikasi</th>
            <th>Harga Dasar</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Total</th>
            <th>Keterangan</th>
                </tr>
                <?php if(count($records)) :?>
                    <?php foreach ($records as $rec)?>
                    <tr>
                        <td><?php echo $rec->nama_rekanan; ?></td>
                        <td><?php echo $rec->tanggal; ?></td>
                        <td><?php echo $rec->deskripsi; ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td>No Records Found !</td>
                    </tr>
                <?php endif; ?>
            </thead>
        <tbody> 
        </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>

        <!--jquery dan select2-->
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/select2/js/select2.min.js') ?>"></script>
        <script>
            $(document).ready(function () {
                $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
</div><!-- /.box-body -->

              </div>
            </div>
          </div>
</section>
              

      

  
    

 
 