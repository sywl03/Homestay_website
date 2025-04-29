<?PHP
# Memanggil fail header_admin.php
 include('header_admin.php');
# Memanggil fail connection dari folder luaran
 include('../connection.php');

 include('background_admin.php');
# arahan SQL mencari penyewa berdaftar
$arahan_sql_cari="select* from penyewa";

# Melaksanakan arahan SQL mencari penyewa berdaftar
$laksana_sql_cari= mysqli_query($condb,$arahan_sql_cari)
?>
<div class="w3-row w3-card-4 w3-table w3-third w3-container w3-margin w3-black w3-round-large" >
<!-- menyediakan header bagi jadual -->
<h4>Senarai Penyewa berdaftar</h4>
<table id='saiz' border='1'>
    <tr>
        <td>Bil</td>
        <td>nama_penyewa</td>
        <td>nokp_penyewa</td>
        <td>notel_penyewa</td>
        <td>katalaluan_penyewa</td>
        <td></td>
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
            <td>".$rekod['katalaluan_penyewa']."</td>
            <td><a href='hapus.php?jadual=penyewa&medan_kp=nokp_penyewa&kp=".$rekod['nokp_penyewa']."' 
            onClick=\"return confirm('Anda pasti ingin padam data ini?')\" >Hapus</a></td>
        </tr>";
    }
    ?>
</table>