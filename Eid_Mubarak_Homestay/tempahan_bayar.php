<?PHP 
# memanggil fail header.php
include('header.php');
include('background.php');
# nilai session['nokp_penyewa'] empty atau tidak
if(empty($_SESSION['nokp_penyewa']))
{
    # jika nilai session['nokp_penyewa'] empty. bermaksud penyewa belum login
    die("<script>alert('sila daftar masuk sebelum meneruskan proses tempahan');
    window.location.href='penyewa_login.php';</script>");
}

# menyemak kewujudan data GET
if(!empty($_GET))
{
    # Mengumpukan data GET kepada tatasusunan
    $data_get= array(
        'no_rumah'=>$_GET['no_rumah'],
        'alamat'=>$_GET['alamat'],
        'harga'=>$_GET['harga'],
        'jenis'=>$_GET['jenis'],
        'gambar'=>$_GET['gambar'],
        'masuk'=> $_GET['masuk'],
        'keluar'=>$_GET['keluar'],
        'jumlah_hari'=>$_GET['jumlah_hari'] 
    );

}
?>
<!-- Memaparkan semua maklumat tempahan -->
<div class="w3-row w3-card-4 w3-third w3-container w3-margin  w3-black" >
<h4>Maklumat tempahan</h4>
<label><b>No Rumah : </b></label><?PHP echo $data_get['no_rumah']; ?> <br>
<label><b>Alamat : </b></label><?PHP echo $data_get['alamat']; ?> <br>
<label><b>Jenis Rumah : </b></label><?PHP echo $data_get['jenis']; ?> <br>
<label><b>Tarikh Masuk : </b></label><?PHP echo $data_get['masuk']; ?> <br>
<label><b>Tarikh Keluar : </b></label><?PHP echo $data_get['keluar']; ?> <br>
<label><b>Jumlah Hari : </b></label><?PHP echo $data_get['jumlah_hari']; ?> <br>
<label><b>Harga Semalam : RM</b></label><?PHP echo $data_get['harga']; ?> <br>
<label><b>Jumlah Bayaran : RM</b></label><?PHP echo $data_get['harga']*$data_get['jumlah_hari']; ?> <br>

<!-- borang untuk Pembayaran (tidak wajib) -->

<h4>Pembayaran deposit menggunakan kad kredit</h4>
<form action='tempahan_proses.php?<?PHP echo http_build_query($data_get); ?>' method='POST'>
<input class="w3-input w3-animate-input" type='text' name='name_on_card' placeholder = 'Nama atas kad'><br>
<input class="w3-input w3-animate-input" type='text' name='card_no' placeholder = 'Nombor depan kad' maxlength='12'><br>
<input class="w3-input" size='3' maxlength='2' type='text' name='mm' placeholder = 'MM' >            
<input  size='3' maxlength='4' type='text' name='mm' placeholder = 'YYYY'>
<input  size='3' maxlength='3' type='text' name='cc' placeholder = 'CCV'><br>    
<input type='text' name='alamat' placeholder = 'Alamat Bil'><br>
<input maxlength='5' type='text' name='poskod' placeholder = 'Poskod'><br>   
<hr>
<input type='submit' onclick="return confirm('Anda pasti nak bayar?')" class='w3-margin w3-btn w3-round-xlarge w3-amber' value='Bayar'>
</form></div>

