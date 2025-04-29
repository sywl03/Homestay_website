<!--Memanggil fail header-->
<?PHP include('header.php'); 
include('background.php')
?>

<!--Menyediakan form bagi daftar masuk pengguna baru-->

<div class="w3-row w3-card-4 w3-third w3-container w3-margin w3-cell w3-black w3-display-middle " >
<h4>Daftar Masuk penyewa</h4>
<form action='' method='POST' >
    nokp<input class="w3-input w3-animate-input" type='text'   name='nokp' style="width:30%"><br>
    katalaluan<input class="w3-input w3-animate-input" type='password'  name='katalaluan' style="width:30%"><br>
    <input type='submit'    value='Daftar Masuk'  class='w3-margin w3-btn w3-round-xlarge w3-amber'     >
</form>
</div>


<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection
     include ('connection.php');

    # mengambil data POST
    $nokp= $_POST['nokp']; 
    $katalaluan= $_POST['katalaluan'];

    # arahan SQL untuk mencari data dari jadual penyewa
    $arahan_sql_cari="select* from penyewa   
    where nokp_penyewa='$nokp' and 
    katalaluan_penyewa='$katalaluan'
    limit 1 ";

    # melaksanakan proses carian 
    $laksana_arahan=mysqli_query($condb,$arahan_sql_cari); 

    # jika terdapat 1 baris rekod di temui
    if(mysqli_num_rows($laksana_arahan)==1)
    {
        # login berjaya

        # pembolehubah $rekod mengambil data yang di temui semasa proses mencari
        $rekod=mysqli_fetch_array($laksana_arahan); 

        #mengumpukkan kepada pembolehubah session
        $_SESSION['nama_penyewa']=$rekod['nama_penyewa'];
        $_SESSION['nokp_penyewa']=$rekod['nokp_penyewa'];
        $_SESSION['notel_penyewa']=$rekod['notel_penyewa'];
        
        # mengarahkan fail index.php dibuka
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman sebelumnya
        echo "<script>alert('login gagal');
        window.history.back();</script>";
    }
}
?>

