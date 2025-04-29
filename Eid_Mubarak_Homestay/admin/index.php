<!--Memanggil fail header_admin.php-->
<?PHP include('header_admin.php');      
include('background_admin.php'); ?>
<div class="w3-row w3-card-4 w3-third w3-container w3-margin w3-display-middle w3-black w3-round-xlarge" >
<!--Menyediakan form bagi daftar masuk admin-->
<h4>Daftar Masuk admin</h4>
<form action='' method='POST'       >
nokp <input class="w3-input w3-animate-input"  type='text' name='nokp'  style="width:30%"><br>
katalaluan <input class="w3-input w3-animate-input"  type='password'  name='katalaluan' style="width:30%"><br>
<input type='submit'      value='Daftar Masuk' class='w3-margin w3-btn w3-round-xlarge w3-amber'     >
</form>
</div>
<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{ 
    # memanggil fail connection
     include ('../connection.php');

    # mengambil data POST
    $nokp=$_POST['nokp']; 
    $katalaluan=$_POST['katalaluan'];

    # arahan SQL untuk mencari data dari jadual admin
    $arahan_sql_cari="select* 
    from admin 
    where nokp_admin='$nokp' and 
    katalaluan_admin='$katalaluan'
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
        $_SESSION['nama_admin']=$rekod['nama_admin'];
        $_SESSION['nokp_admin']=$rekod['nokp_admin'];
        
        # mengarahkan fail laman_utama.php dibuka
        echo "<script>window.location.href='laman_utama.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman sebelumnya
        echo "<script>alert('login gagal');
        window.history.back();</script>";
    }
}
?>
