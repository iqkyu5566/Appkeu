<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-md-10'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'><strong>INPUT DATA TRANSAKSI</strong></h3>
        </div>

        <br>

        <div class='box box-primary'>
          <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	           <tr>
              <td>Nama Rekanan <?php echo form_error('id_rekanan') ?></td>
              <td><?php echo cmb_dinamis('id_rekanan', 'rekanan', 'nama_rekanan', 'id_rekanan', $id_rekanan) ?></td>
	           <tr>
              <td>Tanggal <?php echo form_error('tanggal') ?></td>
              <td>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input class="form-control pull-right" id="tanggal" data-date-format='yy-mm-dd' name="tanggal" type="text" placeholder="dd/MM/yyyy" value="<?php echo $tanggal;?>"/>
                </div> 
              </td>
                <!-- /.input group -->

	           <tr>
              <td>Deskripsi <?php echo form_error('deskripsi') ?></td>
              <td><input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" /></td>
	           
             <tr>
              <td>Retasi <?php echo form_error('retasi') ?></td>
              <td><input type="text" class="form-control" name="retasi" id="retasi" placeholder="Retasi" value="<?php echo $retasi; ?>" /></td>
        
             <tr>
              <td>Tonase <?php echo form_error('tonase') ?></td>
              <td><input type="text" class="form-control" name="tonase" id="tonase" placeholder="Tonase" value="<?php echo $tonase; ?>" /></td>
	           <tr>
              <td>Kubikasi <?php echo form_error('kubikasi') ?></td>
              <td><input type="text" class="form-control" name="kubikasi" id="kubikasi" placeholder="Kubikasi" value="<?php echo $kubikasi; ?>" /></td>
	           <tr>
              <td>Harga Dasar <?php echo form_error('harga_dasar') ?></td>
              <td><input type="text" class="form-control" name="harga_dasar" id="harga_dasar" placeholder="Harga Dasar" value="<?php echo $harga_dasar; ?>" />
              </td>
	           <tr>
              <td>Debet <?php echo form_error('debet') ?></td>
              <td><input type="text" class="form-control" name="debet" id="debet" placeholder="Debet" value="<?php echo $debet; ?>" />
              </td>
	           
             <tr>
              <td>Kredit <?php echo form_error('kredit') ?></td>
              <td><input type="text" class="form-control" name="kredit" id="kredit" placeholder="Kredit" value="<?php echo $kredit; ?>" /></td>
	    
             <tr>
              <td>Keterangan <?php echo form_error('keterangan') ?></td>
              <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
	    
             <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	           <tr>
              <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	             <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td>
             </tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


        