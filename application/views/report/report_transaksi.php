<!--View -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document ).ready(function() {
        var rekanan=$("#rekanan2").val();
        loadTransaksi(rekanan);
    });
</script>

<section class='content'>
        <div class='row'>
            
            <div class='col-xs-12'>
              <div class='box'>
                <h3 class='box-title'> 
                    <div class='col-xs-10'>
                        <b>REPORT LAPORAN TRANSAKSI</b>
                    </div>
                    <div class='col-xs-2'>
                      <?php echo form_open('report/report_excel_by_rekanan'); ?>
                      <tr><td></td><td><button name = rekanan type="submit" class="btn btn-primary btn-sm">Export data to Excel</button></td></tr>
                    </div>
                </h3>
              </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class='col-xs-6'>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> Pilih Rekanan Anda
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <tr><td>Nama Rekanan</td><td><?php echo cmb_dinamis('rekanan', 'rekanan', 'nama_rekanan', 'nama_rekanan', null,"id='rekanan2' onchange='loadTransaksi()'" ) ?></td></tr>
                        </table>
                        <table class="table table-striped table-bordered">
                            <tr><td>Tanggal</td><td><?php echo cmb_dinamis('rekanan', 'rekanan', 'nama_rekanan', 'nama_rekanan', null,"id='rekanan2' onchange='loadTransaksi()'" ) ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class='col-xs-6'>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> Pilih Tanggal Transaksi
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <tr><td>Tanggal Awal</td><td><?php echo cmb_dinamis('rekanan', 'rekanan', 'nama_rekanan', 'nama_rekanan', null,"id='rekanan2' onchange='loadTransaksi()'" ) ?></td></tr>
                        </table>
                        <table class="table table-striped table-bordered">
                            <tr><td>Tanggal Akhir</td><td><?php echo cmb_dinamis('rekanan', 'rekanan', 'nama_rekanan', 'nama_rekanan', null,"id='rekanan2' onchange='loadTransaksi()'" ) ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="row">
             <div class='col-xs-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                         <i class="fa fa-external-link-square"></i> Data Transaksi By Rekanan
                    </div>
                    <div class="panel-body">
                        <div id="dataTransaksi">
                        </div>
                    </div>
                </div>
            </div>
                        
        </div>
</section>
               
                 <script type="text/javascript">

                    function loadTransaksi(rekanan){
                        var rekanan=$("#rekanan2").val();
                        //alert(rekanan);
                        $.ajax({
                            type:'GET',
                            url :'<?php echo base_url() ?>index.php/Report/load_transaksi_by_rekanan',
                            data:'rekanan='+rekanan,
                            success:function(html){
                                $("#dataTransaksi").html(html);
                                
                            }
                        })
                    }
                </script>


              

      

  
    

 
 