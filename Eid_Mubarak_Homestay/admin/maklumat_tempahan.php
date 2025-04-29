<?PHP
# Memanggil fail header_admin.php
 include('header_admin.php');
# Memanggil fail connection dari folder luaran
 include('../connection.php');

 include('background_admin.php');
# arahan SQL mencari maklumat tempahan homestay
$arahan_sql_cari="SELECT* FROM tempahan,penyewa,jenis_rumah,homestay
WHERE
tempahan.nokp_penyewa=penyewa.nokp_penyewa AND
tempahan.no_rumah=homestay.no_rumah AND
homestay.id_jenis=jenis_rumah.id_jenis";

# arahan SQL mencari tempahan homestay
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>
<div class="w3-row w3-card-4 w3-table w3-threequarter w3-container w3-margin w3-black" >
<!-- menyediakan header bagi jadual -->
<h4>Senarai tempahan</h4>
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
    </tr>
    </div>
    <?PHP 
    $bil=0;
    # pemboleh ubah $rekod mengambail semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        # sistem akan memaparkan data $rekod baris demi baris sehingga habis
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['nama_penyewa']."</td>
            <td>".$rekod['nokp_penyewa']."</td>
            <td>".$rekod['notel_penyewa']."</td>
            <td>".$rekod['no_rumah']."</td>
            <td>".$rekod['alamat']."</td>
            <td>".$rekod['jenis']."</td>
            <td>".$rekod['harga']."</td>
            <td>".$rekod['tarikh_masuk']."</td>
            <td>".$rekod['tarikh_keluar']."</td>
            <td>".$rekod['jumlah_bayaran']."</td>
            <td><a href='hapus.php?jadual=penyewa&medan_kp=nokp_penyewa&kp=".$rekod['nokp_penyewa']."' 
            onClick=\"return confirm('Anda pasti ingin padam data ini?')\" >Hapus</a></td>
           
        </tr>";
    }
    ?>
</table>