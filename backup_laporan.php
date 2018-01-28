<tbody>
            <!-- <?php
            $total_retasi = 0;
            $total_tonase = 0;
            $total_kubikasi = 0;
            $total_harga_dasar = 0;
            $total_debet = 0;
            $total_kredit = 0;
            $total_all = 0;
            $start = 0;
            
            foreach ($rekanan as $r)
            {
                ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $r->nama_rekanan ?></td>
                <td><?php echo $r->tanggal ?></td>
                <td><?php echo $r->deskripsi ?></td>
                <td><?php echo $r->retasi ?></td>
                <td><?php echo $r->tonase ?></td>
                <td><?php echo $r->kubikasi ?></td>
                <td><?php echo rupiah($r->harga_dasar, $pecahan=0) ?></td>
                <td><?php echo rupiah($r->debet, $pecahan=0) ?></td>
                <td><?php echo rupiah($r->kredit, $pecahan=0) ?></td>
                <td><?php echo rupiah($total_rinci = ($r->kredit - $r->debet), $pecahan=0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_retasi = $total_retasi +$r->retasi, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_tonase = $total_tonase +$r->tonase, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_kubikasi = $total_kubikasi +$r->kubikasi, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_harga_dasar = $total_harga_dasar +$r->harga_dasar, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_debet = $total_debet +$r->debet, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_kredit = $total_kredit +$r->kredit, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_all = $total_all +$total_rinci, $pecahan = 0) ?></td>

                <td><?php echo $r->keterangan ?></td>
          </tr>
                <?php
            }
            ?>

             
             <td colspan="4" align="center"><b>Total</b></td>
             <td><b><?php echo  rupiah($total_retasi, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_tonase, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_kubikasi, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_harga_dasar, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_debet, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_kredit, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_all, $pecahan = 0); ?></b></td>
             <td><b><?php echo  $r->keterangan ?></b></td> -->
             
    </tbody>