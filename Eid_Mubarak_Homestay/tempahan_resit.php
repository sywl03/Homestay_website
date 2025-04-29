<?PHP 
# memanggil fail header.php
 include('header.php');
include('background.php');
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
?>
<div class="w3-row w3-card-4 w3-third w3-container w3-margin w3-black" >
<!-- memaparkan data sebagai resit -->
<h2>Resit Pembayaran</h2>
<h4>Maklumat tempahan</h4>
<label><b>No Rumah : </b></label><?PHP echo $data_get['no_rumah']; ?> <br>
<label><b>Alamat : </b></label><?PHP echo $data_get['alamat']; ?> <br>
<label><b>Jenis Rumah : </b></label><?PHP echo $data_get['jenis']; ?> <br>
<label><b>Tarikh Masuk : </b></label><?PHP echo $data_get['masuk']; ?> <br>
<label><b>Tarikh Keluar : </b></label><?PHP echo $data_get['keluar']; ?> <br>
<label><b>Jumlah Hari : </b></label><?PHP echo $data_get['jumlah_hari']; ?> <br>
<label><b>Harga Semalam : RM</b></label><?PHP echo $data_get['harga']; ?> <br>
<label><b>Jumlah Bayaran : RM</b></label><?PHP echo $data_get['harga'] * $data_get['jumlah_hari']; ?> <br>

<!-- print resit -->
<html>
<body>
<button class='w3-margin w3-btn w3-round-xlarge w3-amber'  onclick="window.print()">Print receipt</button>
</body>
</html>
</div>


