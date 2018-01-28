<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                  <h3 class='box-title'><b>REPORT LAPORAN TRANSAKSI</b></h3>
                
                <div class='box-header'>

		<?php echo anchor(site_url('hasil_transaksi/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('hasil_transaksi/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		
                </div><!-- /.box-header -->

             <form method="get" action="<?php echo base_url("index.php/cetak_transaksi/report/")?>">
      <?php
      $dropdown = $this->Transaksi_model->get_option2();
       echo 'Nama Rekanan : '.form_dropdown('rekanan', $dropdown, $this->input->get('rekanan'), 
        'onChange="this.form.submit()"');           
      ?>

                                 
                           <br><input type="submit" class="btn btn-primary" value="Cari">             
                        </form>

     

               

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
              

      

  
    

 
 