<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function rupiah($nilai, $pecahan = 0){
   return number_format($nilai, $pecahan, ',', ',');
}



function rupiah2($harga)
{
    $a=(string)$harga; //membuat $harga menjadi string
    $len=strlen($a); //menghitung panjang string $a
 
    if ( $len <=18 )
    {
        $ratril=$len-3-1;
        $ramil=$len-6-1;
        $rajut=$len-9-1; //untuk mengecek apakah ada nilai ratusan juta (9angka dari belakang)
        $juta=$len-12-1; //untuk mengecek apakah ada nilai jutaan (6angka belakang)
        $ribu=$len-15-1; //untuk mengecek apakah ada nilai ribuan (3angka belakang)
 
        $angka='';
        for ($i=0;$i<$len;$i++)
        {
            if ( $i == $ratril )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ($i == $ramil )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ( $i == $rajut )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 3angka dari depan
            }
            else if ( $i == $juta )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 6angka dari depan
            }
            else if ( $i == $ribu )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 9angka dari depan
            }
            else
            {
                $angka=$angka.$a[$i];
            }
        }
    }
    echo $angka.",-";
    }

//untuk mengetahui bulan bulan
if ( ! function_exists('bulan'))
{
    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}
 
//format tanggal yyyy-mm-dd
if ( ! function_exists('tgl_indo'))
{
    function tgl_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bulan = $pecah[1];
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun; //hasil akhir
    }
}


