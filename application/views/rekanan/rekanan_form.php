<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>REKANAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama Rekanan <?php echo form_error('nama_rekanan') ?></td>
            <td><input type="text" class="form-control" name="nama_rekanan" id="nama_rekanan" placeholder="Nama Rekanan" value="<?php echo $nama_rekanan; ?>" />
        </td>
	    <tr><td>Key Person <?php echo form_error('key_person') ?></td>
            <td><input type="text" class="form-control" name="key_person" id="key_person" placeholder="Key Person" value="<?php echo $key_person; ?>" />
        </td>
	    <tr><td>Alamat <?php echo form_error('alamat') ?></td>
            <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </td>
	    <tr><td>No Rek <?php echo form_error('no_rek') ?></td>
            <td><input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="No Rek" value="<?php echo $no_rek; ?>" />
        </td>
	    <tr><td>No Hp <?php echo form_error('no_hp') ?></td>
            <td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
        </td>
	    <input type="hidden" name="id_rekanan" value="<?php echo $id_rekanan; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rekanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->


       