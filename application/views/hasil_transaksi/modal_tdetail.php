<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           
        </div>
        <div class="modal-body">
          <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Transaksi Read</h3>
                    <table class="table table-bordered">
                  <tr><td>Id Rekanan</td><td><?php echo $id_rekanan; ?></td></tr>
                  <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
                  <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
                  <tr><td>Retasi</td><td><?php echo $retasi; ?></td></tr>
                  <tr><td>Tonase</td><td><?php echo $tonase; ?></td></tr>
                  <tr><td>Kubikasi</td><td><?php echo $kubikasi; ?></td></tr>
                  <tr><td>Harga Dasar</td><td><?php echo $harga_dasar; ?></td></tr>
                  <tr><td>Debet</td><td><?php echo $debet; ?></td></tr>
                  <tr><td>Kredit</td><td><?php echo $kredit; ?></td></tr>
                  <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
                  <tr><td></td><td><a href="<?php echo site_url('hasil_transaksi/detail_transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
              </table>
                    </div><!-- /.box-body -->
                          </div><!-- /.box -->
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </section><!-- /.content -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        </div>
        </div>
      </div>
    </div>
  </div>