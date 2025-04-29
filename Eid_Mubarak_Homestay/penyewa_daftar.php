<!--Memanggil fail header-->
<?PHP include('header.php');
include('background.php');
?>

<!--Menyediakan form bagi daftar pengguna baru-->

<div class="w3-row w3-card-4 w3-third w3-container w3-margin w3-black" >
<h4>Daftar penyewa Baru</h4>
<form action='' method='POST' >
    nama <input class="w3-input w3-animate-input" type='text'  name='nama' style="width:30%"><br>
    nokp <input class="w3-input w3-animate-input" type='text'   name='nokp' style="width:30%"><br>
    notel <input class="w3-input w3-animate-input" type='text'  name='notel' style="width:30%"><br>
    katalaluan <input class="w3-input w3-animate-input" type='password'   name='katalaluan' style="width:30%"><br>
    <input type='submit' value='Daftar Pengguna' class='w3-margin w3-btn w3-round-xlarge w3-amber'      >
</form>
</div>


<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection
     include ('connection.php');

    # mengambil data POST
    $nama = $_POST['nama'];
    $notel= $_POST['notel']; 
    $nokp= $_POST['nokp'];
    $katalaluan= $_POST['katalaluan'];

    # -- data validation --
    if(empty($nama) or empty($notel) or empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Lengkapkan maklumat yang dikehendaki.');
        window.history.back();</script>");
    }

    # --- data validation nokp 
    if(strlen($nokp)!=12 or !is_numeric($nokp))
    {
        die("<script>alert('Ralat pada nokp');
        window.history.back();</script>");
    }
 
    # arahan SQL untuk menyimpan data
    $arahan_sql_simpan="insert into penyewa
    (nama_penyewa,nokp_penyewa,notel_penyewa,katalaluan_penyewa)
    values
    ('$nama','$nokp','$notel','$katalaluan')";

    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # jika proses menyimpan berjaya. papar info dan buka laman penyewa_login.php
        echo "<script>alert('Pendaftaran Berjaya');
        window.location.href='penyewa_login.php';</script>";
    }
    else
    {
        # jika proses menyimpan gagal, kembali ke laman sebelumnya
        echo "<script>alert('Pendaftaran Gagal');
        window.history.back();</script>";
    }
}
?>
