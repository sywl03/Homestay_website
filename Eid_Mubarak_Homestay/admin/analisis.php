<?PHP
# Memanggil fail header_admin.php
include ('header_admin.php');

# Memanggil fail connection dari folder luaran
 include ('../connection.php');

 include ('background_admin.php');
# menyemak kewujudan data POST
if(!empty($_POST))
{
    $tambahan="AND tarikh_masuk like '%".$_POST['bulan']."%'";
}
else
{
    $tambahan=" ";
}

# arahan SQL untuk mencari data penjualan mengikut bulan
$arahan_sql_cari="SELECT*
FROM tempahan,penyewa,jenis_rumah,homestay
WHERE
tempahan.nokp_penyewa=penyewa.nokp_penyewa AND
tempahan.no_rumah=homestay.no_rumah AND
homestay.id_jenis=jenis_rumah.id_jenis $tambahan";

# melaksanakan arahan SQL mencari data penjualan
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari); 
?>
<div class="w3-row w3-card-4 w3-container w3-margin w3-black" >
<!-- Menyediakan form untuk memilih bulan-->
<h4>Senarai tempahan</h4>
<form action='' method='POST' >
<select name='bulan'class='w3-margin w3-btn w3-round-large w3-amber'>
    <option value selected disabled>Pilih Bulan tarikh masuk </option>
    <option value='-01-'>Januari</option>
    <option value='-02-'>Februari</option>
    <option value='-03-'>Mac</option>
    <option value='-04-'>April</option>
    <option value='-05-'>Mei</option>
    <option value='-06-'>Jun</option>
    <option value='-07-'>July</option>
    <option value='-08-'>Ogos</option>
    <option value='-09-'>September</option>
    <option value='-10-'>October</option>
    <option value='-11-'>November</option>
    <option value='-12-'>Disember</option>
   
   



</select>
<input type='submit' value='cari' class='w3-margin w3-btn w3-round-xlarge w3-amber'>
</form>

<!-- menyediakan header untuk jadual yang hendak memaparkan data yang dicari -->

    <?PHP 
    $bil=0;
    $jum_pendapatan=0;
    if(mysqli_num_rows($laksana_sql_cari)>=1)
    {
        echo "
        <table id='saiz' border='1'>
            <tr>
                <td>Bil</td>
                <td>nama_penyewa</td>
                <td>nokp_penyewa</td>
                <td>notel_penyewa</td>
                <td>no_rumah</td>
                <td>alamat</td>
                <td>jenis</td>
                <td>harga</td>
                <td>tarikh_masuk</td>
                <td>tarikh_keluar</td>
                <td>jumlah_bayaran</td>
            </tr>";
    
    # pembolehubah $rekod mengambil data yang dicari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        $jum_pendapatan=$jum_pendapatan+$rekod['jumlah_bayaran'];
        echo "
        <tr>
        <td>".++$bil."</td>
        <td>".$rekod['nama_penyewa']."</td>
        <td>".$rekod['nokp_penyewa'     ]."</td>
        <td>".$rekod['notel_penyewa'     ]."</td>
        <td>".$rekod['no_rumah'     ]."</td>
        <td>".$rekod['alamat'     ]."</td>
        <td>".$rekod['jenis'     ]."</td>
        <td>".$rekod['harga'     ]."</td>
        <td>".$rekod['tarikh_masuk'     ]."</td>
        <td>".$rekod['tarikh_keluar'     ]."</td>
        <td>".$rekod['jumlah_bayaran'     ]."</td>
        </tr>";
    }
    echo"</table>";
    echo "<h4><b>Jumlah Pendapatan : RM ".$jum_pendapatan."</b></h4>";
    }
    else
    {
        echo "Maaf. tiada maklumat tempahan pada bulan yang dipilih";
    }
    ?>
    </div>
