
        <!-- Main content -->
<section class='content'>

  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <div class="row">
             <br>
            <div class="col-sm-8">
              <h3 class='box-title'>
                <b>REPORT LAPORAN TRANSAKSI</b>
              </h3>
            </div>
            <div class="col-sm-4">
                <?php echo anchor(site_url('hasil_transaksi/excel'), ' <i class="fa fa-file-excel-o"></i> Cetak ke Excel', 'class="btn btn-primary btn-sm"'); ?>
                <?php echo anchor(site_url('hasil_transaksi/word'), '<i class="fa fa-file-word-o"></i> Cetak ke Word', 'class="btn btn-primary btn-sm"'); ?>
            </div>
          </div>
          
          <hr><br>

          <div class="row">
            <div class="col-md-10">
        <table class="table table-bordered table-striped table-responsive tab">
            
            <thead>
                <tr class="success">
                  <th width="5px" >No</th>
                  <th class="text-center" width="150px" >Nama Rekanan</th>
                  <th class="text-center" width="150px" >Total Debet</th>
                  <th class="text-center" width="150px" >Total Kredit</th>
                  <th class="text-center" width="100px" >Sisa Bayar</th>
                  <th class="text-center" width="30px" >Aksi</th>
                </tr>
            </thead>

      <tbody>
      <?php
      $sisa_bayar = 0;
      $total_debet = 0;
      $total_kredit = 0;
      $start = 0;
    
         foreach ($hasil_transaksi_data as $hasil_transaksi)
          {
                ?>       
        <tr>
        <td><?php echo ++$start ?></td>
        <td><?php echo $hasil_transaksi->nama_rekanan ?></td>
        <td align="right"><?php echo rupiah($hasil_transaksi->total_debet, $pecahan = 0) ?></td>
        <td align="right"><?php echo rupiah($hasil_transaksi->total_kredit, $pecahan = 0) ?></td>
        <td align="right"><?php echo rupiah($hasil_transaksi->sisa_bayar, $pecahan = 0) ?></td>
        <td hidden="0"><?php echo rupiah( $sisa_bayar = $sisa_bayar +$hasil_transaksi->sisa_bayar, $pecahan = 0) ?></td>
        <td hidden="0"><?php echo rupiah( $total_debet = $total_debet +$hasil_transaksi->total_debet, $pecahan = 0) ?></td>
        <td hidden="0"><?php echo rupiah( $total_kredit = $total_kredit +$hasil_transaksi->total_kredit, $pecahan = 0) ?></td>
        <td style="text-align:center" width="140px">
                  <?php echo anchor(site_url('hasil_transaksi/laporan_detailt'), ' <i class="fa fa-file-pdf-o"></i> Detail Transaksi', 'class="btn btn-success btn-xs"'); ?>
        </td>
        </tr>
                <?php
            }
            ?>

          <!-- Tabel Total yang di bawah -->
             <tr>
             <td colspan="2" align="center"><b>Total</b></td>
             <td align="right"><b><?php echo  rupiah($total_debet, $pecahan = 0); ?></b></td>
             <td align="right"><b><?php echo  rupiah($total_kredit, $pecahan = 0); ?></b></td>
             <td align="right"><b><?php echo  rupiah($sisa_bayar, $pecahan = 0); ?></b></td>
             </tr>
            </tbody>
        </table>
      </div>

  </div>

            </div>
          </div>

        </div><!-- /.box-header -->
                
        <hr>

        <script language="javascript">
          $('body').on('hidden.bs.modal', '.modal', function () {
              $(this).removeData('bs.modal');
          });
        </script>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div>
              </div>
            
        </section><!-- /.content -->