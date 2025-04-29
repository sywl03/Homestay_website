<?PHP 
# memulakan fungsi session
session_start();

# memanggil fail connection.php
include('connection.php');

# Mengumpukan data GET kepada tatasusunan
$data_get= array(
    'no_rumah'=>$_GET['no_rumah'],
    'alamat'=> $_GET['alamat'],
    'harga'=> $_GET['harga'],
    'jenis'=> $_GET['jenis'],
    'gambar'=> $_GET['gambar'],
    'masuk'=> $_GET['masuk'],
    'keluar'=> $_GET['keluar'],
    'jumlah_hari'=> $_GET['jumlah_hari']
);
# Mengira jumlah bayaran jumlah hari X dengan harga semalam
$jumlah_bayaran=$data_get['jumlah_hari']*$data_get['harga'];

# Arahan SQL untuk menyimpan data ke dalam jadual tempahan
$arahan_SQL_simpan="insert into tempahan
(nokp_penyewa,no_rumah,tarikh_masuk,tarikh_keluar,jumlah_bayaran)
values
('".$_SESSION['nokp_penyewa']."','".$data_get['no_rumah']."','".$data_get['masuk']."','".$data_get['keluar']."','".$jumlah_bayaran."')";

# melaksanakan proses menyimpan data dalam syarat IF
if(mysqli_query($condb,$arahan_SQL_simpan))
{
    echo "<script>alert('Pembelian Berjaya');
    window.location.href='tempahan_resit.php?".http_build_query($data_get)."';</script>";
}
else
{
    # jika proses meyimpan gagal. Kembali ke laman sebelumnya.
    echo "<script>alert('Pembelian gagal');
    </script>";
}


?>