<?PHP 
# memanggil fail header.php
include('header.php');
include('background.php');
# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php
    include('connection.php');
    
    # mengambil data POST
    $masuk=$_POST['tarikh_masuk'];
    $keluar=$_POST['tarikh_keluar'];
    
    # data validation tarikh masuk lebih kecil dari tarikh keluar
    if($masuk>=$keluar)
    {
        die("<script>alert('tarikh masuk lebih besar dari tarikh keluar');
        window.history.back();</script>");
    }
    
    # mengira bilangan hari
    $start = strtotime($masuk);
    $end = strtotime($keluar);
    $jumlah_hari = ceil(abs($end - $start) / 86400);

    # arahan sql untuk memilih homestay yang masih kosong pada tarikh dipilih
    $arahan_SQL_cari= "select* from homestay,jenis_rumah
    where 
    homestay.no_rumah not in(select no_rumah from tempahan where 
    tarikh_keluar >='$masuk')
    and homestay.id_jenis=jenis_rumah.id_jenis";

    # melaksanakan arahan memilih
    $laksana_arahan_cari=mysqli_query($condb,$arahan_SQL_cari); 

    # jika bilangan row yang ditemui lebih kecil dari 1. bermaksud tiada kekosongan
    if(mysqli_num_rows($laksana_arahan_cari)<1)
    {
        die ("<script>alert('maaf. tiada kekosongan pada tarikh yang dipilih'); 
        window.location.href='index.php';</script>");
    }
?>
<div class="w3-row w3-card-4 w3-third w3-container w3-margin w3-black w3-center">
<?PHP
    echo"<table>";

    # pembolehubah rekod mengambil data yang di pilih baris demi baris
    while ($rekod=mysqli_fetch_array($laksana_arahan_cari))
    
    {
        # mengumpukan data yang diambil kepada tatasusunan
        $data_get= array(
            'no_rumah'=>$rekod['no_rumah'],
            'alamat'=>$rekod['alamat'],
            'harga'=>$rekod['harga'],
            'jenis'=>$rekod['jenis'],
            'gambar'=>$rekod['gambar'],
            'masuk'=>$masuk,
            'keluar'=>$keluar,
            'jumlah_hari'=>$jumlah_hari 
        );
        
        # memaparkan data yang diambil baris demi baris
        echo "
        <tr>
            <td>
            <b>Jenis rumah :</b>".$rekod['jenis']."<br>
            <b>No rumah :</b>".$rekod['no_rumah']."<br>
            <b>Alamat rumah :</b>".$rekod['alamat']."<br>
            <b>Harga Semalam :</b>RM ".$rekod['harga']."<br>
            <b>Bil Hari :</b>".$jumlah_hari." Hari<br>
            <b>Jumlah Bayaran :</b>RM ".$rekod['harga'] *$jumlah_hari."<br>
            <a href='tempahan_bayar.php?".http_build_query($data_get)."'>Tempah</a>
            </td>
            <td>
            <img src='images/".$rekod['gambar']."' width='90%'>
            </td>
        </tr>";
    }
    echo "</table>";
}
?>
</div>
<div class="w3-container" >
<?PHP include('footer.php'); ?>
</div>